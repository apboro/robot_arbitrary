<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferenceStudent extends Model
{
    use HasFactory;

    protected $table = 'reference_students';

    protected $guarded = false;
    protected $fillable = [
        'id',
        'user_id',
        'reference_id',
        'status',
        'take'
    ];
}
