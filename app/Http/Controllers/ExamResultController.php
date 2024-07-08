<?php

namespace App\Http\Controllers;

use App\Models\admin\ExamResult;
use Illuminate\Http\Request;

class ExamResultController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'exam_id' => 'required|integer|exists:exams,id',
            'marks' => 'required|integer|min:0',
        ]);

        $condition = [
            'user_id' => $request->input('user_id'),
            'exam_id' => $request->input('exam_id'),
        ];

        $data = [
            'marks' => $request->input('marks'),
            'status' => 1
        ];

        $result = ExamResult::updateOrCreate($condition, $data);
        flash()->success('Result saved successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamResult $examResult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamResult $examResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamResult $examResult)
    {
        // dd($examResult);
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(ExamResult $examResult)
    // {
    //     //
    // }
    public function absent($userId, $examId){
        $condition = [
            'user_id' => $userId,
            'exam_id' => $examId,
        ];

        $data = [
            'marks' => '00',
            'status' => 0
        ];

        $result = ExamResult::updateOrCreate($condition, $data);
        flash()->success('Student absent.');
        return redirect()->back();
    }


}
