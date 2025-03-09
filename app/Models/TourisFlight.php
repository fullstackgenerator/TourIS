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
        'departure_from_start' => 'required|string|max:255',
        'arrival_to_start' => 'required|string|max:255',
        'departure_from_finish' => 'required|string|max:255',
        'arrival_to_finish' => 'required|string|max:255',
        'carrier',
        'departure_date_to_destination' => 'required|string|max:255',
        'departure_date_from_destination' => 'required|string|max:255',
    ];
}
