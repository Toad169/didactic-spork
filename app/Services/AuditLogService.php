<?php

namespace App\Services;

use App\Models\AuditLog;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class AuditLogService
{
    /**
     * The AuditLog model instance.
     */
    protected AuditLog $auditLog;

    /**
     * Create a new AuditLogService instance.
     */
    public function __construct(AuditLog $auditLog)
    {
        $this->auditLog = $auditLog;
    }

    /**
     * Get a paginated list of audit logs.
     */
    public function getAuditLogs(Request $request): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->auditLog->latest()->paginate($request->get('per_page', 15));
    }

    /**
     * Create a new audit log entry.
     */
    public function createLog(array $data): AuditLog
    {
        return $this->auditLog->create($data);
    }

    /**
     * Get audit logs for a specific model.
     */
    public function getLogsForModel(string $modelType, int $modelId): Collection
    {
        return $this->auditLog->where('model_type', $modelType)
            ->where('model_id', $modelId)
            ->get();
    }
}
