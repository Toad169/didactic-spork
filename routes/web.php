<?php

use App\Http\Controllers\Auth\LogInController as LogIn;
use App\Http\Controllers\Auth\SignInController as SignIn;
// use App\Http\Controllers\UserController as User;
use App\Http\Controllers\ViewController as View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', view: 'index');

Route::post('/login', [LogIn::class, 'login'])->name('login.post');
Route::post('/signin', [SignIn::class, 'signin'])->name('signin.post');
Route::post('/logout', [LogIn::class, 'logout'])->name('logout');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

Route::middleware(['auth'])
    ->group(function () {
        Route::get('/dashboard', [View::class, 'dashboard'])->name('dashboard');

        Route::get('/dashboard/home', [View::class, 'home'])->name('home');

        // Route::get('/dashboard/accounts', [View::class, 'accountIndex'])->name('accounts.index');

        // Route::get('/dashboard/accounts/{account}', [View::class, 'accountShow'])->name('accounts.show');

        // Route::get('/dashboard/accounts/{account}/transactions', [View::class, 'accountTransaction'])->name('accounts.transactions');

        // Additional named routes for missing blade links
        Route::post('/dashboard/security/change-password', 'App\Http\Controllers\SecurityController@changePassword')->name('dashboard.password.change');
    });

require __DIR__.'/auth.php';
