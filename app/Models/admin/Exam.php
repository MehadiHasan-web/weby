<?php

namespace App\Models\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'institute_id',
        'batche_id',
        'name',
        'exam_invigilator',
        'course_teacher',
        'exam_topic',
        'exam_date',
        'total_time',
        'exam_marks',
        'exam_paper'
        // 'user_id'
    ];

    public function student(){
        return $this->belongsToMany(Student::class, 'exam_student');
    }
    public function batch(){
        return $this->belongsTo(Batch::class);
    }
    public function examResults()
    {
        return $this->hasMany(ExamResult::class);
    }
}
