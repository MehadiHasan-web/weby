<?php

namespace App\Http\Controllers;

use App\Models\admin\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.partials.student.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partials.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Student::class],
            'phone' => 'required',
            'address' => 'nullable',
            'gender' => 'nullable',
            'photo' => 'nullable',
            'fee' => 'required',
        ]);
        $data = [
            'institute_id' => session('institute_id'),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'fee' => $request->fee,
        ];
        $image = $request->file('photo');
        if ($image) {
            $reviewDirectory = public_path('storage/student');
            File::makeDirectory($reviewDirectory, 0755, true, true);

            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $uniqueName = $originalName.'_'.Str::random(20) . '_' . uniqid() . '.' . '.webp';
            Image::make($image)->resize(1280, 1280)->save('storage/student/' . $uniqueName, 90, 'webp');

            $data['photo'] = $uniqueName;
        }

        Student::create($data);
        flash()->success('Student created');
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
