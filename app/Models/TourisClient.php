<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourisClient extends Model
{
    /** @use HasFactory<\Database\Factories\TourisClientFactory> */
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'client_address',
        'client_phone',
        'client_email',
    ];
}
