<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'date_of_birth' => 'required',
            'length_cm' => 'required',
            'email' => 'required',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:9999|',
        ];
    }
}
