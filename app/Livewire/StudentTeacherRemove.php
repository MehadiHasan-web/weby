<?php

namespace App\Livewire;

use App\Models\admin\Batch;
use Illuminate\Http\Request;
use Livewire\Component;

class StudentTeacherRemove extends Component
{

    public $batch;


    public function student_remove(Request $request)
    {
        $batch = Batch::findOrfail($request->query('batch_id'));
        $batch->student()->detach($request->query('id'));
        return redirect()->back();
    }
    public function teacher_remove(Request $request)
    {
        $batch = Batch::findOrfail($request->query('batch_id'));
        $batch->teacher()->detach($request->query('id'));
        return redirect()->back();
    }

    public function mount($batch)
    {
        $this->batch = $batch;
    }

    public function render()
    {
        return view('livewire.student-teacher-remove');
    }
}
