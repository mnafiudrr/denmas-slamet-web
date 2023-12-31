<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'phone',
        'is_admin',
        'delete_request',
        'delete_request_at',
        'delete_reason',
        'delete_at',
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

    /**
     * Get the profile associated with the user.
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Get the healths associated with the user.
     */
    public function healths()
    {
        return $this->hasMany(Health::class, 'created_by');
    }

    /**
     * Get the pregnancies associated with the user.
     */
    public function pregnancies()
    {
        return $this->hasMany(Pregnancy::class, 'created_by');
    }

    /**
     * Get the reports associated with the user.
     */
    public function reports()
    {
        return $this->hasMany(Report::class, 'created_by');
    }
}
