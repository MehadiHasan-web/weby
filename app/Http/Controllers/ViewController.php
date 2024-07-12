<?php

namespace App\Http\Controllers;

use App\Models\admin\StudentPayment;
use App\Models\User;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function students() {
        return view('admin.partials.student.index');
    }

    public function student_profile(User $user){
        return view('admin.partials.student.show', compact('user'));
    }

}
