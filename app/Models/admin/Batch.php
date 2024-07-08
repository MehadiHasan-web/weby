<?php

namespace App\Models\admin;

use App\Models\User;
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
    public function users(){
        return $this->BelongsToMany(User::class, 'batche_user');
    }
    public function attendanceRecords()
    {
        return $this->hasMany(Attendance::class);
    }
}
