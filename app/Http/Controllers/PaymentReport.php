<?php

namespace App\Http\Controllers;

use App\Models\admin\StudentPayment;
use App\Models\admin\TeacherPayment;
use Illuminate\Http\Request;

class PaymentReport extends Controller
{
    public function student($id){
       $payment = StudentPayment::with('student')->where('institute_id', session('institute_id'))->where('student_id', $id)->get();
       return view('admin.partials.payment-report.student-report', compact('payment'));
    }
    public function teacher($id){
       $payment = TeacherPayment::with('teacher')->where('institute_id', session('institute_id'))->where('teacher_id', $id)->get();
       return view('admin.partials.payment-report.teacher-report', compact('payment'));
    }
}
