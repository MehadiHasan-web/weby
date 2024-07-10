<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherAttendance extends Model
{
    use HasFactory;
    protected $fillable = ['teacher_id', 'institute_id', 'date', 'is_present'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
