<?php

namespace App\Http\Controllers;

use App\Models\ProfitSharing;
use Illuminate\Http\Request;

class ProfitSharingController extends Controller
{
    //
    public function index()
    {
        $distributions = ProfitSharing::all();
        return response()->json($distributions);
    }
    public function distribute(Request $request)
    {
        $distribution = ProfitSharing::create($request->all());
        return response()->json($distribution, 201);
    }
}
