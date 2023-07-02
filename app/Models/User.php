<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'surname',
        'name',
        'middleName',
        'login',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function getWords(string $surname, string $name): string
    {
        return strtoupper($surname[0]) . strtoupper($name[0]);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'group_user')->withPivot(['created_at'])->withTimestamps();
    }

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'curator_group')->withTimestamps();
    }

    public function claims_student(): HasMany
    {
        return $this->hasMany(Claim::class, 'student_id', 'id');
    }

    public function claims_teacher(): HasOne
    {
        return $this->hasOne(Claim::class, 'teacher_id', 'id');
    }
}
