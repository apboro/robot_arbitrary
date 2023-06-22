<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ROLE_ADMIN = 1;
    const ROLE_TEACHER = 2;
    const ROLE_STUDENT = 3;
    const ROLE_CURATOR = 4;
    const ROLE_ROBOT = 5;

    protected $guarded = false;
    protected $fillable = [
        'id',
        'title'
    ];
}
