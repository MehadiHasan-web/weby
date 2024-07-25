<?php

namespace App\Models\admin;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Batch extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'institute_id',
        'routine',
        'students',
        'teachers'
    ];
    public function student(){
        return $this->BelongsToMany(Student::class, 'batche_student');
    }
    public function attendanceRecords()
    {
        return $this->hasMany(Attendance::class);
    }
    public function teacher(){
        return $this->BelongsToMany(Teacher::class, 'batche_teacher');
    }
}
