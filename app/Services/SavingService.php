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
}
