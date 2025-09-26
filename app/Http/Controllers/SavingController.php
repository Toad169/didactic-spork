<?php

namespace App\Http\Controllers;

use App\Services\SavingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class SavingController extends Controller
{
    /**
     * The saving service instance.
     */
    protected SavingService $savingService;

    /**
     * Create a new SavingController instance.
     */
    public function __construct(SavingService $savingService)
    {
        $this->savingService = $savingService;
    }

    /**
     * Display a listing of the savings.
     */
    public function index(): View
    {
        $savings = $this->savingService->getAllSavings();

        return view('savings.index', compact('savings'));
    }

    /**
     * Display the specified saving.
     */
    public function show(int $id): View
    {
        $saving = $this->savingService->getSavingById($id);

        return view('savings.show', compact('saving'));
    }

    /**
     * Store a newly created saving in storage.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'account_id' => 'required|exists:accounts,id',
            'savings_number' => 'required|string|unique:savings,savings_number',
            'savings_type' => 'required|in:wadiah,mudarabah',
            'title' => 'nullable|string',
            'target_balance' => 'nullable|numeric|min:0',
            'target_date' => 'nullable|date|after_or_equal:today',
        ]);

        $saving = $this->savingService->createSaving($validatedData);

        return redirect()->route('savings.show', $saving->id);
    }

    /**
     * Update the specified saving in storage.
     *
     * @throws ValidationException
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string',
            'target_balance' => 'nullable|numeric|min:0',
            'target_date' => 'nullable|date|after_or_equal:today',
            'status' => 'sometimes|required|in:active,closed',
        ]);

        $this->savingService->updateSaving($id, $validatedData);

        return redirect()->route('savings.show', $id);
    }

    /**
     * Close the specified saving.
     */
    public function close(int $id): RedirectResponse
    {
        $this->savingService->closeSaving($id);

        return redirect()->route('savings.index');
    }

    /**
     * Remove the specified saving from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        $this->savingService->deleteSaving($id);

        return redirect()->route('savings.index');
    }
}
