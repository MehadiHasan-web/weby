<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'institute_id',
        'name',
        'email',
        'phone',
        'gender',
        'status',
        'fee',
        'address',
        'photo',
    ];

    public function batche(){
        return $this->BelongsToMany(Batch::class, 'batche_student');
    }
    public function attendance(){
        return $this->hasMany(Attendance::class );
    }
}
