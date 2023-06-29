<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Claim extends Model
{
    use HasFactory;

    protected $table = 'claims';

    protected $guarded = false;

    protected $fillable = [
        'student_id',
        'teacher_id',
        'comment',
        'claim_file'
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id', 'id');
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
