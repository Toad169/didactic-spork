<?php

namespace App\Services;

use App\Models\Account;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AccountService
{
    /**
     * The Account model instance.
     */
    protected Account $account;

    /**
     * Create a new AccountService instance.
     */
    public function __construct(Account $account)
    {
        $this->account = $account;
    }

    /**
     * Get all accounts.
     */
    public function getAllAccounts(): Collection
    {
        return $this->account->all();
    }

    /**
     * Get a single account by its ID.
     */
    public function getAccountById(int $id): ?Account
    {
        return $this->account->find($id);
    }

    /**
     * Create a new account.
     */
    public function createAccount(array $data): Account
    {
        return $this->account->create($data);
    }

    /**
     * Update an existing account.
     */
    public function updateAccount(int $id, array $data): Account
    {
        $account = $this->account->findOrFail($id);
        $account->update($data);

        return $account;
    }

    /**
     * Delete an account.
     *
     * @throws ModelNotFoundException
     */
    public function deleteAccount(int $id): bool
    {
        $account = $this->account->findOrFail($id);

        return $account->delete();
    }
}
