<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherAttendReportController extends Controller
{
    public function index(){
        return view('admin.partials.attend-report.teacher');
    }
}
