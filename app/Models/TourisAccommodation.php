<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourisAccommodation extends Model
{
    /** @use HasFactory<\Database\Factories\TourisAccommodationFactory> */
    use HasFactory;

    protected $fillable = [
        'accommodation_country',
        'accommodation_city',
        'accommodation_name',
        'accommodation_address',
        'accommodation_phone',
        'accommodation_email',
    ];
}
