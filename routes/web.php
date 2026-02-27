<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettlementController;
use Illuminate\Support\Facades\Route;

Route::get('/done', function () {
    return view('done');
})->name("done");


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, "index"])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/colocation', [ColocationController::class, 'index'])->name('colocations.index');
    Route::post('/colocation', [ColocationController::class, 'store'])->name('colocations.store');
    Route::post('/colocation/invite/{colocation}', [ColocationController::class, 'invite'])->name('colocations.invite');
    Route::get('/accept-invite', [ColocationController::class, 'invitationsClick'])
        ->name('invitations.click')
        ->middleware('signed');

    Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
    Route::get('/expenses/{id}', [ExpenseController::class, 'show'])->name('expenses.show');
    // Route::put('/expenses/{id}', [ExpenseController::class, 'update'])->name('expenses.update');
    // Route::delete('/expenses/{id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');


    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

    Route::post('/pay', [SettlementController::class, 'pay'])->name(name: 'settlement.pay');
});

require __DIR__ . '/auth.php';
