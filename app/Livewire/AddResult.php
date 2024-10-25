<?php

namespace App\Livewire;

use App\Models\admin\ExamResult;
use Livewire\Component;

class AddResult extends Component
{
    public $batch;
    public $exam;


    // public $students = [];
    // public $marks = [];

    // public function mount($batch, $exam)
    // {
    //     $this->batch = $batch;
    //     $this->exam = $exam;
    // }
    // public function updatedMarks($value, $student_id)
    // {
    //     dd($student_id);
    //     // Debugging: Log the values
    //     // \Log::info("Updated Marks: Student ID: $student_id, Marks: $value");

    //     $condition = [
    //         'student_id' => $student_id,
    //         'exam_id' => $this->exam->id,
    //     ];

    //     $data = [
    //         'marks' => $value,
    //         'status' => 1
    //     ];

    //     $result = ExamResult::updateOrCreate($condition, $data);
    //     flash()->success('Result saved successfully!');
    // }

    public $results = [];

    public function mount()
    {

        foreach ($this->batch->student as $student) {
            $this->results[$student->id] = [
                'student_id' => $student->id,
                'marks' => '',
                'exam_id' => $this->exam->id,
            ];
        }
    }

    public function saveResults()
    {
        foreach ($this->results as $result) {
            ExamResult::updateOrCreate(
                [
                    'student_id' => $result['student_id'],
                    'exam_id' => $result['exam_id'],
                ],
                [
                    'marks' => $result['marks'],
                ]
            );
        }

        session()->flash('message', 'Results have been saved successfully!');
    }


    public function render()
    {
        return view('livewire.add-result');
    }
}
