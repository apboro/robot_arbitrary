<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    use HasFactory;

    protected $table = 'group_user';

    protected $guarded = false;
    protected $fillable = [
        'id',
        'user_id',
        'group_id',
    ];
}
