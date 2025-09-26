<?php

namespace App\Http\Controllers;

use App\Services\FeeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FeeController extends Controller
{
    /**
     * The fee service instance.
     */
    protected FeeService $feeService;

    /**
     * Create a new FeeController instance.
     */
    public function __construct(FeeService $feeService)
    {
        $this->feeService = $feeService;
    }

    /**
     * Display a listing of the fees.
     */
    public function index(): JsonResponse
    {
        $fees = $this->feeService->getAllFees();

        return response()->json($fees);
    }

    /**
     * Display the specified fee.
     */
    public function show(int $id): JsonResponse
    {
        $fee = $this->feeService->getFeeById($id);

        return response()->json($fee);
    }

    /**
     * Store a newly created fee in storage.
     *
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'account_id' => 'required|exists:accounts,id',
            'fee_type' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
        ]);

        $this->feeService->createFee($validatedData);

        return response()->json(['message' => 'Fee created successfully.'], 201);
    }

    /**
     * Update the specified fee in storage.
     *
     * @throws ValidationException
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $validatedData = $request->validate([
            'fee_type' => 'sometimes|required|string|max:255',
            'amount' => 'sometimes|required|numeric|min:0',
        ]);

        $this->feeService->updateFee($id, $validatedData);

        return response()->json(['message' => 'Fee updated successfully.']);
    }

    /**
     * Remove the specified fee from storage.
     *
     * @throws ModelNotFoundException
     */
    public function remove(int $id): JsonResponse
    {
        $this->feeService->deleteFee($id);

        return response()->json(['message' => 'Fee removed successfully.']);
    }
}
