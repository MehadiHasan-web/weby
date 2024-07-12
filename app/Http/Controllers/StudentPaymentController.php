<?php

namespace App\Http\Controllers;

use App\Livewire\StudentPayment;
use App\Models\admin\StudentPayment as AdminStudentPayment;
use Illuminate\Http\Request;


class StudentPaymentController extends Controller
{
    public function index(){
        $student = AdminStudentPayment::with('user')->where('institute_id', session('institute_id'))->latest()->get();
        return view('admin.partials.finance.student-payment', compact('student'));
    }
    public function payment(Request $request, $userId){

        $validation = $request->validate([
            'fee' => 'required|integer',
            'note' => 'nullable'
        ]);
        $payment = AdminStudentPayment::where('user_id', $userId)->where('institute_id', session('institute_id'))->first();
        // $month = (int)abs(now()->diffInMonths($payment->created_at));
        // dd($month);

        $total = $payment->paid + $request->fee;
        $payment->update([
            'paid' => $total,
            'note' => $request->note
        ]);
        flash()->success($payment->user->name . " is paid");
        return redirect()->back();
    }
}
