<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colocation;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user()->id;
        $colocations = Colocation::with(['users', 'expenses'])
            ->withCount(['users', 'expenses'])
            ->withSum('expenses as total_amount', 'amount')
            ->orderBy('name')
            ->first();


        $totalExpenses =1;// $colocations->sum('total_amount');

        $allexpenses = $colocations->pluck('expenses')->flatten()->toArray();

        dd($allexpenses, $totalExpenses, $colocations, $user);



        // return response()->json($colocations);
        return view('colocation', compact('colocation', 'totalExpenses', 'allexpenses'));
    }
}
