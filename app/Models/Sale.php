<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'accommodation_name',
        'accommodation_address',
        'accommodation_city',
        'accommodation_country',
        'accommodation_phone',
        'accommodation_email',
        'date_from',
        'date_to',
        'accommodation_total_amount',

        'flight_class',
        'seat_number',
        'departure_airport_trip_A',
        'arrival_airport_trip_A',
        'departure_airport_trip_A_date',
        'arrival_airport_trip_A_date',
        'departure_airport_trip_B',
        'arrival_airport_trip_B',
        'departure_airport_trip_B_date',
        'arrival_airport_trip_B_date',
        'carrier',
        'flights_total_amount',

        'first_name',
        'last_name',
        'date_of_birth',
        'client_address',
        'client_phone',
        'client_email',
        'payment_type',
        'amount',
        'payment_date',
        'full_name',
        'receipt_address',
        'receipt_phone',
    ];

    public function client()
    {
        return $this->belongsTo(TourisClient::class, 'client_id');
    }

    public function accommodation()
    {
        return $this->belongsTo(TourisAccommodation::class, 'accommodation_id');
    }


}
