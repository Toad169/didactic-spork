<?php

namespace App\Services;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProfileService
{
    /**
     * The Profile model instance.
     */
    protected Profile $profile;

    /**
     * Create a new ProfileService instance.
     */
    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    /**
     * Get all profiles.
     */
    public function getAllProfiles(): Collection
    {
        return $this->profile->all();
    }

    /**
     * Get a single profile by its ID.
     */
    public function getProfileById(int $id): ?Profile
    {
        return $this->profile->find($id);
    }

    /**
     * Create a new profile.
     */
    public function createProfile(array $data): Profile
    {
        return $this->profile->create($data);
    }

    /**
     * Update an existing profile.
     */
    public function updateProfile(int $id, array $data): Profile
    {
        $profile = $this->profile->findOrFail($id);
        $profile->update($data);

        return $profile;
    }

    /**
     * Delete a profile.
     *
     * @throws ModelNotFoundException
     */
    public function deleteProfile(int $id): bool
    {
        $profile = $this->profile->findOrFail($id);

        return $profile->delete();
    }
}
