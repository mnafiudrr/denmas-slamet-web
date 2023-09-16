<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PmtMonitor extends Model
{
    use HasFactory;

    protected $table = 'pmt_monitors';

    protected $fillable = [
        'nama_anak',
        'jenis_kelamin',
        'usia',
        'nama_ibu',
        'alamat',
        'no_hp',
        'tanggal_home_visit',
        'pemberian_pmt',
        'berat_badan_terakhir',
        'created_by',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
