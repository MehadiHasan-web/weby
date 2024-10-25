<?php

namespace App\Livewire;

use App\Models\admin\NoteBook as AdminNoteBook;
use Livewire\Component;

class NoteBook extends Component
{

    public $notes;
    public $text;
    public $check_box;
    protected $rules = [
        'text' => 'required',
    ];

    public function save_note()
    {
        $this->validate();

        AdminNoteBook::create([
            'institute_id' => session('institute_id'),
            'status' => 0,
            'notes' => $this->text
        ]);
        $this->text = '';
        flash()->success('Note saved successfully');
    }


    public function updateNotebookStatus($status, $id)
    {
        $status_value = $status == 0 ? 1 : 0;
        //update status
        AdminNoteBook::where('id', $id)->where('institute_id', session('institute_id'))->update([
            'status' => $status_value,
        ]);
    }

    public function delete($id)
    {
        AdminNoteBook::where('institute_id', session('institute_id'))->where('id', $id)->delete();
        flash()->success('All notes deleted successfully');
    }

    public function render()
    {
        $this->notes = AdminNoteBook::where('institute_id', session('institute_id'))->get();
        return view('livewire.note-book');
    }
}
