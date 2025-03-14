<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTourisPaymentRequest extends FormRequest
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
            'payment_type' => ['cash', 'credit_card', 'bank_transfer'],
            'amount' => 'required|numeric|min:1',
            'payment_date' => 'required|date',
            'full_name' => 'required|string|max:100',
            'recipient_address' => 'required|string|max:100',
            'recipient_phone' => 'required|string|max:100',
        ];
    }
}
