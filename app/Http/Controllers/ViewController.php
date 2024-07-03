<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function students() {
        return view('admin.partials.student.index');
    }
}
