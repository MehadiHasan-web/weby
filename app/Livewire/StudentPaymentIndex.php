<?php

namespace App\Livewire;

use App\Helpers\DateHelper;
use App\Models\admin\Student;
use Livewire\Component;

class StudentPaymentIndex extends Component
{

    public $student;


    public function studentTotalMontOrhAmount($date, $fee, $id)
    {
        $data = DateHelper::studentTotalMontOrhAmount($date, $fee, $id);
        return $data;
    }



    public function render()
    {

        $this->student = Student::where('institute_id', session('institute_id'))->get();
        return view('livewire.student-payment-index');
    }
}
