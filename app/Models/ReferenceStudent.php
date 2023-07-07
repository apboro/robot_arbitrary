<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'take',
        'reference_file'
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function reference(): BelongsTo
    {
        return $this->belongsTo(Reference::class, 'reference_id', 'id');
    }
}
