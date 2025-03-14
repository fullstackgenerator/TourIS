<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTourisPaymentRequest;
use App\Models\TourisPayment;

class TourisPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('sales.index');
    }

    public function store(StoreTourisPaymentRequest $request)
    {
        $request->validate([
            'payment_type' => 'required|string|in:Cash,Credit card,Bank transfer',
            'amount' => 'required|numeric|min:1',
            'payment_date' => 'required|date',
            'full_name' => 'required|string|max:100',
            'recipient_address' => 'required|string|max:100',
            'recipient_phone' => 'required|string|max:100',
        ]);

        $payment = new TourisPayment([
            'payment_type' => $request->payment_type,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'full_name' => $request->full_name,
            'recipient_address' => $request->recipient_address,
            'recipient_phone' => $request->recipient_phone,
        ]);

        $payment->save();
        return redirect()->route('sales.index');
    }
}
