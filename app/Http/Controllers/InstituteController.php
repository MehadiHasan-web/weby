<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstituteRequest;
use App\Models\admin\Institute;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;


class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $institutes = Institute::latest()->get();

        return view('admin.partials.institute.index', compact('institutes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partials.institute.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InstituteRequest $request)
    {
        // dd($request->all());
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'note' => $request->note,
        ];
        // $image = $request->file('photo');
        // if ($image) {
        //     $reviewDirectory = public_path('storage/institute');
        //     File::makeDirectory($reviewDirectory, 0755, true, true);

        //     $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        //     $uniqueName = $originalName.'_'.Str::random(20) . '_' . uniqid() . '.' . '.webp';
        //     Image::make($image)->resize(1280, 1280)->save('storage/institute/' . $uniqueName, 90, 'webp');

        //     $data['photo'] = $uniqueName;
        // }

        Institute::create($data);
        $user = User::create($data);
        $user->assignRole('moderator');
        // Auth::login($user);
        flash()->success('Institute Register');
        return redirect()->route('institute.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Institute $institute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Institute $institute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Institute $institute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Institute $institute)
    {
        $institute->delete();
        return response('Institute delete');
    }
    public function approved($id)
    {
        $institute = Institute::find($id);

        if ($institute) {
            $institute->status = 0;
            $institute->save();
            flash()->success('Institute approved successfully.');
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Institute not found.');
        }
    }
    public function pending($id)
    {
        $institute = Institute::find($id);

        if ($institute) {
            $institute->status = 1;
            $institute->save();
            flash()->success('Institute approval cancelled successfully.');
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'Institute not found.');
        }
    }
}
