<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'company_id' => 'exists:companies,id', // Validate that the company ID exists in the "companies" table
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for profile picture upload
        ];
    }
}
