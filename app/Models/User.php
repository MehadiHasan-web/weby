<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\admin\Attendance;
use App\Models\admin\Batch;
use App\Models\admin\Exam;
use App\Models\admin\ExamResult;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'institute_id',
        'batch_id',
        'institute_name',
        'name',
        'email',
        'phone',
        'photo',
        'gender',
        'status',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function exam(){
        return $this->belongsToMany(Exam::class, 'exam_user');
    }
    public function batche(){
        return $this->BelongsToMany(Batch::class, 'batche_user');
    }
    public function examResults()
    {
        return $this->hasMany(ExamResult::class);
    }

    public function batches()
    {
        return $this->belongsToMany(Batch::class);
    }

    public function attendanceRecords()
    {
        return $this->hasMany(Attendance::class);
    }
}
