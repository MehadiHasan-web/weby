<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExamRequest;
use App\Models\admin\Batch;
use App\Models\admin\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $batch = Batch::where('institute_id', session('institute_id'))->latest()->get();

        return view('admin.partials.exam.create', compact('batch'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExamRequest $request)
    {
        $data = [
            'institute_id' => session('institute_id'),
            'batche_id' => $request->batche,
            'exam_invigilator' => $request->exam_invigilator,
            'course_teacher' => $request->course_teacher,
            'exam_topic' => $request->exam_topic,
            'exam_date' => $request->exam_date,
            'total_time' => $request->total_time,
            'exam_marks' => $request->exam_marks,
        ];
        Exam::create($data);
        flash()->success('Exam created successfully');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        //
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
        //
    }
}
