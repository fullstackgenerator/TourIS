<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTourisFlightRequest extends FormRequest
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
            'departure_from_start' => 'required|string|max:255',
            'arrival_to_start' => 'required|string|max:255',
            'departure_from_finish' => 'required|string|max:255',
            'arrival_to_finish' => 'required|string|max:255',
        ];
    }
}
