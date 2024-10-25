<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRegisterRequest;
use App\Models\admin\Institute;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function ins_index(){
        return view('authentication/institute-register');
    }

    public function student_register(StudentRegisterRequest $request){
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'institute_id' => $request->ins_id,
            'institute_name' => $request->ins_name,
            'password' => Hash::make($request->password),
        ];
        User::create($data);
        flash()->success('Thanks for registered💕');
        return redirect()->route('home');
    }
}
