<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    public static function studentTotalMontOrhAmount($date, $fee, $total)
    {
        $month = (int)abs(Carbon::now()->diffInMonths($date));
        $unpaid_amount = ($fee * $month) - $total;
        $unpaid_month = $unpaid_amount / $fee;
        $mes = 'Unpaid '. $unpaid_month .' month, Total '. $unpaid_amount .' Tk';
        return  $mes;
    }

    public static function teacherTotalHourOrAmount($total_hour, $hourly_rate, $paid){
        $total_amount = ($total_hour * $hourly_rate) - $paid;
        $total_time = $total_amount / $hourly_rate;
        $result = 'Hour '. $total_time . '  and Unpaid ' . $total_amount;
        return $result;
    }

}
