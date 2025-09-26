<?php

namespace App\Services;

use App\Models\ProfitDistribution;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProfitDistributionService
{
    /**
     * The ProfitDistribution model instance.
     */
    protected ProfitDistribution $profitDistribution;

    /**
     * Create a new ProfitDisributionService instance.
     */
    public function __construct(ProfitDistribution $profitDistribution)
    {
        $this->profitDistribution = $profitDistribution;
    }

    /**
     * Get all profit distributions.
     */
    public function getAllProfitDistributions(): Collection
    {
        return $this->profitDistribution->all();
    }

    /**
     * Get a single profit distribution by its ID.
     */
    public function getProfitDistributionById(int $id): ?ProfitDistribution
    {
        return $this->profitDistribution->find($id);
    }

    /**
     * Create a new profit distribution.
     */
    public function createProfitDistribution(array $data): ProfitDistribution
    {
        return $this->profitDistribution->create($data);
    }

    /**
     * Update an existing profit distribution.
     */
    public function updateProfitDistribution(int $id, array $data): ProfitDistribution
    {
        $profitDistribution = $this->profitDistribution->findOrFail($id);
        $profitDistribution->update($data);

        return $profitDistribution;
    }

    /**
     * Delete a profit distribution.
     *
     * @throws ModelNotFoundException
     */
    public function deleteProfitDistribution(int $id): bool
    {
        $profitDistribution = $this->profitDistribution->findOrFail($id);

        return $profitDistribution->delete();
    }
}
