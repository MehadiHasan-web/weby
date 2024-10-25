<?php

namespace App\Livewire;

use App\Models\admin\Attendance;
use Livewire\Component;
use Carbon\Carbon;

class StudentAttendance extends Component
{
    public $batch;
    public $today_attend;

    public function mount($batch){
        $this->batch = $batch;
        // dd($this->today_attend);
    }
    public function present($studentId, $batchId){
        $date = \Carbon\Carbon::now()->toDateString();
        Attendance::updateOrCreate(
            [
                'student_id' => $studentId,
                'batch_id' => $batchId,
                'date' => $date
            ],
            [
                'is_present' => 0
            ]
        );

        flash()->success('Present');
    }

    public function late_present($studentId, $batchId){
        $date = \Carbon\Carbon::now()->toDateString();
        Attendance::updateOrCreate(
            [
                'student_id' => $studentId,
                'batch_id' => $batchId,
                'date' => $date
            ],
            [
                'is_present' => 1
            ]
        );

        flash()->success('Late Present');
    }

    public function absent($studentId, $batchId){
        $date = \Carbon\Carbon::now()->toDateString();
        Attendance::updateOrCreate(
            [
                'student_id' => $studentId,
                'batch_id' => $batchId,
                'date' => $date
            ],
            [
                'is_present' => 2
            ]
        );
        flash()->warning('Absent');
    }


    public function render()
    {
        $this->today_attend = Attendance::with('student')->where('batch_id', $this->batch->id)->where('date', Carbon::today()->toDateString())->latest()->get(['student_id', 'is_present'])->keyBy('student_id');
        return view('livewire.student-attendance', ['today_attend' => $this->today_attend]);
    }
}
