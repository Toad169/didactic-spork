<?php

namespace App\Services;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TransactionService
{
    /**
     * The Transaction model instance.
     */
    protected Transaction $transaction;

    /**
     * Create a new TransactionService instance.
     */
    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * Get all transactions.
     */
    public function getAllTransactions(): Collection
    {
        return $this->transaction->all();
    }

    /**
     * Get a single transaction by its ID.
     */
    public function getTransactionById(int $id): ?Transaction
    {
        return $this->transaction->find($id);
    }

    /**
     * Create a new transaction.
     */
    public function createTransaction(array $data): Transaction
    {
        return $this->transaction->create($data);
    }

    /**
     * Update an existing transaction.
     */
    public function updateTransaction(int $id, array $data): Transaction
    {
        $transaction = $this->transaction->findOrFail($id);
        $transaction->update($data);

        return $transaction;
    }

    /**
     * Delete a transaction.
     *
     * @throws ModelNotFoundException
     */
    public function deleteTransaction(int $id): bool
    {
        $transaction = $this->transaction->findOrFail($id);

        return $transaction->delete();
    }
}
