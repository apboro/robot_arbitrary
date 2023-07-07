<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reference extends Model
{
    use HasFactory;

    protected $table = 'references';

    protected $guarded = false;
    protected $fillable = [
        'id',
        'title'
    ];

    public function reference(): HasMany
    {
        return $this->hasMany(ReferenceStudent::class);
    }
}
