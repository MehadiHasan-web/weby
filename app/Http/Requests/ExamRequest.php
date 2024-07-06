<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            'name' => 'required | string',
            'batche' => 'required',
            'exam_invigilator' => 'required | string',
            'course_teacher' => 'nullable | string',
            'exam_topic' => 'required | string',
            'exam_date' => 'required | string',
            'total_time' => 'required | string',
            'exam_marks' => 'required | string',
            'exam_paper' => 'nullable',
        ];
    }
}
