<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id', 'institute_id', 'paid','note'
    ];
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
