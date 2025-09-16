<?php

namespace App\Http\Controllers;

// use App\Actions\User\Create;
// use App\Actions\User\Update;
// use App\Actions\User\Delete;

use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\AuditLog as Audit;
use App\Models\Profile;
use App\Models\Contract;
use App\Models\Fee;
use App\Models\Payment;
use App\Models\ProfitDistribution as Profit;
use App\Models\Saving;
use App\Models\Zakat;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'nullable|string|max:20',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'] ?? null,
            'password' => bcrypt($validated['password']),
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user,
        ], 201);
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:users,email,' . $user->id,
            'phone_number' => 'nullable|string|max:20',
            'password' => 'sometimes|required|string|min:8',
        ]);

        if (isset($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        }

        $user->update($validated);

        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user,
        ]);
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully',
        ]);
    }

    // below functions is a View specific functions

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
