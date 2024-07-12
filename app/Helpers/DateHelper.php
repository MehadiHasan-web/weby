<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    public static function totalMonth($date, $fee, $total)
    {
        $month = (int)abs(Carbon::now()->diffInMonths($date));
        $unpaid_amount = ($fee * $month) - $total;
        $unpaid_month = $unpaid_amount / $fee;
        $mes = 'Unpaid '. $unpaid_month .' month, Total '. $unpaid_amount .' Tk';
        return  $mes;
    }
}
