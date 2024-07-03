<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function approved(User $id)
    {
        $id->update(['status' => 1]);
        flash()->success('Student has been approved.');
        return redirect()->back();
    }
}
