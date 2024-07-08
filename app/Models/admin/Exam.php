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
        'exam_invigilator',
        'course_teacher',
        'exam_topic',
        'exam_date',
        'total_time',
        'exam_marks',
        // 'user_id'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'exam_user');
    }
    public function batch(){
        return $this->belongsTo(Batch::class);
    }
    public function examResults()
    {
        return $this->hasMany(ExamResult::class);
    }
}
