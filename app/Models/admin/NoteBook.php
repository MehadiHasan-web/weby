<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteBook extends Model
{
    use HasFactory;
    protected $fillable = ['institute_id', 'status', 'notes', 'total_hour'];
}
