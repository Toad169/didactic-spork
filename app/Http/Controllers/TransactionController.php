<?php

namespace App\Http\Controllers;

use App\Services\TransactionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class TransactionController extends Controller
{
    /**
     * The transaction service instance.
     */
    protected TransactionService $transactionService;

    /**
     * Create a new TransactionController instance.
     */
    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    /**
     * Display a listing of the transactions for the authenticated user.
     */
    public function index(): View
    {
        $transactions = $this->transactionService->getTransactionsByUserId(Auth::id());

        return view('transactions.index', compact('transactions'));
    }

    /**
     * Display the specified transaction for the authenticated user.
     */
    public function show(int $id): View
    {
        $transaction = $this->transactionService->getTransactionByIdAndUserId($id, Auth::id());

        return view('transactions.show', compact('transaction'));
    }

    /**
     * Store a newly created transaction in storage for the authenticated user.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'contract_id' => 'nullable|exists:contracts,id',
            'transaction_type' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'transaction_date' => 'nullable|date',
        ]);

        $validatedData['user_id'] = Auth::id();
        $validatedData['transaction_number'] = 'TRX-'.uniqid(); // Example: Generate a unique transaction number

        $transaction = $this->transactionService->createTransaction($validatedData);

        return redirect()->route('transactions.show', $transaction->id);
    }

    /**
     * Update the specified transaction in storage for the authenticated user.
     *
     * @throws ValidationException
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'transaction_type' => 'sometimes|required|string',
            'amount' => 'sometimes|required|numeric|min:0',
            'description' => 'nullable|string',
            'transaction_date' => 'nullable|date',
        ]);

        $this->transactionService->updateTransactionForUser($id, $validatedData, Auth::id());

        return redirect()->route('transactions.show', $id);
    }

    /**
     * Cancel the specified transaction for the authenticated user.
     */
    public function cancel(int $id): RedirectResponse
    {
        $this->transactionService->deleteTransactionForUser($id, Auth::id());

        return redirect()->route('transactions.index');
    }
}
