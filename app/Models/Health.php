<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Health extends Model
{
    use HasFactory;

    protected $table = 'healths';

    protected $fillable = [
        'profile_id',
        'tinggi_badan',
        'berat_badan',
        'tekanan_darah_sistol',
        'tekanan_darah_diastol',
        'kadar_gula',
        'kadar_hb',
        'kadar_kolesterol',
        'kadar_asam_urat',
        'created_by',
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
