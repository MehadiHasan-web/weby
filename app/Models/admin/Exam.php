<?php

namespace App\Models\admin;

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
    ];
}
