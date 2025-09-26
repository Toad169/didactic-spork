<?php

namespace App\Http\Controllers;

use App\Services\ZakatService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ZakatController extends Controller
{
    /**
     * The Zakat service instance.
     */
    protected ZakatService $zakatService;

    /**
     * Create a new ZakatController instance.
     */
    public function __construct(ZakatService $zakatService)
    {
        $this->zakatService = $zakatService;
    }

    /**
     * Display a listing of Zakat entries.
     */
    public function index(): JsonResponse
    {
        $zakats = $this->zakatService->getAllZakats();

        return response()->json($zakats);
    }

    /**
     * Display the specified Zakat entry.
     */
    public function show(int $id): JsonResponse
    {
        $zakat = $this->zakatService->getZakatById($id);

        return response()->json($zakat);
    }

    /**
     * Store a newly created Zakat entry.
     *
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'account_id' => 'required|exists:accounts,id',
            'income' => 'required|numeric|min:0',
            'savings' => 'required|numeric|min:0',
            'gold' => 'required|numeric|min:0',
            'silver' => 'required|numeric|min:0',
            'assets' => 'required|numeric|min:0',
            'debts' => 'required|numeric|min:0',
            'calculation_year' => 'required|integer',
        ]);

        $zakat = $this->zakatService->createZakat($validatedData);

        return response()->json($zakat, 201);
    }

    /**
     * Update the specified Zakat entry.
     *
     * @throws ValidationException
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $validatedData = $request->validate([
            'income' => 'sometimes|required|numeric|min:0',
            'savings' => 'sometimes|required|numeric|min:0',
            'gold' => 'sometimes|required|numeric|min:0',
            'silver' => 'sometimes|required|numeric|min:0',
            'assets' => 'sometimes|required|numeric|min:0',
            'debts' => 'sometimes|required|numeric|min:0',
            'calculation_year' => 'sometimes|required|integer',
        ]);

        $zakat = $this->zakatService->updateZakat($id, $validatedData);

        return response()->json($zakat);
    }

    /**
     * Remove the specified Zakat entry.
     *
     * @throws ModelNotFoundException
     */
    public function destroy(int $id): JsonResponse
    {
        $this->zakatService->deleteZakat($id);

        return response()->json(['message' => 'Zakat entry deleted']);
    }

    /**
     * Calculate Zakat for a user based on their ID and year.
     */
    public function calculate(Request $request, int $userId): JsonResponse
    {
        $validatedData = $request->validate([
            'year' => 'required|integer|min:2000',
        ]);

        $zakatDue = $this->zakatService->calculateZakatForUser($userId, $validatedData['year']);

        return response()->json(['zakat_due' => $zakatDue]);
    }
}
