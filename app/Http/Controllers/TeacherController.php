<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\admin\Teacher;
use App\Models\admin\TeacherPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::where('institute_id', session('institute_id'))->latest()->get();
        return view('admin.partials.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partials.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherRequest $request)
    {
        $data = [
            'institute_id' => session('institute_id'),
            'name' => $request->name,
            'teacher_subject' => $request->teacher_subject,
            'degree' => $request->degree,
            'phone' => $request->phone,
            'teacher_fee' => $request->teacher_fee,
            'education_ins' => $request->education_ins,
        ];

        $image = $request->file('photo');
        if ($image) {
            $reviewDirectory = public_path('storage/teacher');
            File::makeDirectory($reviewDirectory, 0755, true, true);

            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $uniqueName = $originalName . '_' . Str::random(20) . '_' . uniqid() . '.' . '.webp';
            Image::make($image)->resize(1280, 1280)->save('storage/teacher/' . $uniqueName, 90, 'webp');

            $data['photo'] = $uniqueName;
        }

        if (Auth::user()->hasRole('moderator')) {
            $teacher = Teacher::create($data);
            // TeacherPayment::create([
            //     'teacher_id' => $teacher->id,
            //     'institute_id' => session('institute_id'),
            //     'hourly_rate' => $request->teacher_fee,
            //     'paid' => 0,
            // ]);

            flash()->success('Teacher created ');
            return redirect()->route('teacher.index');
        } else {
            flash()->info('Sorry you are not institute');
            return redirect()->route('teacher.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return view('admin.partials.teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('admin.partials.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeacherRequest $request, Teacher $teacher)
    {
        $data = [
            'name' => $request->name,
            'teacher_subject' => $request->teacher_subject,
            'teacher_time' => $request->teacher_time,
            'degree' => $request->degree,
            'teacher_fee' => $request->teacher_fee,
            'education_ins' => $request->education_ins,
        ];

        $image = $request->file('photo');
        if ($image) {
            if ($teacher->photo) {
                $filePath = public_path('storage/teacher/' . $teacher->photo);
                if ($filePath) {
                    unlink($filePath);
                }
            }

            $reviewDirectory = public_path('storage/teacher');
            File::makeDirectory($reviewDirectory, 0755, true, true);

            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $uniqueName = $originalName . '_' . Str::random(20) . '_' . uniqid() . '.' . '.webp';
            Image::make($image)->resize(1280, 1280)->save('storage/teacher/' . $uniqueName, 90, 'webp');

            $data['photo'] = $uniqueName;
        }

        if (Auth::user()->hasRole('moderator')) {
            $teacher->update($data);
            flash()->success('Teacher update successfully ');
            return redirect()->route('teacher.index');
        } else {
            flash()->info('Sorry you are not institute');
            return redirect()->route('teacher.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        if ($teacher->photo) {
            $filePath = public_path('storage/teacher/' . $teacher->photo);
            if ($filePath) {
                unlink($filePath);
            }
        }
        $teacher->delete();
        return response('Batch delete');
    }
}
