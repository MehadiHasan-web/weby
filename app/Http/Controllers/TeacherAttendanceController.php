<?php

namespace App\Http\Controllers;

use App\Models\admin\Teacher;
use App\Models\admin\TeacherAttendance;
use Illuminate\Http\Request;

class TeacherAttendanceController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = Teacher::where('institute_id', session('institute_id'))->latest()->get();
        // dd($teacher);
        return view('admin.partials.teacher-attendance.index', compact('teacher'));
    }


    public function present(Request $request, $teacherId)
    {
        //validation
        $request->validate([
            'total_hour' => 'required'
        ]);
        $date = \Carbon\Carbon::now()->toDateString();
        TeacherAttendance::updateOrCreate(
            [
                'teacher_id' => $teacherId,
                'institute_id' =>  session('institute_id'),
                'date' => $date,

            ],
            [
                'is_present' => 0,
                'total_hour' => $request->total_hour
            ]
        );

        flash()->success('Present');
        return redirect()->back();
    }

    public function late_present(Request $request, $teacherId)
    {
        //validation
        $request->validate([
            'total_hour' => 'required'
        ]);
        $date = \Carbon\Carbon::now()->toDateString();
        TeacherAttendance::updateOrCreate(
            [
                'teacher_id' => $teacherId,
                'institute_id' => session('institute_id'),
                'date' => $date
            ],
            [
                'is_present' => 1,
                'total_hour' => $request->total_hour
            ]
        );

        flash()->success('Late Present');
        return redirect()->back();
    }

    public function absent($teacherId)
    {
        $date = \Carbon\Carbon::now()->toDateString();
        TeacherAttendance::updateOrCreate(
            [
                'teacher_id' => $teacherId,
                'institute_id' => session('institute_id'),
                'date' => $date
            ],
            [
                'is_present' => 2
            ]
        );

        flash()->success('Absent');
        return redirect()->back();
    }
}
