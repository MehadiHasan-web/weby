<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\File;

class ExamPaper extends Component
{
    public $exam;
    public $examPapers;

    public function mount($exam)
    {
        $this->exam = $exam;
        $this->examPapers = json_decode($exam->exam_paper, true) ?? [];
    }
    public function deleteImage($imageName)
    {
        $imagePath = public_path('storage/question/' . $imageName);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $this->examPapers = array_filter($this->examPapers, function ($image) use ($imageName) {
            return $image !== $imageName;
        });

        $this->exam->exam_paper = json_encode($this->examPapers);
        $this->exam->save();
        $this->dispatch('examUpdated');
    }

    public function render()
    {
        return view('livewire.exam-paper', ['examPapers' => $this->examPapers ]);
    }
}
