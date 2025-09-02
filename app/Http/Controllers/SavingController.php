<?php

namespace App\Http\Controllers;

use App\Models\Saving;
use Illuminate\Http\Request;

class SavingController extends Controller
{
    //
    public function index()
    {
        $savings = Saving::all();
        return view('savings.index', compact('savings'));
    }
    public function show($id)
    {
        $saving = Saving::findOrFail($id);
        return view('savings.show', compact('saving'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $saving = Saving::create($request->all());
        return redirect()->route('savings.show', $saving->id);
    }
    public function update(Request $request, $id)
    {
        $saving = Saving::findOrFail($id);

        $validated = $request->validate([
            'amount' => 'sometimes|required|numeric',
            'type' => 'sometimes|required|string',
            'description' => 'nullable|string',
        ]);

        $saving->update($validated);
        return redirect()->route('savings.show', $saving->id);
    }
    public function close($id)
    {
        $saving = Saving::findOrFail($id);
        $saving->delete();
        return redirect()->route('savings.index');
    }
}
