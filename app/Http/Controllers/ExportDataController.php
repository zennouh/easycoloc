<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Models\Expense;
use App\Exports\ExpensesReportExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportDataController extends Controller
{

    public function exportExpenses()
    {
        return Excel::download(new ExpensesReportExport, 'expenses_report.xlsx');
    }
}
