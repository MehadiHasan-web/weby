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
}
