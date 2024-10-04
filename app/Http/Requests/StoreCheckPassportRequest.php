<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCheckPassportRequest extends FormRequest
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
            'passport_number' => 'required|unique:passports,passport_number|regex:/^[A-Z0-9]+$/',
            'issue_date' => 'required|date|before:expiry_date',
            'expiry_date' => 'required|date|after:issue_date',
        ];
    }
}
