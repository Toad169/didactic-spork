<?php

namespace App\Http\Controllers;

use App\Services\AccountService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AccountController extends Controller
{
    /**
     * The account service instance.
     */
    protected AccountService $accountService;

    /**
     * Create a new AccountController instance.
     */
    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    /**
     * Display a listing of the accounts.
     */
    public function index(): JsonResponse
    {
        $accounts = $this->accountService->getAllAccounts();

        return response()->json($accounts);
    }

    /**
     * Display the specified account.
     */
    public function show(int $id): JsonResponse
    {
        $account = $this->accountService->getAccountById($id);

        return response()->json($account);
    }

    /**
     * Store a newly created account in storage.
     *
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'account_number' => 'required|string|unique:accounts,account_number',
            'account_type' => 'required|in:savings,current,fixed',
            'title' => 'nullable|string',
        ]);

        $account = $this->accountService->createAccount($validatedData);

        return response()->json($account, 201);
    }

    /**
     * Update the specified account in storage.
     *
     * @throws ValidationException
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $validatedData = $request->validate([
            'account_type' => 'sometimes|required|in:savings,current,fixed',
            'title' => 'nullable|string',
            'status' => 'sometimes|required|in:active,inactive,closed',
        ]);

        $account = $this->accountService->updateAccount($id, $validatedData);

        return response()->json($account);
    }

    /**
     * Close the specified account.
     *
     * @throws ModelNotFoundException
     */
    public function close(int $id): JsonResponse
    {
        $this->accountService->closeAccount($id);

        return response()->json(['message' => 'Account closed']);
    }

    /**
     * Remove the specified account from storage.
     *
     * @throws ModelNotFoundException
     */
    public function destroy(int $id): JsonResponse
    {
        $this->accountService->deleteAccount($id);

        return response()->json(['message' => 'Account deleted']);
    }
}
