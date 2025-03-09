<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTourisFlightRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'flight_class'  => ['business', 'economy'],
            'seat_number' => ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J','K'],
            'arrival_airport_trip_A' => 'required|string|max:255',
            'departure_airport_trip_A_date' => 'required|string|max:255',
            'arrival_airport_trip_A_date' => 'required|string|max:255',
            'departure_airport_trip_B' => 'required|string|max:255',
            'arrival_airport_trip_B' => 'required|string|max:255',
            'departure_airport_trip_B_date' => 'required|string|max:255',
            'arrival_airport_trip_B_date' => 'required|string|max:255',
            'carrier'  => ['business', 'economy'],
        ];
    }
}
