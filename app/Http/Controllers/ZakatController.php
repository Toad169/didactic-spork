<?php

namespace App\Http\Controllers;

use App\Models\Zakat;
use Illuminate\Http\Request;

class ZakatController extends Controller
{
    //
    public function index()
    {
        $zakatRecords = Zakat::all();
        return response()->json($zakatRecords);
    }

    public function store(Request $request)
    {
        $zakat = Zakat::create($request->all());
        return response()->json($zakat, 201);
    }

    public function show($id)
    {
        $zakat = Zakat::find($id);
        if (!$zakat) {
            return response()->json(['message' => 'Zakat record not found'], 404);
        }
        return response()->json($zakat);
    }

    // public function update(Request $request, $id)
    // {

    // }

    public function calculate(Request $request)
    {
        // Placeholder for Zakat calculation logic
        $amount = $request->input('amount');
        $rate = 0.025; // Example rate of 2.5%
        $zakatDue = $amount * $rate;

        return response()->json(['zakat_due' => $zakatDue]);
    }
}
