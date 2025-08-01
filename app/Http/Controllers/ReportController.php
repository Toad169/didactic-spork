<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reports as Report;

class ReportController extends Controller
{
    //
    public function show($id)
{
    $report = Report::findOrFail($id);
    return view('components.materials.reports-show', compact('report'));
}

}
