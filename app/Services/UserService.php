<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * The User model instance.
     */
    protected User $user;

    /**
     * Create a new UserService instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get all users.
     */
    public function getAllUsers(): Collection
    {
        return $this->user->all();
    }

    /**
     * Get a single user by its ID.
     */
    public function getUserById(int $id): ?User
    {
        return $this->user->find($id);
    }

    /**
     * Create a new user.
     */
    public function createUser(array $data): User
    {
        // Hash the password before creating the user
        $data['password'] = Hash::make($data['password']);

        return $this->user->create($data);
    }

    /**
     * Update an existing user.
     */
    public function updateUser(int $id, array $data): User
    {
        $user = $this->user->findOrFail($id);
        $user->update($data);

        return $user;
    }

    /**
     * Delete a user.
     *
     * @throws ModelNotFoundException
     */
    public function deleteUser(int $id): bool
    {
        $user = $this->user->findOrFail($id);

        return $user->delete();
    }
}
