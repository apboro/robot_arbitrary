<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truancies extends Model
{
    use HasFactory;

    protected $table = 'truancies';

    protected $guarded = false;

    protected $fillable = [
        'student_id',
        'teacher_id',
        'group_id',
        'item_id',
        'couple',
        'count_hours',
    ];

}
