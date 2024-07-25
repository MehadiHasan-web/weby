<?php

namespace App\Http\Controllers;

use App\Livewire\StudentPayment;
use App\Models\admin\Student;
use App\Models\admin\StudentPayment as AdminStudentPayment;
use App\Models\User;
use Illuminate\Http\Request;


class StudentPaymentController extends Controller
{
    public function index(){
        $student = Student::where('institute_id', session('institute_id'))->get();
        return view('admin.partials.finance.student-payment', compact('student'));
    }

    public function payment(Request $request, $studentId){
        $validation = $request->validate([
            'paid' => 'required|integer',
            'note' => 'nullable'
        ]);
        AdminStudentPayment::create([
            'institute_id' => session('institute_id'),
            'student_id' => $studentId,
            'paid' => $request->paid,
            'note' => $request->note,
        ]);

        flash()->success("Payment success.");
        return redirect()->back();
    }
    public function  waiver($data) {
        dd($data);
    }
}
