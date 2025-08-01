<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\Auth\LogInController;
// use App\Models\User;
// use App\Models\Accounts;
// use App\Models\Reports;
// use App\Models\Savings;
// use App\Models\Transactions;
// use App\Models\Transfers;
// use App\Models\Contracts;
// use App\Models\Goals;
// use App\Models\Budget;
// use App\Models\Logs;
use App\Http\Controllers\ReportController as Report;
use App\Http\Controllers\AdminController as Admin;
use App\Http\Controllers\UserController as User;
use App\Http\Controllers\StaffController as Staff;
use App\Http\Controllers\AuditorController as Auditor;
use App\Http\Controllers\Controller;

Route::view('/',  view: 'index');

Route::post('/login', [App\Http\Controllers\Auth\LogInController::class, 'login'])->name('login.post');
Route::post('/signin', [App\Http\Controllers\Auth\SignInController::class, 'signin'])->name('signin.post');
Route::post('/logout', [App\Http\Controllers\Auth\LogInController::class, 'logout'])->name('logout');




// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

Route::middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/dashboard', [Admin::class, 'dashboard'])->name('dashboard');

        Route::get('/dashboard/budget', [Admin::class, 'budget'])->name('budget');

        Route::get('/dashboard/goals', [Admin::class, 'goals'])->name('goals');

        Route::get('/dashboard/logs', [Admin::class, 'logs'])->name('logs');

        Route::get('/dashboard/reports', [Admin::class, 'reports'])->name('reports');

        Route::get('/dashboard/savings', [Admin::class, 'savings'])->name('savings');

        Route::get('/dashboard/security', [Admin::class, 'security'])->name('security');

        Route::get('/dashboard/settings', [Admin::class, 'settings'])->name('settings');

        Route::get('/dashboard/transactions', [Admin::class, 'transactions'])->name('transactions');

        Route::get('/dashboard/transfers', [Admin::class, 'transfers'])->name('transfers');

        Route::get('/dashboard/users', [Admin::class, 'users'])->name('users');

        // Additional named routes for missing blade links
        Route::get('/dashboard/reports/{id}', 'App\Http\Controllers\ReportController@show')->name('reports.show');
        Route::post('/dashboard/security/change-password', 'App\Http\Controllers\SecurityController@changePassword')->name('password.change');
        Route::post('/dashboard/settings/update', 'App\Http\Controllers\SettingsController@update')->name('settings.update');
    });

Route::middleware(['auth', 'staff'])
    ->group(function () {
        Route::get('/dashboard', [Staff::class, 'dashboard'])->name('dashboard');

        Route::get('/dashboard/budget', [Staff::class, 'budget'])->name('budget');

        Route::get('/dashboard/goals', [Staff::class, 'goals'])->name('goals');

        Route::get('/dashboard/logs', [Staff::class, 'logs'])->name('logs');

        Route::get('/dashboard/reports', [Staff::class, 'reports'])->name('reports');

        Route::get('/dashboard/savings', [Staff::class, 'savings'])->name('savings');

        Route::get('/dashboard/security', [Staff::class, 'security'])->name('security');

        Route::get('/dashboard/settings', [Staff::class, 'settings'])->name('settings');

        Route::get('/dashboard/transactions', [Staff::class, 'transactions'])->name('transactions');

        Route::get('/dashboard/transfers', [Staff::class, 'transfers'])->name('transfers');

        Route::get('/dashboard/users', [Staff::class, 'users'])->name('users');

        // Additional named routes for missing blade links
        Route::get('/dashboard/reports/{id}', 'App\Http\Controllers\ReportController@show')->name('reports.show');
        Route::post('/dashboard/security/change-password', 'App\Http\Controllers\SecurityController@changePassword')->name('password.change');
        Route::post('/dashboard/settings/update', 'App\Http\Controllers\SettingsController@update')->name('settings.update');
    });

