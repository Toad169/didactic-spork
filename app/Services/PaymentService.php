<?php

namespace App\Services;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PaymentService
{
    /**
     * The Payment model instance.
     */
    protected Payment $payment;

    /**
     * Create a new PaymentService instance.
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    /**
     * Get all payments.
     */
    public function getAllPayments(): Collection
    {
        return $this->payment->all();
    }

    /**
     * Get a single payment by its ID.
     */
    public function getPaymentById(int $id): ?Payment
    {
        return $this->payment->find($id);
    }

    /**
     * Create a new payment.
     */
    public function createPayment(array $data): Payment
    {
        return $this->payment->create($data);
    }

    /**
     * Update an existing payment.
     */
    public function updatePayment(int $id, array $data): Payment
    {
        $payment = $this->payment->findOrFail($id);
        $payment->update($data);

        return $payment;
    }

    /**
     * Delete a payment.
     *
     * @throws ModelNotFoundException
     */
    public function deletePayment(int $id): bool
    {
        $payment = $this->payment->findOrFail($id);

        return $payment->delete();
    }
}
