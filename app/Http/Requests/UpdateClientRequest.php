<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'first_name' => 'required|max:100',
            'last_name' => 'required',
            'date_of_birth' => 'required|date',
            'length_cm' => 'required|numeric',
            'email' => 'required|email',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:200',
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
            'first_name.required' => 'Please enter your first name.',
            'first_name.max' => 'First name must not exceed 100 characters.',
            'last_name.required' => 'Please enter your last name.',
            'date_of_birth.required' => 'Please enter your date of birth.',
            'date_of_birth.date' => 'Please enter a valid date for the date of birth.',
            'length_cm.required' => 'Please enter your length.',
            'length_cm.numeric' => 'Length must be a numeric value.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'photo.image' => 'The file must be an image.',
            'photo.mimes' => 'Supported image formats are jpg, png, jpeg, gif, and svg.',
            'photo.max' => 'The photo must not exceed 200 kilobytes.',
        ];
        
    }
}
