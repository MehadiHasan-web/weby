<?php

namespace App\Helpers;

use App\Models\admin\StudentPayment;
use App\Models\admin\TeacherPayment;
use Carbon\Carbon;

class DateHelper
{
    public static function studentTotalMontOrhAmount($date, $fee, $studentId )
    {
        $total = StudentPayment::where('institute_id', session('institute_id'))->where('student_id', $studentId)->sum('paid');
        $waiver = StudentPayment::where('institute_id', session('institute_id'))->where('student_id', $studentId)->sum('waiver');
        $sub_total = $total + $waiver;


        $month = (int)abs(Carbon::now()->diffInMonths($date));
        $unpaid_amount = ($fee * $month) - $sub_total;
        $unpaid_month = $unpaid_amount / $fee;
        $data = [
            'month' => $unpaid_month,
            'total' => $unpaid_amount
        ];

        // dd($data['month']);
        return $data;
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
