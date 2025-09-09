<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    public function index()
    {
        $transactions = Auth::user()->transactions()->get();
        return view('transactions.index', compact('transactions'));
    }
    public function show($id)
    {
        $transaction = Auth::user()->transactions()->findOrFail($id);
        return view('transactions.show', compact('transaction'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|in:credit,debit',
            'description' => 'nullable|string',
        ]);

        $transaction = Auth::user()->transactions()->create($request->all());
        return redirect()->route('transactions.show', $transaction->id);
    }
    public function update(Request $request, $id)
    {
        $transaction = Auth::user()->transactions()->findOrFail($id);

        $validated = $request->validate([
            'amount' => 'sometimes|required|numeric',
            'type' => 'sometimes|required|in:credit,debit',
            'description' => 'nullable|string',
        ]);

        $transaction->update($validated);
        return redirect()->route('transactions.show', $transaction->id);
    }
    public function cancel($id)
    {
        $transaction = Auth::user()->transactions()->findOrFail($id);
        $transaction->delete();
        return redirect()->route('transactions.index');
    }
}
