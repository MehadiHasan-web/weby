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
        $batches = Batch::with('users')->get();
        $users = User::all();
        // dd($batches);
        return view('admin.partials.attendance.index', compact('batches'));
    }

    public function create(Batch $batch){
        $batch->load('users');
        // dd($batch);
        $users = User::all();
        return view('admin.partials.attendance.create',  compact('batch', 'users'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'batch_id' => 'required|exists:batches,id',
            'date' => 'nullable|date',
            'attendance' => 'array',
            'attendance.*' => 'in:0,1,2',
        ]);

        foreach ($data['attendance'] as $userId => $status) {
            Attendance::create([
                'user_id' => $userId,
                'batch_id' => $data['batch_id'],
                'date' => $data['date'],
                'is_present' => $status,
            ]);
        }
        flash()->success('Attendance marked successfully.');
        return redirect()->back();
    }

    public function present($userId, $batchId){
        $date = \Carbon\Carbon::now()->toDateString();
        Attendance::updateOrCreate(
            [
                'user_id' => $userId,
                'batch_id' => $batchId,
                'date' => $date
            ],
            [
                'is_present' => 0
            ]
        );

        flash()->success('Present');
        return redirect()->back();
    }

    public function late_present($userId, $batchId){
        $date = \Carbon\Carbon::now()->toDateString();
        Attendance::updateOrCreate(
            [
                'user_id' => $userId,
                'batch_id' => $batchId,
                'date' => $date
            ],
            [
                'is_present' => 1
            ]
        );

        flash()->success('Late Present');
        return redirect()->back();
    }
    public function absent($userId, $batchId){
        $date = \Carbon\Carbon::now()->toDateString();
        Attendance::updateOrCreate(
            [
                'user_id' => $userId,
                'batch_id' => $batchId,
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
