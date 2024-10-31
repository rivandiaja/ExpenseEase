<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;

// Route untuk halaman utama
Route::view('/', 'welcome');

// Route setelah login
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // Route untuk expenses
    Route::get('expenses', [ExpenseController::class, 'index'])->name('expenses.index');
    Route::get('expenses/create', [ExpenseController::class, 'create'])->name('expenses.create');
    Route::post('expenses', [ExpenseController::class, 'store'])->name('expenses.store');
    Route::get('expenses/{id}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit');
    Route::put('expenses/{id}', [ExpenseController::class, 'update'])->name('expenses.update');
    Route::delete('expenses/{id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
});

// Route untuk profile
Route::view('profile', 'profile')->middleware('auth')->name('profile');

// Include routes for authentication
require __DIR__.'/auth.php';
