<?php

namespace App\Http\Controllers;

use App\Services\ProfitDistributionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProfitDistributionController extends Controller
{
    /**
     * The profit distribution service instance.
     */
    protected ProfitDistributionService $profitDistributionService;

    /**
     * Create a new ProfitDistributionController instance.
     */
    public function __construct(ProfitDistributionService $profitDistributionService)
    {
        $this->profitDistributionService = $profitDistributionService;
    }

    /**
     * Display a listing of the profit distributions.
     */
    public function index(): JsonResponse
    {
        $distributions = $this->profitDistributionService->getAllProfitDistributions();

        return response()->json($distributions);
    }

    /**
     * Store a newly created profit distribution in storage.
     *
     * @throws ValidationException
     */
    public function distribute(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'account_id' => 'required|exists:accounts,id',
            'contract_id' => 'required|exists:contracts,id',
            'profit_amount' => 'required|numeric|min:0',
            'distributed_at' => 'nullable|date',
        ]);

        $distribution = $this->profitDistributionService->createProfitDistribution($validatedData);

        return response()->json($distribution, 201);
    }
}
