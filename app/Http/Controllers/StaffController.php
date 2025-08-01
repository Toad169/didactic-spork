<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Accounts;
use App\Models\Reports;
use App\Models\Savings;
use App\Models\Transactions;
use App\Models\Transfers;
use App\Models\Contracts;
use App\Models\Goals;
use App\Models\Budget;
use App\Models\Logs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;


class StaffController extends Controller
{
    //
    public function dashboard()
    {
        $users = User::all();
        $account = Auth::user()->account;
        $goals = Goals::all();
        $budgets = Budget::all();            $reports = Reports::all();
        $savings = Savings::all();
        $transactions = Transactions::all();
        $transfers = Transfers::all();
        return view('dashboard.home', compact('account', 'goals', 'budgets', 'reports', 'savings', 'transactions', 'transfers', 'users'));
    }
    public function budget()
    {
        $budgets = Budget::all();
        return view('dashboard.budget', compact('budgets'));
    }
    public function goals()
    {
        $goals = Goals::all();
        return view('dashboard.goals', compact('goals'));
    }

    // public function logs()
    // {
    //     $logs = Logs::all();
    //     return view('dashboard.logs', compact('logs'));
    // }

    public function reports()
    {
        $reports = Reports::all();
        return view('dashboard.reports', compact('reports'));
    }

    // public function roles()
    // {
    //     return view('dashboard.roles');
    // }

    public function savings()
    {
        $savings = Savings::all();
        return view('dashboard.savings', compact('savings'));
    }

    public function security()
    {
        return view('dashboard.security');
    }

    public function settings()
    {
        return view('dashboard.settings');
    }

    public function transactions()
    {
        $transactions = Transactions::all();
        return view('dashboard.transactions', compact('transactions'));
    }

    public function transfers()
    {
        $transfers = Transfers::all();
        return view('dashboard.transfers', compact('transfers'));
    }

    // public function users()
    // {
    //     $users = User::all();
    //     return view('dashboard.users', compact('users'));
    // }
}
