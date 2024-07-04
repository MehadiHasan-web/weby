<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Students extends Component
{

    public $students;
    // public function mount(){
    //     $this->students = User::withoutRole('admin')->where('status', 2)->whereNotNull('institute_id')->latest()->get();
    // }

    public function approved(User $user){
        if ($user) {
            $user->status = 1;
            $user->save();
            flash()->success($user->name .' has been approved.');
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }


    public function render()
    {
        // dd($this->students);
        $this->students = User::withoutRole('admin')->where('status', 2)->whereNotNull('institute_id')->latest()->get();
        return view('livewire.students');
    }
}
