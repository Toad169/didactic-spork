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

    public function notifications()
    {
        $user = Auth::user();

        return view('dashboard.natifications', compact('natifications'));
    }

     public function saving()
    {
        $user = Auth::user();

        return view('dashboard.saving', compact('saving'));
    }

     public function setting()
    {
        $user = Auth::user();

        return view('dashboard.setting', compact('setting'));
    }

    public function transactions()
    {
        $user = Auth::user();

        $transactions = $user->transactions; 

        return view('dashboard.transactions', compact('transactions'));
    }

    public function users()
    {
        $users = Auth::user();
        return view('dashboard.users', compact('users'));
    }

    public function zakat()
    {
        $user = Auth::user();

        return view('dashboard. zakat', compact('zakat'));
    }

    public function dashboards()
    {
        $user = Auth::user();

        return view('dashboard. dashboard', compact('dashboard'));
    }

    public function profile()
    {
    $user = Auth::user();

    return view('dashboard.profile', compact('profile'));
    }

   public function laporan()
{
    $user = Auth::user();
 
    return view('dashboard.laporan', compact('laporan'));
}

}
