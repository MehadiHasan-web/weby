<?php

namespace App\Helpers;

use App\Models\admin\StudentPayment;
use App\Models\admin\TeacherAttendance;
use App\Models\admin\TeacherPayment;
use Carbon\Carbon;

class DateHelper
{
    public static function studentTotalMontOrhAmount($date, $fee, $studentId)
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

    public static function teacherTotalHourOrAmount($hourly_rate, $teacherId)
    {
        $paid = TeacherPayment::where('institute_id', session('institute_id'))->where('teacher_id', $teacherId)->sum('paid');

        $total_time =  TeacherAttendance::where('institute_id', session('institute_id'))->where('teacher_id', $teacherId)->sum('total_hour');

        $total_amount = ($total_time * $hourly_rate);
        $unpaid_amount = $total_amount - $paid;
        $unpaid_time = $unpaid_amount / $hourly_rate;
        $result = [
            'time' =>  $unpaid_time,
            'amount' =>  $unpaid_amount
        ];
        return $result;

        // if ($unpaid_amount == 0) {
        //     return 0;
        // } else {
        //     return $result;
        // }
    }
}
