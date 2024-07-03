<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstituteRequest extends FormRequest
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
            'name' => 'required|max:55',
            'email' => 'email|unique:users',
            'phone' => 'required',
            'photo' => 'nullable',
            'password' => 'sometimes|min:6|confirmed|required_with:password_confirmed',
            'note' => 'nullable'
        ];
    }
}
