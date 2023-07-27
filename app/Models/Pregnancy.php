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

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
