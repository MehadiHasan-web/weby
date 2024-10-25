<?php

namespace App\Livewire;

use App\Models\admin\Student;
use App\Models\Notice;
use Livewire\Component;

class NoticeView extends Component
{
    public $phone = '';
    public $notice;

    public function search_notify()
    {
        $student = Student::where('phone', $this->phone)->first();
        $notice = Notice::where('institute_id', $student->institute_id)->get();
        $this->notice = $notice;
    }

    public function render()
    {
        return view('livewire.notice-view');
    }
}
