<?php

namespace App\Http\Controllers;

use App\Models\admin\Attendance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceReportController extends Controller
{

    public function index(){
        return view('admin.partials.attend-report.index');
    }


}
