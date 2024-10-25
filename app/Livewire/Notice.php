<?php

namespace App\Livewire;

use App\Models\Notice as ModelsNotice;
use Livewire\Component;

class Notice extends Component
{
    public $notice;
    public $text;
    // public $check_box;
    protected $rules = [
        'text' => 'required',
    ];

    public function save_note()
    {
        $this->validate();

        ModelsNotice::create([
            'institute_id' => session('institute_id'),
            'status' => 0,
            'notice' => $this->text
        ]);
        $this->text = '';
        flash()->success('Note saved successfully');
    }


    // public function updateNotebookStatus($status, $id)
    // {
    //     $status_value = $status == 0 ? 1 : 0;
    //     //update status
    //     ModelsNotice::where('id', $id)->where('institute_id', session('institute_id'))->update([
    //         'status' => $status_value,
    //     ]);
    // }

    public function delete($id)
    {
        ModelsNotice::where('institute_id', session('institute_id'))->where('id', $id)->delete();
        flash()->success('All notes deleted successfully');
    }

    public function render()
    {
        $this->notice = ModelsNotice::where('institute_id', session('institute_id'))->get();
        return view('livewire.notice');
    }
}
