<?php

namespace App\Http\Controllers;

use App\Http\Requests\BatchRequest;
use App\Models\admin\Batch;
use App\Models\admin\Student;
use App\Models\admin\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;


class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batch = Batch::where('institute_id', session('institute_id'))->latest()->get();
        return view('admin.partials.batch.index', compact('batch'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partials.batch.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BatchRequest $request)
    {
        $data = [
            'institute_id' => session('institute_id'),
            'name' => $request->name,
        ];

        // more image
        $routine = [];
        if ($request->hasFile('routine')) {
            foreach ($request->file('routine') as $key => $image) {
                $reviewDirectory = public_path('storage/routine');
                File::makeDirectory($reviewDirectory, 0755, true, true);

                $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $uniqueName = $originalName . '_' . Str::random(20) . '_' . uniqid() . '.' . 'webp';
                Image::make($image)->save('storage/routine/' . $uniqueName, 100, 'webp');

                array_push($routine, $uniqueName);
            }
            $data['routine'] = json_encode($routine);
        }

        if (Auth::user()->hasRole('moderator')) {
            Batch::create($data);
            flash()->success('Batch created ');
            return redirect()->route('batch.index');
        } else {
            flash()->info('Sorry you are not institute');
            return redirect()->route('batch.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Batch $batch)
    {
        $students = Student::where('institute_id', session('institute_id'))->whereNotNull('institute_id')->latest()->get();
        $teachers = Teacher::where('institute_id', session('institute_id'))->latest()->get();
        // $selectedIdsStudents = json_decode($batch->student, true) ?: [];
        // dd($batch->teacher);
        return view('admin.partials.batch.show', compact('batch', 'students', 'teachers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Batch $batch)
    {
        return view('admin.partials.batch.edit', compact('batch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Batch $batch)
    {
        $batch->name = $request->name;

        $data = [
            'name' => $request->name,
        ];

        // more image
        $routine = [];
        if ($request->hasFile('routine')) {

            $old_image = json_decode($batch->routine);
            if ($old_image) {
                foreach ($old_image as $item) {
                    $filePath = public_path('storage/routine/' . $item);
                    if ($filePath) {
                        unlink($filePath);
                    }
                }
            }

            foreach ($request->file('routine') as  $image) {
                $reviewDirectory = public_path('storage/routine');
                File::makeDirectory($reviewDirectory, 0755, true, true);

                $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $uniqueName = $originalName . '_' . Str::random(20) . '_' . uniqid() . '.' . 'webp';
                Image::make($image)->save('storage/routine/' . $uniqueName, 100, 'webp');

                array_push($routine, $uniqueName);
            }
            $data['routine'] = json_encode($routine);
        }


        $batch->update($data);
        flash()->success('Batch update successfully');
        return redirect()->route('batch.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Batch $batch)
    {

        $old_image = json_decode($batch->routine);
        if ($old_image) {
            foreach ($old_image as $item) {
                $filePath = public_path('storage/routine/' . $item);
                if ($filePath) {
                    unlink($filePath);
                }
            }
        }
        $batch->delete();
        return response('Batch delete');
    }

    // add students
    public function add_students(Request $request, Batch $batch)
    {
        $isn_id = session('institute_id');
        if ($batch->institute_id === $isn_id) {
            // $students = json_encode($request->students);
            // $teachers = json_encode($request->teachers);
            // $batch->update([
            //     'students' => $students,
            //     'teachers' => $teachers,
            // ]);
            $batch->student()->attach($request->input('student'));
            $batch->teacher()->attach($request->input('teacher'));
            flash()->success('Successfully added');
            return redirect()->back();
        }
        flash()->error('Sorry your are not Institute');
        return redirect()->back();
    }
}
