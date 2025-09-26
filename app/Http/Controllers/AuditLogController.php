<?php

namespace App\Http\Controllers;

use App\Services\AuditLogService;
use Illuminate\Http\JsonResponse;

class AuditLogController extends Controller
{
    /**
     * The audit log service instance.
     */
    protected AuditLogService $auditLogService;

    /**
     * Create a new AuditLogController instance.
     */
    public function __construct(AuditLogService $auditLogService)
    {
        $this->auditLogService = $auditLogService;
    }

    /**
     * Display a listing of the audit logs.
     */
    public function index(): JsonResponse
    {
        $logs = $this->auditLogService->getAllLogs();

        return response()->json($logs);
    }

    /**
     * Display the specified audit log.
     */
    public function show(int $id): JsonResponse
    {
        $log = $this->auditLogService->getLogById($id);

        return response()->json($log);
    }
}
