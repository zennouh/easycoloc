<?php

namespace App\Exports;

use App\Models\Expense;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExpensesReportExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Expense::with([
            'category',
            'colocation',
        ])
            ->get()
            ->map(function ($expense) {


                return [
                    'expense_id'        => $expense->id,
                    'expense_title'     => $expense->title,
                    'expense_amount'    => $expense->amount,
                    'expense_date'      => $expense->date,
                    'category'          => $expense->category?->name,
                    'colocation'     => $expense->colocation?->name,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'expense_id',
            'expense_title',
            'expense_amount',
            'expense_date',
            'category',
            'colocation'
        ];
    }
}
