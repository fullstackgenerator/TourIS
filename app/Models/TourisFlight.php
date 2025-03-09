<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourisFlight extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_class',
        'seat_number' => 'required|numeric|max:4',
        'departure_airport_trip_A' => 'required|string|max:255',
        'arrival_airport_trip_A' => 'required|string|max:255',
        'departure_airport_trip_A_date' => 'required|string|max:255',
        'arrival_airport_trip_A_date' => 'required|string|max:255',
        'departure_airport_trip_B' => 'required|string|max:255',
        'arrival_airport_trip_B' => 'required|string|max:255',
        'departure_airport_trip_B_date' => 'required|string|max:255',
        'arrival_airport_trip_B_date' => 'required|string|max:255',
        'carrier',
    ];
}
