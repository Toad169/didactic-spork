<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //
    public function index()
    {
        $accounts = Account::all();
        return response()->json($accounts);
    }
    public function show($id)
    {
        $account = Account::findOrFail($id);
        return response()->json($account);
    }
    public function store(Request $request)
    {
        $account = Account::create($request->all());
        return response()->json($account, 201);
    }
    public function update(Request $request, $id)
    {
        $account = Account::findOrFail($id);
        $account->update($request->all());
        return response()->json($account);
    }
    public function close($id)
    {
        $account = Account::findOrFail($id);
        $account->delete();
        return response()->json(['message' => 'Account closed']);
    }
}
