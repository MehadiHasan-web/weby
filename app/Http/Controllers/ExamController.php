<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExamRequest;
use App\Models\admin\Batch;
use App\Models\admin\Exam;
use App\Models\admin\ExamResult;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

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

        return view('admin.partials.exam.create', compact('batch' ));
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
        $question_paper = [];
        if($request->hasFile('question_paper')){
            foreach ($request->file('question_paper') as $key => $image) {
                $reviewDirectory = public_path('storage/question');
                File::makeDirectory($reviewDirectory, 0755, true, true);

                $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $uniqueName = $originalName.'_'.Str::random(20) . '_' . uniqid() . '.' . 'webp';
                Image::make($image)->resize(1280, 1280)->save('storage/question/' . $uniqueName, 90, 'webp');

                 array_push($question_paper, $uniqueName);
            }

            $data['exam_paper'] = json_encode($question_paper);
        }
        $exam = Exam::create($data);
        // $exam->student()->attach($request->input('student'));
        flash()->success('Exam created successfully');
        return redirect()->route('exam.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        $batch = Batch::with('student')->where('id', $exam->batche_id)->first();
        // $result = ExamResult::with('users')->get();
        $exam = Exam::with(['examResults.student'])->findOrFail($exam->id);
        return view('admin.partials.exam.show', compact('exam', 'batch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        $batch = Batch::where('institute_id', session('institute_id'))->latest()->get();
        // dd($exam->exam_paper);
        return view('admin.partials.exam.edit', compact('exam', 'batch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam)
    {
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
        $question_paper = [];
        if($request->hasFile('question_paper')){
            foreach ($request->file('question_paper') as $key => $image) {
                $reviewDirectory = public_path('storage/question');
                File::makeDirectory($reviewDirectory, 0755, true, true);

                $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $uniqueName = $originalName.'_'.Str::random(20) . '_' . uniqid() . '.' . 'webp';
                Image::make($image)->resize(1280, 1280)->save('storage/question/' . $uniqueName, 90, 'webp');

                array_push($question_paper, $uniqueName);
            }
        }
        $existing_exam_papers = json_decode($exam->exam_paper, true) ?? [];
        if (!empty($existing_exam_papers)) {
            $question_paper =array_merge($existing_exam_papers, $question_paper);
        } 
        $data['exam_paper'] = json_encode($question_paper);
        $exam->update($data);
        flash()->success('Exam updated');
        return redirect()->back();
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
