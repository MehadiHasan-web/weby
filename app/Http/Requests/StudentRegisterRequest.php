<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRegisterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'phone' => 'required',
            'gender' => 'required',
            'ins_name' => 'required',
            'ins_id' => 'required|exists:institutes,id',
            'password' => 'sometimes|min:6|confirmed|required_with:password_confirmed',
        ];
    }
    public function messages()
    {
        return [
            'ins_id.required' => 'The institute ID is required.',
            'ins_id.exists' => 'The selected institute ID is invalid.',
        ];
    }
}
