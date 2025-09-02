<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    //
    public function index()
    {
        $fees = Fee::all();
        return response()->json($fees);
    }

    public function show($id)
    {
        $fee = Fee::findOrFail($id);
        return response()->json($fee);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        Fee::create($request->all());

        return response()->json(['message' => 'Fee created successfully.'], 201);
    }
    public function update(Request $request, $id)
    {
        $fee = Fee::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'amount' => 'sometimes|required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $fee->update($validated);
        return response()->json(['message' => 'Fee updated successfully.']);
    }
    public function remove($id)
    {
        $fee = Fee::findOrFail($id);
        $fee->delete();
        return response()->json(['message' => 'Fee removed successfully.']);
    }
}
