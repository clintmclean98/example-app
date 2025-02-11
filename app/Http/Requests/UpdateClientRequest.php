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
            //
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'length_cm' => 'required',
            'email' => 'required|email|unique:clients,email',
            'photo' => 'image|max:1024', // 1MB Max
        ];
    }
}
