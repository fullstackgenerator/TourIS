<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourisFlight extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_number',
        'flight_class',
        'seat_number',
        'departure_from',
        'arrival_to',
        'carrier',
        'departure_date',
    ];
}
