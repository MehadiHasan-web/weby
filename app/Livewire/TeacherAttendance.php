<?php

namespace App\Livewire;

use App\Models\admin\Teacher;
use App\Models\admin\TeacherAttendance as AdminTeacherAttendance;
use Livewire\Component;

class TeacherAttendance extends Component
{
    public $date;
    public  $attendances;
    protected $rules = [
        'date' => 'required|date',
    ];
    public function attendance(){
        $this->validate();
        $this->attendances = AdminTeacherAttendance::with('teacher')->where('institute_id', session('institute_id'))->where('date', $this->date)->latest()->get();
        // dd($this->attendances);
    }
    public function render()
    {
        return view('livewire.teacher-attendance');
    }
}
