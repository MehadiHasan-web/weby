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

    public function change_password(Request $request)
    {
        $request->validate([
            'password' => 'sometimes|min:6|confirmed|required_with:password_confirmation',
        ]);

        $user = User::find(auth()->user()->id);
        $user->password = bcrypt($request->password);
        $user->save();
        flash()->success('Password has been changed.');
        return redirect()->back();
    }
}
