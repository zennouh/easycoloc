<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'number',
        'address',
        'password',
        'reputation',
        'is_admin',
        'banned_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'banned_at' => 'datetime'
        ];
    }
    public function colocations()
    {
        return $this->belongsToMany(Colocation::class)
            ->using(ColocationUser::class)
            ->withPivot('role', 'joined_at', 'left_at')->as('membership')
            ->withTimestamps();
    }
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
    public function settlementsSent()
    {
        return $this->hasMany(Settlement::class, 'from_user_id');
    }
    public function settlementsReceived()
    {
        return $this->hasMany(Settlement::class, 'to_user_id');
    }
}
