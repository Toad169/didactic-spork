<?php

namespace App\Http\Controllers;

use App\Services\ProfileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    /**
     * The profile service instance.
     */
    protected ProfileService $profileService;

    /**
     * Create a new ProfileController instance.
     */
    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    /**
     * Update the specified profile in storage.
     *
     * @throws ValidationException
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $validatedData = $request->validate([
            'avatar' => 'nullable|string',
            'bio' => 'nullable|string',
            'address' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
        ]);

        $profile = $this->profileService->updateProfile($id, $validatedData);

        return response()->json($profile);
    }
}
