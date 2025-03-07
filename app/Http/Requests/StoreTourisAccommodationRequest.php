<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTourisAccommodationRequest extends FormRequest
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
            'accommodation_phone' => 'required|string|max:20',
            'accommodation_email' => 'required|email|max:255',
        ];
    }
}
