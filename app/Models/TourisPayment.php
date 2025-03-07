<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourisPayment extends Model
{
    /** @use HasFactory<\Database\Factories\TourisPaymentFactory> */
    use HasFactory;

    protected $fillable = [
        'payment_type',
        'amount',
        'payment_date',
        'full_name',
        'recipient_address',
        'recipient_phone',
        'cancellation',
    ];
}
