<?php

namespace App\Livewire;

use App\Models\admin\Batch;
use App\Models\admin\Exam;
use Livewire\Component;

class ExamIndex extends Component
{
    public $exam;
    public $batch;
    public $batch_id;
    public function render()
    {
        $this->batch = Batch::where('institute_id', session('institute_id'))->get();

        if ($this->batch_id && $this->batch_id !== 'all') {
            $this->exam = Exam::where('institute_id', session('institute_id')) ->where('batche_id', $this->batch_id)->latest()->get();
        } else {
            $this->exam = Exam::where('institute_id', session('institute_id')) ->latest()->get();
        }

        return view('livewire.exam-index');
    }
}
