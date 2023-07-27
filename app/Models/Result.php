<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $table = 'results';

    protected $fillable = [
        'report_id',
        'imt',
        'status_imt',
        'status_tekanan_darah',
        'status_gula',
        'status_hb',
        'status_kolesterol',
        'status_asam_urat',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
