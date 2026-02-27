<?php

namespace App\Http\Controllers;

use App\Models\Settlement;
use Illuminate\Http\Request;

class SettlementController extends Controller
{

    public function pay(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'expense_id' => 'required|exists:expenses,id',
            'paid_at' => 'required|date',
            "from_user_id" => "required|exists:users,id",
            "to_user_id" => "required|exists:users,id",
        ]);

        // Create a new settlement record
        $settlement = new Settlement();
        $settlement->amount = $validatedData['amount'];
        $settlement->from_user_id = $validatedData['from_user_id'];
        $settlement->to_user_id = $validatedData['to_user_id'];
        $settlement->expense_id = $validatedData['expense_id'];
        $settlement->paid_at = $validatedData['paid_at'];
        $settlement->save();

        // Redirect back to the settlements page with a success message
        return redirect()->route('expenses.show', ['id' => $validatedData['expense_id']])
            ->with('success', 'Settlement created successfully!');
    }
}
