<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMeasurementRequest extends FormRequest
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
            'weight_kg' => 'required|numeric',
            'fat_percentage' => 'nullable|numeric',
            'blood_pressure' => 'nullable|numeric',
            'client_id' => 'required',
        ];
    }

        /**
     * Error Messages for validation errors
     * 
     * @return array<string
     */
    public function messages(): array
    {
        return [
            'weight_kg.required' => 'The weight is required.',
            'weight_kg.numeric' => 'The weight must be a number.',
            'fat_percentage.numeric' => 'The fat percentage must be a number.',
            'blood_pressure.numeric' => 'The blood pressure must be a number.',
            'client_id.required' => 'The client ID is required.',
        ];
    }
}
