<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    //
    public function index()
    {
        $contracts = Contract::all();
        return response()->json($contracts);
    }
    public function show($id)
    {
        $contract = Contract::findOrFail($id);
        return response()->json($contract);
    }
    public function store(Request $request)
    {
        $contract = Contract::create($request->all());
        return response()->json($contract, 201);
    }
    public function update(Request $request, $id)
    {
        $contract = Contract::findOrFail($id);
        $contract->update($request->all());
        return response()->json($contract);
    }
    public function terminate($id)
    {
        $contract = Contract::findOrFail($id);
        $contract->delete();
        return response()->json(['message' => 'Contract terminated']);
    }
}
