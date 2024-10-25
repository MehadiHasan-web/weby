<?php

namespace App\Http\Controllers;

use App\Models\admin\StudentPayment;
use App\Models\User;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function notice_box()
    {
        return view('notice.notice');
    }
}
