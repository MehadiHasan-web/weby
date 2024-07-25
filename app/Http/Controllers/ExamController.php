<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExamRequest;
use App\Models\admin\Batch;
use App\Models\admin\Exam;
use App\Models\admin\ExamResult;
use App\Models\User;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.partials.exam.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $batch = Batch::where('institute_id', session('institute_id'))->latest()->get();
        $student = User::where('institute_id', session('institute_id'))->latest()->get();

        return view('admin.partials.exam.create', compact('batch' , 'student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExamRequest $request)
    {
        // dd($request->input('student'));
        $data = [
            'institute_id' => session('institute_id'),
            'batche_id' => $request->batche,
            'name' => $request->name,
            'exam_invigilator' => $request->exam_invigilator,
            'course_teacher' => $request->course_teacher,
            'exam_topic' => $request->exam_topic,
            'exam_date' => $request->exam_date,
            'total_time' => $request->total_time,
            'exam_marks' => $request->exam_marks,
        ];
        $exam = Exam::create($data);
        // $exam->student()->attach($request->input('student'));
        flash()->success('Exam created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        $batch = Batch::with('student')->where('id', $exam->batche_id)->first();
        // $result = ExamResult::with('users')->get();
        $exam = Exam::with(['examResults.student'])->findOrFail($exam->id);

        // dd($exam);


        return view('admin.partials.exam.show', compact('exam', 'batch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();
        return response()->json('success');
    }
}
