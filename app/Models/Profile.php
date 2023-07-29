<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $fillable = [
        'user_id',
        'fullname',
        'address',
        'birthplace',
        'birthday',
    ];

    protected $casts = [
        'birthday' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function health()
    {
        return $this->hasMany(Health::class);
    }

    public function pregnancy()
    {
        return $this->hasMany(Pregnancy::class);
    }

    public function report()
    {
        return $this->hasMany(Report::class);
    }
}
