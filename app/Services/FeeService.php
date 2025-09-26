<?php

namespace App\Services;

use App\Models\Fee;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FeeService
{
    /**
     * The Fee model instance.
     */
    protected Fee $fee;

    /**
     * Create a new FeeServices instance.
     */
    public function __construct(Fee $fee)
    {
        $this->fee = $fee;
    }

    /**
     * Get all fees.
     */
    public function getAllFees(): Collection
    {
        return $this->fee->all();
    }

    /**
     * Get a single fee by its ID.
     */
    public function getFeeById(int $id): ?Fee
    {
        return $this->fee->find($id);
    }

    /**
     * Create a new fee.
     */
    public function createFee(array $data): Fee
    {
        return $this->fee->create($data);
    }

    /**
     * Update an existing fee.
     */
    public function updateFee(int $id, array $data): Fee
    {
        $fee = $this->fee->findOrFail($id);
        $fee->update($data);

        return $fee;
    }

    /**
     * Delete a fee.
     *
     * @throws ModelNotFoundException
     */
    public function deleteFee(int $id): bool
    {
        $fee = $this->fee->findOrFail($id);

        return $fee->delete();
    }
}
