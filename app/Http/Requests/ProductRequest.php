<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products,name',
            'slug' => 'required',
            'product_category_id' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'is_available' => 'required|boolean',
            'release_date' => 'required|date',
            'image' => 'required',
            'color' => 'required',
            'size' => 'required',
            'release_date' => 'required|date',
            
        ];
        return $rules;
    }

     protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        $formattedError = "";
        foreach ($errors->keys() as $field)
        {
            $formattedError = $errors->first($field);
        }

        $response = response()->json([
            'status' => false,
            'message' => $formattedError,
        ], 422);

        throw new HttpResponseException($response);
    }
}