Route::middleware(['auth', 'auditor'])
    ->group(function () {
        Route::get('/dashboard', [Auditor::class, 'dashboard'])->name('dashboard');

        Route::get('/dashboard/budget', [Auditor::class, 'budget'])->name('budget');

        Route::get('/dashboard/goals', [Auditor::class, 'goals'])->name('goals');

        Route::get('/dashboard/logs', [Auditor::class, 'logs'])->name('logs');

        Route::get('/dashboard/reports', [Auditor::class, 'reports'])->name('reports');

        Route::get('/dashboard/savings', [Auditor::class, 'savings'])->name('savings');

        Route::get('/dashboard/security', [Auditor::class, 'security'])->name('security');

        Route::get('/dashboard/settings', [Auditor::class, 'settings'])->name('settings');

        Route::get('/dashboard/transactions', [Auditor::class, 'transactions'])->name('transactions');

        Route::get('/dashboard/transfers', [Auditor::class, 'transfers'])->name('transfers');

        Route::get('/dashboard/users', [Auditor::class, 'users'])->name('users');

        // Additional named routes for missing blade links
        Route::get('/dashboard/reports/{id}', 'App\Http\Controllers\ReportController@show')->name('reports.show');
        Route::post('/dashboard/security/change-password', 'App\Http\Controllers\SecurityController@changePassword')->name('password.change');
        Route::post('/dashboard/settings/update', 'App\Http\Controllers\SettingsController@update')->name('settings.update');
    });

Route::middleware(['auth', 'user'])
    ->group(function () {
        Route::get('/dashboard', [User::class, 'dashboard'])->name('dashboard');

        Route::get('/dashboard/budget', [User::class, 'budget'])->name('budget');

        Route::get('/dashboard/goals', [User::class, 'goals'])->name('goals');

        Route::get('/dashboard/logs', [User::class, 'logs'])->name('logs');

        Route::get('/dashboard/reports', [User::class, 'reports'])->name('reports');

        Route::get('/dashboard/savings', [User::class, 'savings'])->name('savings');

        Route::get('/dashboard/security', [User::class, 'security'])->name('security');

        Route::get('/dashboard/settings', [User::class, 'settings'])->name('settings');

        Route::get('/dashboard/transactions', [User::class, 'transactions'])->name('transactions');

        Route::get('/dashboard/transfers', [User::class, 'transfers'])->name('transfers');

        Route::get('/dashboard/users', [User::class, 'users'])->name('users');

        // Additional named routes for missing blade links
        Route::get('/dashboard/reports/{id}', 'App\Http\Controllers\ReportController@show')->name('reports.show');
        Route::post('/dashboard/security/change-password', 'App\Http\Controllers\SecurityController@changePassword')->name('password.change');
        Route::post('/dashboard/settings/update', 'App\Http\Controllers\SettingsController@update')->name('settings.update');
    });

Route::middleware(['auth'])
    ->group(function () {
        Route::get('/dashboard', [User::class, 'dashboard'])->name('dashboard');

        Route::get('/dashboard/budget', [User::class, 'budget'])->name('budget');

        Route::get('/dashboard/goals', [User::class, 'goals'])->name('goals');

        Route::get('/dashboard/logs', [User::class, 'logs'])->name('logs');

        Route::get('/dashboard/reports', [User::class, 'reports'])->name('reports');

        Route::get('/dashboard/savings', [User::class, 'savings'])->name('savings');

        Route::get('/dashboard/security', [User::class, 'security'])->name('security');

        Route::get('/dashboard/settings', [User::class, 'settings'])->name('settings');

        Route::get('/dashboard/transactions', [User::class, 'transactions'])->name('transactions');

        Route::get('/dashboard/transfers', [User::class, 'transfers'])->name('transfers');

        Route::get('/dashboard/users', [User::class, 'users'])->name('users');

        // Additional named routes for missing blade links
        Route::get('/dashboard/reports/{id}', 'App\Http\Controllers\ReportController@show')->name('reports.show');
        Route::post('/dashboard/security/change-password', 'App\Http\Controllers\SecurityController@changePassword')->name('password.change');
        Route::post('/dashboard/settings/update', 'App\Http\Controllers\SettingsController@update')->name('settings.update');
    });

require __DIR__.'/auth.php';

