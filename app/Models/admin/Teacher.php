<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'institute_id',
        'name',
        'teacher_subject',
        'teacher_time',
        'degree',
        'phone',
        'teacher_fee',
        'photo',
        'education_ins'
    ];
}
