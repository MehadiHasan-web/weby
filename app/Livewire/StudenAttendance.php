<?php

namespace App\Livewire;

use App\Models\admin\Attendance;
use App\Models\admin\Batch;
use Livewire\Component;

class StudenAttendance extends Component
{
    public $date;
    public $batch_id='';
    public $batch;
    public  $attendances;
    protected $rules = [
        'batch_id' => 'required|integer',
        'date' => 'required|date',
    ];
    public function attendance(){
        $this->validate();
        $this->attendances = Attendance::with('student')->where('batch_id', $this->batch_id)->where('date', $this->date)->latest()->get();
        // dd($this->attendances);
    }


    public function render()
    {
        $this->batch = Batch::where('institute_id', session('institute_id'))->latest()->get();
        return view('livewire.studen-attendance');
    }
}
