<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Http\JsonResponse;

class ExpenseController extends Controller
{

    public function index(Request $request)
    {


        $user = auth()->user();






        $colocation = $user->colocations()
            ->with([
                "users",
                "expenses" => function ($query) use ($request) {
                    $query = $query->whereYear('date', $request->integer('year', now()->year));
                    if ($request->has('month') && $request->integer('month') !== 0) {
                        $query->whereMonth('date', $request->integer('month'));
                    }

                    $query->orderBy('date', 'desc');
                },
                "categories"
            ])
            ->withCount(['users', 'expenses', 'categories'])
            ->withSum("expenses as total", "amount")
            ->where("colocations.status", "active")
            ->orderBy('name')
            ->first();

        $pickedYear = $request->integer('year', now()->year);
        $pickedMonth = $request->integer('month', 0);


        return view('expenses', compact('colocation', 'pickedYear', 'pickedMonth'));
    }





    /**
     * Store an expense
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'user_id' => 'required|exists:users,id',
            'colocation_id' => 'required|exists:colocations,id',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $expense = Expense::create($data);

        return back()->with('success', 'Expense created successfully');
    }

    /**
     * Show an expense
     */
    public function show($id)
    {

        $expense = Expense::with(['user', 'category', 'colocation', 'settlements'])
            ->findOrFail($id);
        // dd($expense->toArray());

        $users = Colocation::with('users')
            ->where("id", $expense->colocation_id)
            ->where("status", "active")
            ->first()->users;
        $expense->users_count = $users->count();
        foreach ($users as $user) {
            $user->price = ceil($expense->amount / $expense->users_count);
            $user->is_payer = $user->id === $expense->user_id;
            $user->pay = $expense->settlements()->where("from_user_id", $user->id)->exists();
        }
        $expense->users = $users->toArray();
        // dd($expense->toArray());
        return view('expensesShow', compact('expense'));
    }

    /**
     * Update an expense
     */
    public function update(Request $request, $id): JsonResponse
    {
        $expense = Expense::findOrFail($id);

        $data = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'amount' => 'sometimes|required|numeric|min:0',
            'date' => 'sometimes|required|date',
            'user_id' => 'sometimes|required|exists:users,id',
            'colocation_id' => 'sometimes|required|exists:colocations,id',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $expense->update($data);

        return response()->json($expense);
    }

    /**
     * Delete an expense
     */
    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return back()->with('success', 'Expense deleted successfully');
    }
}
