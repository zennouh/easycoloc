<?php

namespace App\Http\Controllers;

use App\Events\AddedToColocation;
use App\Jobs\EmailJob;
use Illuminate\Http\Request;
use App\Models\Colocation;
use App\Models\User;
use Illuminate\Http\JsonResponse;
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

        if (
            $colocation->users()->where("user_id", $user->id)->exists()
        ) {
            return back()->withErrors('noEmail', 'This user is already in the colocation');
        }

        $url = URL::temporarySignedRoute(
            'invitations.click',
            now()->addDays(2),
            [
                'colocation' => $colocation->id,
                'user_id' => $user->id,
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

        $user = User::findOrFail($request->query('user_id'));

        event(new AddedToColocation($user, $colocation));

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
            ->wherePivotNull('deleted_at')
            ->with(
                [
                    "expenses" => function ($query) use ($user) {
                        $query->where("user_id", $user->id)
                            ->with("settlements");
                    },
                    "categories",
                    "users",
                ],
            )
            ->withSum("expenses as total", "amount")
            ->withCount("expenses as colocation_expenses_count")
            ->withCount("users as colocation_users_count")
            ->where("colocations.status", "active")
            ->orderBy('name')
            ->first();

        $user_money_payed = 0;
        $user_money_taken = 0;
        $user_money_needed = 0;
        if (!$colocation) {
            return view("colocation", ["colocation" => null]);
        }
        foreach ($colocation->expenses as $expense) {
            $expense->settlements_count = $expense->settlements()->count();

            $user_money_payed += $expense->amount;

            $amount = $expense->amount;

            $users_should_pay = ceil($amount / $colocation->colocation_users_count);

            $user_that_pay_count = $expense->settlements_count + 1;

            $users_that_not_pay = $colocation->colocation_users_count - $user_that_pay_count;

            $user_money_needed += $users_should_pay * $users_that_not_pay;

            $user_money_taken += $expense->settlements->sum("amount");
        }
        $colocation->user_money_payed = $user_money_payed;
        $colocation->user_money_taken = $user_money_taken;
        $colocation->user_money_needed = $user_money_needed;
        // dd($colocation->toArray());

        return view("colocation", compact("colocation"));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'status' => 'nullable|string|in:active,inactive',
        ]);


        $colocation = Colocation::create($data);


        $colocation->users()->attach(auth()->id(), [
            'role' => 'owner',
            'joined_at' => now(),
        ]);

        return back();
    }

    public function removeUser(Colocation $colocation, User $user)
    {
        $user->decrement('reputation', 1);
        $colocation->users()->detach($user->id);

        return back()->with('success', 'User removed from colocation');
    }

    public function leaveColocation(Colocation $colocation, User $user)
    {
        $user->increment('reputation', 1);
        $colocation->users()->detach($user->id);

        return to_route('colocations.index');
    }

    public function cancel(Colocation $colocation)
    {
        $colocation->update(['status' => 'inactive']);

        return back()->with('success', 'Colocation cancelled successfully');
    }


 
}
