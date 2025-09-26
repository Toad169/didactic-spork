<?php

namespace App\Services;

use App\Models\Zakat;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ZakatService
{
    /**
     * The Zakat model instance.
     */
    protected Zakat $zakat;

    /**
     * Create a new ZakatService instance.
     */
    public function __construct(Zakat $zakat)
    {
        $this->zakat = $zakat;
    }

    /**
     * Get all Zakat entries.
     */
    public function getAllZakats(): Collection
    {
        return $this->zakat->all();
    }

    /**
     * Get a single Zakat entry by its ID.
     */
    public function getZakatById(int $id): ?Zakat
    {
        return $this->zakat->find($id);
    }

    /**
     * Create a new Zakat entry.
     */
    public function createZakat(array $data): Zakat
    {
        return $this->zakat->create($data);
    }

    /**
     * Update an existing Zakat entry.
     */
    public function updateZakat(int $id, array $data): Zakat
    {
        $zakat = $this->zakat->findOrFail($id);
        $zakat->update($data);

        return $zakat;
    }

    /**
     * Delete a Zakat entry.
     *
     * @throws ModelNotFoundException
     */
    public function deleteZakat(int $id): bool
    {
        $zakat = $this->zakat->findOrFail($id);

        return $zakat->delete();
    }

    /**
     * Calculate Zakat for a specific user.
     *
     * This method would contain the business logic for Zakat calculation,
     * such as fetching user assets, liabilities, and applying the Nisab threshold.
     */
    public function calculateZakatForUser(int $userId, int $year): float
    {
        // Placeholder for Zakat calculation logic.
        // You would fetch user data, savings, etc. to perform the calculation.
        // For example:
        // $user = User::with(['accounts.savings'])->find($userId);
        // ... perform calculation logic ...
        // return $calculatedAmount;

        return 0.00; // Return a default value for now.
    }
}
