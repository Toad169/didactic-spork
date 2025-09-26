<?php

namespace App\Http\Controllers;

use App\Services\ContractService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ContractController extends Controller
{
    /**
     * The contract service instance.
     */
    protected ContractService $contractService;

    /**
     * Create a new ContractController instance.
     */
    public function __construct(ContractService $contractService)
    {
        $this->contractService = $contractService;
    }

    /**
     * Display a listing of the contracts.
     */
    public function index(): JsonResponse
    {
        $contracts = $this->contractService->getAllContracts();

        return response()->json($contracts);
    }

    /**
     * Display the specified contract.
     */
    public function show(int $id): JsonResponse
    {
        $contract = $this->contractService->getContractById($id);

        return response()->json($contract);
    }

    /**
     * Store a newly created contract in storage.
     *
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'account_id' => 'required|exists:accounts,id',
            'contract_number' => 'required|string|unique:contracts,contract_number',
            'contract_type' => 'required|string',
            'title' => 'nullable|string',
        ]);

        $contract = $this->contractService->createContract($validatedData);

        return response()->json($contract, 201);
    }

    /**
     * Update the specified contract in storage.
     *
     * @throws ValidationException
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string',
            'status' => 'sometimes|required|in:active,inactive,expired,terminated',
            'signed_at' => 'nullable|date',
            'expired_at' => 'nullable|date|after_or_equal:signed_at',
        ]);

        $contract = $this->contractService->updateContract($id, $validatedData);

        return response()->json($contract);
    }

    /**
     * Terminate the specified contract.
     *
     * @throws ModelNotFoundException
     */
    public function terminate(int $id): JsonResponse
    {
        $this->contractService->terminateContract($id);

        return response()->json(['message' => 'Contract terminated']);
    }

    /**
     * Remove the specified contract from storage.
     *
     * @throws ModelNotFoundException
     */
    public function destroy(int $id): JsonResponse
    {
        $this->contractService->deleteContract($id);

        return response()->json(['message' => 'Contract deleted']);
    }
}
