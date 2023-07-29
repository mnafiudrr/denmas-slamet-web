<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregnancy extends Model
{
    use HasFactory;

    protected $table = 'pregnancies';

    protected $fillable = [
        'profile_id',
        'hamil',
        'usia_kehamilan',
        'muntah',
        'janin_pasif',
        'pendarahan',
        'bengkak',
        'sembelit',
        'nyeri_bak',
        'created_by',
    ];

    protected $casts = [
        'hamil' => 'boolean',
        'muntah' => 'boolean',
        'janin_pasif' => 'boolean',
        'pendarahan' => 'boolean',
        'bengkak' => 'boolean',
        'sembelit' => 'boolean',
        'nyeri_bak' => 'boolean',
    ];

    public static function boot()
    {
        parent::boot();

        static::saving(function ($pregnancy) {
            if (!$pregnancy->hamil) {
                $pregnancy->usia_kehamilan = null;
                $pregnancy->muntah = false;
                $pregnancy->janin_pasif = false;
                $pregnancy->pendarahan = false;
                $pregnancy->bengkak = false;
                $pregnancy->sembelit = false;
                $pregnancy->nyeri_bak = false;
            }
        });
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function report()
    {
        return $this->hasOne(Report::class);
    }
}
