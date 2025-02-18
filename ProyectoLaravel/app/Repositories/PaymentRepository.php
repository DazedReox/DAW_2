<?php

namespace App\Repositories;

use App\Models\Payment;

class PaymentRepository
{
    public function getAllPayments()
    {
        return Payment::all();
    }

    public function getPaymentById($id)
    {
        return Payment::findOrFail($id);
    }

    public function createPayment(array $data)
    {
        return Payment::create($data);
    }

    public function updatePayment($id, array $data)
    {
        $payment = Payment::findOrFail($id);
        $payment->update($data);
        return $payment;
    }

    public function deletePayment($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
    }
}
