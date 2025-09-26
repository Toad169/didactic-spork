<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PaymentController extends Controller
{
    /**
     * The payment service instance.
     */
    protected PaymentService $paymentService;

    /**
     * Create a new PaymentController instance.
     */
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    /**
     * Display a listing of the payments.
     */
    public function index(): JsonResponse
    {
        $payments = $this->paymentService->getAllPayments();

        return response()->json($payments);
    }

    /**
     * Display the specified payment.
     */
    public function show(int $id): JsonResponse
    {
        $payment = $this->paymentService->getPaymentById($id);

        return response()->json($payment);
    }

    /**
     * Store a newly created payment in storage.
     *
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'type' => 'required|string',
            'provider' => 'required|string',
            'provider_id' => 'required|string|unique:payments,provider_id',
        ]);

        $payment = $this->paymentService->createPayment($validatedData);

        return response()->json($payment, 201);
    }

    /**
     * Update the specified payment in storage.
     *
     * @throws ValidationException
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $validatedData = $request->validate([
            'type' => 'sometimes|required|string',
            'provider' => 'sometimes|required|string',
        ]);

        $payment = $this->paymentService->updatePayment($id, $validatedData);

        return response()->json($payment);
    }

    /**
     * Cancel the specified payment.
     *
     * @throws ModelNotFoundException
     */
    public function cancel(int $id): JsonResponse
    {
        $this->paymentService->deletePayment($id);

        return response()->json(['message' => 'Payment canceled']);
    }
}
