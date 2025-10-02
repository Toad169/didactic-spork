<?php

use App\Http\Controllers\Auth\LogInController;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\SavingController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [ViewController::class, 'index'])->name('index');

// Authentication routes (assuming these controllers exist)
Route::post('/login', [LogInController::class, 'login'])->name('login.post');
Route::post('/signin', [SignInController::class, 'signin'])->name('signin.post');
Route::post('/logout', [LogInController::class, 'logout'])->name('logout');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    // Dashboard routes
    // Route::get('/dashboard', [ViewController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [ViewController::class, 'home'])->name('home');

    // Savings routes
    Route::resource('/dashboard/savings', SavingController::class);
    Route::post('/dashboard/savings/{id}/close', [SavingController::class, 'close'])->name('savings.close');

    // Transaction routes
    Route::resource('/dashboard/transactions', TransactionController::class);
    Route::post('/dashboard/transactions/{id}/cancel', [TransactionController::class, 'cancel'])->name('transactions.cancel');

    // User routes (web version - view only)
    Route::resource('users', UserController::class)->only(['index', 'show']);
});

// Route::middleware('role.staff')->group(function () {
//     // Route::get('/dashboard', [ViewController::class, 'dashboard'])->name('dashboard');
//     Route::get('/dashboard', [ViewController::class, 'home'])->name('home');

//     // Savings routes
//     Route::resource('/dashboard/savings', SavingController::class);
//     Route::post('/dashboard/savings/{id}/close', [SavingController::class, 'close'])->name('savings.close');

//     // Transaction routes
//     Route::resource('/dashboard/transactions', TransactionController::class);
//     Route::post('/dashboard/transactions/{id}/cancel', [TransactionController::class, 'cancel'])->name('transactions.cancel');

//     // User routes (web version - view only)
//     Route::resource('users', UserController::class)->only(['index', 'show']);
// });

// Route::middleware('role.admin')->group(function () {
//     // Route::get('/dashboard', [ViewController::class, 'dashboard'])->name('dashboard');
//     Route::get('/dashboard', [ViewController::class, 'home'])->name('home');

//     // Savings routes
//     Route::resource('/dashboard/savings', SavingController::class);
//     Route::post('/dashboard/savings/{id}/close', [SavingController::class, 'close'])->name('savings.close');

//     // Transaction routes
//     Route::resource('/dashboard/transactions', TransactionController::class);
//     Route::post('/dashboard/transactions/{id}/cancel', [TransactionController::class, 'cancel'])->name('transactions.cancel');

//     // User routes (web version - view only)
//     Route::resource('users', UserController::class)->only(['index', 'show']);
// });

require __DIR__.'/auth.php';
require __DIR__.'/api.php';
