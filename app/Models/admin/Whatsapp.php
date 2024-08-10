<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whatsapp extends Model
{
    use HasFactory;
    protected $fillable = [
        'institute_id',
        'batch_id',
        'message',
        'file'
    ];
}
