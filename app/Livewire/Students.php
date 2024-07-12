<?php

namespace App\Livewire;

use App\Models\admin\StudentPayment;
use App\Models\User;
use Livewire\Component;

class Students extends Component
{

    public $students;
    public $fee;
    protected $rules = [
        'fee' => 'required|integer',
    ];
    public function approved(User $user){
        $this->validate();
        if ($user) {
            $user->status = 1;
            $user->save();
            // create student_payments
            StudentPayment::create([
                'user_id' => $user->id,
                'institute_id' => session('institute_id'),
                'fee' => $this->fee,
            ]);
            flash()->success($user->name .' has been approved.');
            return redirect()->back();
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }


    public function render()
    {
        $this->students = User::withoutRole('admin')->where('status', 2)->whereNotNull('institute_id')->latest()->get();
        return view('livewire.students');
    }
}
