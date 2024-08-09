<?php

namespace App\Livewire;

use App\Models\admin\Batch;
use Livewire\Component;

class BatchShowStudents extends Component
{
    public $batch;
    public $count = 1;

    public function increment()
    {
        $this->count++;
    }

    public function test_method()
    {
        dd('test');
    }


    public function mount($batch)
    {
        $this->batch = $batch;
    }

    public function render()
    {
        return view('livewire.batch-show-students');
    }
}
