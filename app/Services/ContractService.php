<?php

namespace App\Services;

use App\Models\Contract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContractService
{
    /**
     * The Contract model instance.
     */
    protected Contract $contract;

    /**
     * Create a new ContractService instance.
     */
    public function __construct(Contract $contract)
    {
        $this->contract = $contract;
    }

    /**
     * Get all contracts.
     */
    public function getAllContracts(): Collection
    {
        return $this->contract->all();
    }

    /**
     * Get a single contract by its ID.
     */
    public function getContractById(int $id): ?Contract
    {
        return $this->contract->find($id);
    }

    /**
     * Create a new contract.
     */
    public function createContract(array $data): Contract
    {
        return $this->contract->create($data);
    }

    /**
     * Update an existing contract.
     */
    public function updateContract(int $id, array $data): Contract
    {
        $contract = $this->contract->findOrFail($id);
        $contract->update($data);

        return $contract;
    }

    /**
     * Delete a contract.
     *
     * @throws ModelNotFoundException
     */
    public function deleteContract(int $id): bool
    {
        $contract = $this->contract->findOrFail($id);

        return $contract->delete();
    }

    /**
     * Get contracts for a specific account.
     */
    public function getContractsByAccountId(int $accountId): Collection
    {
        return $this->contract->where('account_id', $accountId)->get();
    }

    /**
     * Terminate a contract.
     *
     * @throws ModelNotFoundException
     */
    public function terminateContract(int $id): bool
    {
        $contract = $this->contract->findOrFail($id);
        $contract->status = 'terminated';

        return $contract->save();
    }
}
