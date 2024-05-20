<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
        ];

        if($this->isMethod('POST')) {
            $rules['password'] = ['required', 'max:255', 'min:5'];
        }

        if($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $userSlug = $this->route('slug');

            $rules['email'] = ['required', 'email', 'max:255', Rule::unique('users')->ignore($userSlug, 'slug')];
        }

        return $rules;
    }
}
