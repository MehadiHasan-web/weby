<?php

namespace App\Http\Controllers;

use App\Models\admin\Teacher;
use App\Models\admin\TeacherPayment;
use Illuminate\Http\Request;

class TeacherPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = Teacher::where('institute_id', session('institute_id'))->latest()->get();
        // dd($teacher);
        return view('admin.partials.finance.teacher-payment', compact('teacher'));
    }
    public function payment(Request $request, $teacherId){

        $validation = $request->validate([
            'fee' => 'required|integer',
            'note' => 'nullable'
        ]);
        TeacherPayment::create([
            'teacher_id' => $teacherId,
            'institute_id' => session('institute_id'),
            'paid' => $request->fee,
            'note' => $request->note
        ]);
        flash()->success("Payment is success");
        return redirect()->back();
    }

}
