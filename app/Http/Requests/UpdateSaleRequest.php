<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSaleRequest extends FormRequest
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
            'accommodation_name' => 'required|string|max:255',
            'accommodation_address' => 'required|string|max:255',
            'accommodation_city' => 'required|string|max:255',
            'accommodation_country' => 'required|string|max:255',
            'date_from' => 'required|date',
            'date_to' => 'required|date',
            'accommodation_total_amount' => 'required|numeric|min:0',

            'flight_class' => 'nullable|string|max:255',
            'seat_number' => 'nullable|string|max:255',
            'arrival_airport_trip_A' => 'required|string|max:255',
            'departure_airport_trip_A_date' => 'required|string|max:255',
            'arrival_airport_trip_A_date' => 'required|string|max:255',
            'departure_airport_trip_B' => 'required|string|max:255',
            'arrival_airport_trip_B' => 'required|string|max:255',
            'departure_airport_trip_B_date' => 'required|string|max:255',
            'arrival_airport_trip_B_date' => 'required|string|max:255',
            'carrier' => 'nullable|string|max:255',
            'flights_total_amount' => 'nullable|numeric|min:0',

            'payment_type' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'payment_date' => 'required|date',
        ];
    }
}
