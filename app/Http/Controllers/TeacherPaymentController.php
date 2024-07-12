<?php

namespace App\Http\Controllers;

use App\Models\admin\TeacherPayment;
use Illuminate\Http\Request;

class TeacherPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = TeacherPayment::with('teacher')->where('institute_id', session('institute_id'))->latest()->get();
        return view('admin.partials.finance.teacher-payment', compact('teacher'));
    }
    public function payment(Request $request, $teacherId){

        $validation = $request->validate([
            'fee' => 'required|integer',
            'note' => 'nullable'
        ]);
        $payment = TeacherPayment::where('teacher_id', $teacherId)->where('institute_id', session('institute_id'))->first();
        $total = $payment->paid + $request->fee;
        $payment->update([
            'paid' => $total,
            'note' => $request->note
        ]);
        flash()->success($payment->teacher->name . " is paid");
        return redirect()->back();
    }

}
