<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'password.min' => 'The password must be at least 5 characters',
            'password.required' => 'The password field is required',
            'email.required' => 'The email field is required',
            'email.email' => 'The email must be a valid email address',
        ];
    }
}
