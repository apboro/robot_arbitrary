<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';

    protected $guarded = false;
    protected $fillable = [
        'id',
        'title'
    ];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'group_user')->withPivot(['created_at'])->withTimestamps();
    }

    public function specializations(): BelongsToMany
    {
        return $this->belongsToMany(Specialization::class, 'group_specialization')->withTimestamps();
    }

    public function curators(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'curator_group')->withTimestamps();
    }
}
