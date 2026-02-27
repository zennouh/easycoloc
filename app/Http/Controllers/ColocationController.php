<?php

namespace App\Http\Controllers;

use App\Jobs\EmailJob;
use Illuminate\Http\Request;
use App\Models\Colocation;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class ColocationController extends Controller
{

    public function invite(Request $request, Colocation $colocation)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where("email", $request->email)->first();



        if (!$user) {
            return back()->withErrors('noEmail', 'This Email has no user');
        }

        if ($colocation->users()->where("user_id", $user->id)->exists()) {
            return back()->withErrors('noEmail', 'This user is already in the colocation');
        }

        $url = URL::temporarySignedRoute(
            'invitations.click',
            now()->addDays(2),
            [
                'colocation' => $colocation->id,
                'user_id' => $user->id,
                // 'email' => $request->email,
            ]
        );

        $email = $request->email;

        EmailJob::dispatch($email, $url);



        return back()->with('success', 'Invitation sent');
    }

    public function invitationsClick(Request $request)
    {
        if (! $request->hasValidSignature()) {
            abort(403, 'Invalid or expired link.');
        }

        $colocationId = $request->query('colocation');
        $colocation = Colocation::findOrFail($colocationId);

        $colocation->users()->attach($request->query('user_id'), [
            'role' => 'member',
            'joined_at' => now(),
        ]);

        return redirect()->route(route: 'done')->with('success', 'You have joined the colocation');
    }


    public function index(Request $request)
    {
        $user = auth()->user();


        $colocation = $user->colocations()
            ->with(["expenses", "categories"])
            ->withCount(['users', 'expenses', 'categories'])
            ->withSum("expenses as total", "amount")
            ->where("colocations.status", "active")
            ->orderBy('name')
            ->first();


        return view("colocation", compact("colocation"));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|string|in:active,inactive',
        ]);


        $colocation = Colocation::create($data);


        $colocation->users()->attach(auth()->id(), [
            'role' => 'ownern',
            'joined_at' => now(),
        ]);

        return back();
    }


    public function show($id): JsonResponse
    {
        $colocation = Colocation::with(['users', 'categories', 'expenses'])->findOrFail($id);

        return response()->json($colocation);
    }
}
