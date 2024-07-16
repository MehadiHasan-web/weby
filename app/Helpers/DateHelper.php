<?php

namespace App\Helpers;

use App\Models\admin\StudentPayment;
use App\Models\admin\TeacherPayment;
use Carbon\Carbon;

class DateHelper
{
    public static function studentTotalMontOrhAmount($date, $fee, $studentId )
    {
        $total = 0;
        $payment = StudentPayment::where('institute_id', session('institute_id'))->where('student_id', $studentId)->get();
        foreach($payment as $item){
            $total += (float)$item->paid;
        }
        $month = (int)abs(Carbon::now()->diffInMonths($date));
        $unpaid_amount = ($fee * $month) - $total;
        $unpaid_month = $unpaid_amount / $fee;

        if($unpaid_amount==0){
            return 0;
        }else{
            $result = 'Unpaid '. $unpaid_month .' month, Total '. $unpaid_amount .' Tk';
            return  $result;
        }

    }

    public static function teacherTotalHourOrAmount($total_hour, $hourly_rate, $teacherId){
        $total = 0;
        $payment = TeacherPayment::where('institute_id', session('institute_id'))->where('teacher_id', $teacherId)->get();
        foreach($payment as $item){
            $total += (float)$item->paid;
        }

        $total_amount = ($total_hour * $hourly_rate) - $total;
        $total_time = $total_amount / $hourly_rate;
        if($total_time==0){
            return 0;
        }else{
            $result = 'Hour '. $total_time . '  and Unpaid ' . $total_amount;
            return $result;
        }
    }

}
