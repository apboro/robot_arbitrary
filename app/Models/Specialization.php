<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;

    protected $table = 'specializations';

    protected $guarded = false;
    protected $fillable = [
        'id',
        'code',
        'title',
    ];

    public function groups()
    {
        return $this->belongsToMany(Group::class)->withTimestamps();
    }
}
