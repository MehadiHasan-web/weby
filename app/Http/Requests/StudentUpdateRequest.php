<?php

namespace App\Http\Requests;

use App\Models\admin\Student;
use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Student::class],
            'email' => 'nullable',
            'phone' => 'required',
            'address' => 'nullable',
            'gender' => 'required',
            'photo' => 'nullable',
            'fee' => 'required',
            'institute_name' => 'required',
            'student_class' => 'required',
            'roll' => 'required',
        ];
    }
}
