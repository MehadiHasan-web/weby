<?php

namespace App\Http\Controllers;

use App\Models\admin\Cashbox;
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
        $totalIncome = Cashbox::where('institute_id', session('institute_id'))->where('status', 0)->sum('total');
        $totalExpanse = Cashbox::where('institute_id', session('institute_id'))->where('status', 1)->sum('total');


        return view('admin.modules.dashboard', compact('incomeOrExpanse_this_month', 'this_month_income', 'this_month_expanse', 'totalIncome', 'totalExpanse'));
    }
}
