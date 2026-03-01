<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ExportDataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettlementController;
use Illuminate\Support\Facades\Route;

Route::get('/done', function () {
    return view('done');
})->name("done");


Route::middleware('auth')->group(function () {
    // Route::get('/dashboard', [DashboardController::class, "index"])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/colocation', [ColocationController::class, 'index'])->name('colocations.index');
    Route::post('/colocation', [ColocationController::class, 'store'])->name('colocations.store');

    Route::post('/colocation/cancel/{colocation}', [ColocationController::class, 'cancel'])
        ->name('colocations.cancel');

    Route::delete('/colocation/{colocation}/remove-user/{user}', [ColocationController::class, 'removeUser'])
        ->name('colocations.removeUser');
    Route::post('/colocation/{colocation}/leave/{user}', [ColocationController::class, 'leaveColocation'])
        ->name('colocations.leave');

    Route::post('/colocation/invite/{colocation}', [ColocationController::class, 'invite'])->name('colocations.invite');
    Route::get('/accept-invite', [ColocationController::class, 'invitationsClick'])
        ->name('invitations.click')
        ->middleware('signed');


    Route::get('/expenses/exports', [ExportDataController::class, 'exportExpenses'])->name('export.exportExpenses');

    Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
    Route::get('/expenses/{id}', [ExpenseController::class, 'show'])->name('expenses.show');
    Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');


    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

    Route::post('/pay', [SettlementController::class, 'pay'])->name(name: 'settlement.pay');

    // admin panel routes
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'stats'])
        ->name('admin.stats');
    Route::post('/admin/users/{user}/toggle-ban', [\App\Http\Controllers\AdminController::class, 'toggleUserBan'])
        ->name('admin.users.toggleBan');

    // data export routes
    Route::get('/export/{type}', [\App\Http\Controllers\ExportDataController::class, 'export'])
        ->where('type', 'users|colocations|expenses')
        ->name('export.data');
    // simple expenses + settlements export
    Route::get('/export/expenses-settlements', [\App\Http\Controllers\ExportDataController::class, 'exportExpensesWithSettlements'])
        ->name('export.expenses.settlements');
});

require __DIR__ . '/auth.php';


Route::fallback(function () {
    return redirect()->route('login');
});
