<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Events\UserCreated;
use App\Events\CreatingUser;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $dispatchesEvents = [
        'creating' => CreatingUser::class,
        'created' => UserCreated::class,
    ];

    // public static function booted(): void
    // {
    //     static::creating(function (User $user) {
    //         info("Estás a punto de crear un usuario", $user->toArray());
    //         info("Número de usuarios:", [User::count()]);
    //     });

    //     static::created(function (User $user) {
    //         info("Se acaba de crear un usuario", $user->toArray());
    //         info("Número de usuarios:", [User::count()]);
    //     });
    // }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
