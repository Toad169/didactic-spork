<?php

namespace App\Services;

use App\Models\Saving;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SavingService
{
    /**
     * The Saving model instance.
     */
    protected Saving $saving;

    /**
     * Create a new SavingService instance.
     */
    public function __construct(Saving $saving)
    {
        $this->saving = $saving;
    }

    /**
     * Get all savings.
     */
    public function getAllSavings(): Collection
    {
        return $this->saving->all();
    }

    /**
     * Get a single saving by its ID.
     */
    public function getSavingById(int $id): ?Saving
    {
        return $this->saving->find($id);
    }

    /**
     * Create a new saving.
     */
    public function createSaving(array $data): Saving
    {
        return $this->saving->create($data);
    }

    /**
     * Update an existing saving.
     */
    public function updateSaving(int $id, array $data): Saving
    {
        $saving = $this->saving->findOrFail($id);
        $saving->update($data);

        return $saving;
    }

    /**
     * Delete a saving.
     *
     * @throws ModelNotFoundException
     */
    public function deleteSaving(int $id): bool
    {
        $saving = $this->saving->findOrFail($id);

        return $saving->delete();
    }

    public function getSavingsByUserId(int $userId): Collection
    {
        return $this->saving->where('user_id', $userId)->get();
    }

    public function getTotalSavingsByUserId(int $userId): float
    {
        return $this->saving->where('user_id', $userId)->sum('amount');
    }

    public function getSavingsByDateRange(string $startDate, string $endDate): Collection
    {
        return $this->saving->whereBetween('created_at', [$startDate, $endDate])->get();
    }

    public function getAverageSavingAmount(): float
    {
        return $this->saving->avg('amount');
    }

    public function getTopSavvyUsers(int $limit = 10): Collection
    {
        return $this->saving->select('user_id')
            ->selectRaw('SUM(amount) as total_saving')
            ->groupBy('user_id')
            ->orderByDesc('total_saving')
            ->limit($limit)
            ->get();
    }

    public function getSavingsWithMinimumAmount(float $minAmount): Collection
    {
        return $this->saving->where('amount', '>=', $minAmount)->get();
    }

    public function getSavingsWithMaximumAmount(float $maxAmount): Collection
    {
        return $this->saving->where('amount', '<=', $maxAmount)->get();
    }

    public function getSavingsByType(string $type): Collection
    {
        return $this->saving->where('type', $type)->get();
    }

    public function getRecentSavings(int $days = 30): Collection
    {
        $date = now()->subDays($days);

        return $this->saving->where('created_at', '>=', $date)->get();
    }

    /**
     * Close a saving.
     *
     * @throws ModelNotFoundException
     */
    public function closeSaving(int $id): bool
    {
        $saving = $this->saving->findOrFail($id);
        $saving->status = 'closed';

        return $saving->save();
    }
}
