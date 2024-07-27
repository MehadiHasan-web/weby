<?php

namespace App\Http\Controllers;

use App\Models\admin\Attendance;
use App\Models\admin\Batch;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $batches = Batch::where('institute_id', session('institute_id'))->with('student')->get();
        return view('admin.partials.attendance.index', compact('batches'));
    }

    public function create(Batch $batch){
        $batch->load('student');
        return view('admin.partials.attendance.create',  compact('batch'));
    }

    // public function store(Request $request)
    // {

    //     $data = $request->validate([
    //         'batch_id' => 'required|exists:batches,id',
    //         'date' => 'nullable|date',
    //         'attendance' => 'array',
    //         'attendance.*' => 'in:0,1,2',
    //     ]);

    //     foreach ($data['attendance'] as $studentId => $status) {
    //         Attendance::create([
    //             'student_id' => $studentId,
    //             'batch_id' => $data['batch_id'],
    //             'date' => $data['date'],
    //             'is_present' => $status,
    //         ]);
    //     }
    //     flash()->success('Attendance marked successfully.');
    //     return redirect()->back();
    // }

}
