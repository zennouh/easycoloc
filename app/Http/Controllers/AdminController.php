<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
   
    public function __construct()
    {
       
    }

    /**
     * Display global statistics about the application.
     *
     * @return \Illuminate\View\View
     */
    public function stats()
    {
        $totalColocations = Colocation::count();
        $totalUsers = User::count();
        $totalExpenses = Expense::count();
        $sumExpenses = Expense::sum('amount');
        $users = User::orderBy('created_at', 'desc')->paginate(20);

        return view('admin', compact(
            'totalColocations',
            'totalUsers',
            'totalExpenses',
            'sumExpenses',
            'users'
        ));
    }

    /**
     * Ban or unban a given user by toggling the banned_at timestamp.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleUserBan(User $user): RedirectResponse
    {
        $user->banned_at = $user->banned_at ? null : now();
        $user->save();

        $message = $user->banned_at ? 'User banned successfully.' : 'User unbanned successfully.';
        return redirect()->back()->with('success', $message);
    }
}
