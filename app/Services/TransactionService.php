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

    /**
     * Get transactions by user ID.
     */
    public function getTransactionsByUserId(int $userId): Collection
    {
        return $this->transaction->where('user_id', $userId)->get();
    }

    /**
     * Get transactions by account ID.
     */
    public function getTransactionsByAccountId(int $accountId): Collection
    {
        return $this->transaction->where('account_id', $accountId)->get();
    }

    /**
     * Get transactions by date range.
     */
    public function getTransactionsByDateRange(string $startDate, string $endDate): Collection
    {
        return $this->transaction->whereBetween('created_at', [$startDate, $endDate])->get();
    }

    /**
     * Get transactions by transaction type.
     */
    public function getTransactionsByType(string $type): Collection
    {
        return $this->transaction->where('type', $type)->get();
    }

    /**
     * Get total transaction amount by user ID.
     */
    public function getTotalTransactionAmountByUserId(int $userId): float
    {
        return $this->transaction->where('user_id', $userId)->sum('amount');
    }

    /**
     * Get total transaction amount by account ID.
     */
    public function getTotalTransactionAmountByAccountId(int $accountId): float
    {
        return $this->transaction->where('account_id', $accountId)->sum('amount');
    }

    /**
     * Get recent transactions.
     */
    public function getRecentTransactions(int $limit = 10): Collection
    {
        return $this->transaction->orderByDesc('created_at')->limit($limit)->get();
    }

    /**
     * Update a transaction for a specific user.
     *
     * @throws ModelNotFoundException
     */
    public function updateTransactionForUser(int $id, array $data, int $userId): Transaction
    {
        $transaction = $this->transaction->where('id', $id)->where('user_id', $userId)->firstOrFail();
        $transaction->update($data);

        return $transaction;
    }

    public function getTransactionByIdAndUserId(int $id, int $userId): ?Transaction
    {
        return $this->transaction->where('id', $id)->where('user_id', $userId)->first();
    }

    public function deleteTransactionForUser(int $id, int $userId): bool
    {
        $transaction = $this->transaction->where('id', $id)->where('user_id', $userId)->firstOrFail();

        return $transaction->delete();
    }
}
