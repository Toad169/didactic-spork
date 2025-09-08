<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Auth\SignInController as SignIn;
use App\Http\Controllers\Auth\LogInController as LogIn;
use App\Http\Controllers\UserController as User;
use App\Http\Controllers\Controller;

Route::view('/',  view: 'index');

Route::post('/login', [LogIn::class, 'login'])->name('login.post');
Route::post('/signin', [SignIn::class, 'signin'])->name('signin.post');
Route::post('/logout', [LogIn::class, 'logout'])->name('logout');

Route::middleware(['auth'])
    ->group(function () {
        Route::get('/dashboard', [User::class, 'dashboard'])->name('dashboard');

        // Route::get('/dashboard/budget', [User::class, 'budget'])->name('budget');

        // Route::get('/dashboard/goals', [User::class, 'goals'])->name('goals');

        // Route::get('/dashboard/logs', [User::class, 'logs'])->name('logs');

        // Route::get('/dashboard/reports', [User::class, 'reports'])->name('reports');

        // Route::get('/dashboard/savings', [User::class, 'savings'])->name('savings');

        // Route::get('/dashboard/security', [User::class, 'security'])->name('security');

        // Route::get('/dashboard/settings', [User::class, 'settings'])->name('settings');

        // Route::get('/dashboard/transactions', [User::class, 'transactions'])->name('transactions');

        // Route::get('/dashboard/transfers', [User::class, 'transfers'])->name('transfers');

        // Route::get('/dashboard/users', [User::class, 'users'])->name('users');

        // Additional named routes for missing blade links
        // Route::get('/dashboard/reports/{id}', 'App\Http\Controllers\ReportController@show')->name('reports.show');
        // Route::post('/dashboard/security/change-password', 'App\Http\Controllers\SecurityController@changePassword')->name('password.change');
        // Route::post('/dashboard/settings/update', 'App\Http\Controllers\SettingsController@update')->name('settings.update');
    });



require __DIR__.'/auth.php';

