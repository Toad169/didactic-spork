<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ViewController extends Controller
{
    //
    public function dashboard(): View
    {
        // $users = User::all();
        // $accounts = Account::all();
        // $transactions = Transaction::all();
        // $audit = Audit::all();
        // $profiles = Profile::all();
        // $contracts = Contract::all();
        // $fees = Fee::all();
        // $payments = Payment::all();
        // $profit = Profit::all();
        // $savings = Saving::all();
        // $zakats = Zakat::all();

        $user = Auth::user();

        return view('dashboard', compact('user'));
    }

    public function home()
    {
        $user = Auth::user();

        return view('dashboard.home', compact('user'));
    }
}
