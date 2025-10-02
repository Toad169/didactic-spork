<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ViewController extends Controller
{
    /**
     * Show the application dashboard.
     */
    public function index(): View
    {
        return view('index');
    }

    /**
     * Show the application dashboard.
     */
    public function dashboard(): View
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Retrieve data needed for the dashboard from models or services
        $accounts = Account::where('user_id', $user->id)->get();
        $transactions = Transaction::where('user_id', $user->id)->orderBy('created_at', 'desc')->take(5)->get();

        // Pass the user and other data to the 'dashboard' view
        return view('dashboard', compact('user', 'accounts', 'transactions'));
    }

    /**
     * Show the application home page.
     */
    public function home(): View
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Pass the user data to the 'dashboard.home' view
        return view('dashboard.home', compact('user'));
    }
}
