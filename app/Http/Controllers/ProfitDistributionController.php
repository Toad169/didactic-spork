<?php

namespace App\Http\Controllers;

use App\Models\ProfitDistribution;
use Illuminate\Http\Request;

class ProfitDistributionController extends Controller
{
    //
    public function index()
    {
        $distributions = ProfitDistribution::all();
        return response()->json($distributions);
    }
    public function distribute(Request $request)
    {
        $distribution = ProfitDistribution::create($request->all());
        return response()->json($distribution, 201);
    }
}
