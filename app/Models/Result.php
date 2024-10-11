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

    public static function boot()
    {
        parent::boot();

        static::saving(function ($result) {
            $health = $result->hitungHealth($result->report_id);

            $result->imt = $health['imt'];
            $result->status_imt = $health['status_imt'];
            $result->status_tekanan_darah = $health['status_tekanan_darah'];
            $result->status_gula = $health['status_gula'];
            $result->status_hb = $health['status_hb'];
            $result->status_kolesterol = $health['status_kolesterol'];
            $result->status_asam_urat = $health['status_asam_urat'];
        });
    }

    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    private function hitungHealth($report_id)
    {
        $report = Report::find($report_id);
        $health = $report->health;
        $pregnancy = $report->pregnancy;

        $imt = $this->countImt($health->berat_badan, $health->tinggi_badan);
        $status_imt = $this->getStatusImt($imt);
        $status_tekanan_darah = $this->getStatusTekananDarah($health->tekanan_darah_sistol, $health->tekanan_darah_diastol);
        $status_gula = $this->getStatusGula($health->kadar_gula);
        $status_hb = $this->getStatusHb($health->kadar_hb, $pregnancy->hamil);
        $status_kolesterol = $this->getStatusKolesterol($health->kadar_kolesterol);
        $status_asam_urat = $this->getStatusAsamUrat($health->kadar_asam_urat);

        return [
            'imt' => $imt,
            'status_imt' => $status_imt,
            'status_tekanan_darah' => $status_tekanan_darah,
            'status_gula' => $status_gula,
            'status_hb' => $status_hb,
            'status_kolesterol' => $status_kolesterol,
            'status_asam_urat' => $status_asam_urat,
        ];
    }

    private function countImt($berat_badan, $tinggi_badan)
    {
        $tinggi_badan = $tinggi_badan / 100;
        $imt = $berat_badan / ($tinggi_badan * $tinggi_badan);
        return number_format($imt, 1);
    }

    private function getStatusImt($imt)
    {
        if ($imt < 18.5) {
            return 'Kurus';
        } elseif ($imt >= 18.5 && $imt <= 24.9) {
            return 'Normal';
        } elseif ($imt >= 25 && $imt <= 29.9) {
            return 'Gemuk';
        } elseif ($imt >= 30) {
            return 'Obesitas';
        }
    }

    private function getStatusTekananDarah($tekanan_darah_sistol, $tekanan_darah_diastol)
    {
        if ($tekanan_darah_sistol < 100 && $tekanan_darah_diastol < 60) {
            return 'Hipotensi';
        } elseif (
            $tekanan_darah_sistol >= 100
            && $tekanan_darah_sistol <= 120
            && $tekanan_darah_diastol >= 60
            && $tekanan_darah_diastol <= 80
        ) {
            return 'Normal';
        } elseif (
            $tekanan_darah_sistol >= 121
            && $tekanan_darah_sistol <= 139
            && $tekanan_darah_diastol >= 81
            && $tekanan_darah_diastol <= 89
        ) {
            return 'Pra - hipertensi';
        } elseif (
            $tekanan_darah_sistol >= 140
            && $tekanan_darah_sistol <= 159
            && $tekanan_darah_diastol >= 90
            && $tekanan_darah_diastol <= 99
        ) {
            return 'Hipertensi tingkat 1';
        } elseif ($tekanan_darah_sistol > 160 && $tekanan_darah_diastol > 100) {
            return 'Hipertensi tingkat 2';
        } else {
            return 'Data tidak valid';
        }
    }

    private function getStatusGula($kadar_gula)
    {
        if ($kadar_gula < 70) {
            return 'Rendah';
        } elseif ($kadar_gula >= 70 && $kadar_gula <= 200) {
            return 'Normal';
        } elseif ($kadar_gula > 200) {
            return 'Tinggi';
        } else {
            return 'Data tidak valid';
        }
    }

    private function getStatusHb($kadar_hb, $hamil)
    {
        $hb_normal = $hamil ? 11 : 12;

        if ($kadar_hb < $hb_normal) {
            return 'Rendah';
        } elseif ($kadar_hb == $hb_normal) {
            return 'Normal';
        } elseif ($kadar_hb > $hb_normal) {
            return 'Tinggi';
        } else {
            return 'Data tidak valid';
        }
    }

    private function getStatusKolesterol($kadar_kolesterol)
    {
        if ($kadar_kolesterol < 200) {
            return "Normal";
        } elseif ($kadar_kolesterol >= 200 && $kadar_kolesterol <= 239) {
            return "Batas Tinggi";
        } elseif ($kadar_kolesterol > 239) {
            return "Tinggi";
        } else {
            return "Data tidak valid";
        }
    }

    private function getStatusAsamUrat($kadar_asam_urat)
    {
        if ($kadar_asam_urat < 2.4) {
            return "Rendah";
        } elseif ($kadar_asam_urat >= 2.4 && $kadar_asam_urat <= 6) {
            return "Normal";
        } elseif ($kadar_asam_urat > 6) {
            return "Tinggi";
        } else {
            return "Data tidak valid";
        }
    }
}
