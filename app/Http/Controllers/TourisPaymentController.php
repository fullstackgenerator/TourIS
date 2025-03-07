<?php

namespace App\Http\Controllers;

use App\Models\TourisPayment;
use App\Http\Requests\StoreTourisPaymentRequest;
use App\Http\Requests\UpdateTourisPaymentRequest;

class TourisPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Return view('sales.index');
    }

    public function store(StoreTourisPaymentRequest $request)
    {
        $request->validate([
            'payment_type' => ['cash', 'credit_card', 'bank_transfer'],
            'amount' => 'required|numeric|min:1',
            'payment_date' => 'required|date',
            'full_name' => 'required|string|max:100',
            'recipient_address' => 'required|string|max:100',
            'recipient_phone' => 'required|string|max:100',
            'cancellation' => 'required|boolean',
        ]);

        $payment = new TourisPayment([
            'payment_type' => $request->payment_type,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'full_name' => $request->full_name,
            'recipient_address' => $request->address,
            'recipient_phone' => $request->phone,
            'cancellation' => $request->cancellation
        ]);
    }
}
