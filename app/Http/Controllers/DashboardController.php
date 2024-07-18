<?php

namespace App\Http\Controllers;

use App\Models\admin\Cashbox;
use App\Models\admin\StudentPayment;
use App\Models\admin\TeacherPayment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        $incomeOrExpanse_this_month = Cashbox::where('institute_id', session('institute_id'))->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->latest()
            ->get();
        $this_month_income = Cashbox::where('institute_id', session('institute_id'))->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->latest()
            ->where('status', 0)
            ->sum('total');
        $this_month_expanse = Cashbox::where('institute_id', session('institute_id'))->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->latest()
            ->where('status', 1)
            ->sum('total');


        // total income or expanse
        $totalIncome = Cashbox::where('institute_id', session('institute_id'))->where('status', 0)->sum('total');
        $totalExpanse = Cashbox::where('institute_id', session('institute_id'))->where('status', 1)->sum('total');

        // CASH INFLOW
        $total_student_fee = StudentPayment::where('institute_id', session('institute_id'))->sum('paid');
        // Cash outflow
        $teacher_salary = TeacherPayment::where('institute_id', session('institute_id'))->sum('paid');

        return view('admin.modules.dashboard', compact('incomeOrExpanse_this_month', 'this_month_income', 'this_month_expanse', 'totalIncome', 'totalExpanse', 'total_student_fee', 'teacher_salary'));
    }

    public function month_report($month){
        $incomeOrExpanse_month = Cashbox::where('institute_id', session('institute_id'))->whereMonth('created_at', $month)
        ->whereYear('created_at', Carbon::now()->year)
        ->latest()
        ->get();

        return view('admin.partials.payment-report.month-report', compact('incomeOrExpanse_month'));
    }
}
