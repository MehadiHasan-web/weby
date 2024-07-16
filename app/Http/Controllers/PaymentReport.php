<?php

namespace App\Http\Controllers;

use App\Models\admin\StudentPayment;
use Illuminate\Http\Request;

class PaymentReport extends Controller
{
    public function student($id){
       $payment = StudentPayment::where('institute_id', session('institute_id'))->where('student_id', $id)->get();
       return view('admin.partials.payment-report.student-report', compact('payment'));
    }
}
