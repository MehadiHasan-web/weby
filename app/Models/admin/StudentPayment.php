<?php

namespace App\Models\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 'institute_id',  'paid','note'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
