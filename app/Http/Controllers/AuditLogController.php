<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    //
    public function index()
    {
        $logs = AuditLog::all();
        return response()->json($logs);
    }
    public function show($id)
    {
        $log = AuditLog::find($id);
        if (!$log) {
            return response()->json(['message' => 'Audit log not found'], 404);
        }
        return response()->json($log);
    }
}
