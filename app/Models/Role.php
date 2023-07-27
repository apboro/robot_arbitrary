<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public const Admin = 1;
    public const Teacher = 2;
    public const Student = 3;
    public const Curator = 4;
    public const Robot = 5;
    public const Educational_part = 8;

    protected $table = 'roles';

    protected $guarded = false;
    protected $fillable = [
        'id',
        'title'
    ];
}
