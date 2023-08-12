<?php

namespace Database\Seeders;

use App\Models\ResultConfig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResultConfigSeeder extends Seeder
{
    private $data = [
        [
            'name' => 'Kurus',
            'description' => 'Sebaiknya Anda menambah berat badan',
            'type' => 'imt',
            'min' => 0,
            'max' => 19,
        ],
        [
            'name' => 'Normal',
            'description' => 'Sebaiknya Anda menjaga berat badan Anda',
            'type' => 'imt',
            'min' => 19,
            'max' => 25,
        ],
        [
            'name' => 'Gemuk',
            'description' => 'Sebaiknya Anda mengurangi berat badan Anda',
            'type' => 'imt',
            'min' => 25,
            'max' => 30,
        ],
        [
            'name' => 'Obesitas',
            'description' => 'Sebaiknya Anda berolahraga dan mengurangi berat badan Anda',
            'type' => 'imt',
            'min' => 30,
            'max' => 100,
        ],
        [
            'name' => 'Normal',
            'description' => 'Sebaiknya Anda menjaga tekanan darah Anda',
            'type' => 'tekanan_darah',
            'min' => 0,
            'max' => 1,
        ],
        [
            'name' => 'Pra - hipertensi',
            'description' => 'Sebaiknya Anda menjaga tekanan darah Anda ya',
            'type' => 'tekanan_darah',
            'min' => 0,
            'max' => 1,
        ],
        [
            'name' => 'Hipertensi tingkat 1',
            'description' => 'Sebaiknya Anda melakukan pemeriksaan lebih lanjut',
            'type' => 'tekanan_darah',
            'min' => 0,
            'max' => 1,
        ],
        [
            'name' => 'Hipertensi tingkat 2',
            'description' => 'Sebaiknya Anda melakukan pemeriksaan lebih lanjut, dan segera konsultasi ke dokter',
            'type' => 'tekanan_darah',
            'min' => 0,
            'max' => 1,
        ],
        [
            'name' => 'Data tidak valid',
            'description' => 'Sepertinya ada kesalahan dalam pengisian data Anda',
            'type' => 'tekanan_darah',
            'min' => 0,
            'max' => 1,
        ],
        [
            'name' => 'Rendah',
            'description' => 'Banyakin makan yang manis-manis ya',
            'type' => 'gula',
            'min' => 0,
            'max' => 1,
        ],
        [
            'name' => 'Normal',
            'description' => 'Sebaiknya Anda menjaga kadar gula Anda',
            'type' => 'gula',
            'min' => 0,
            'max' => 1,
        ],
        [
            'name' => 'Tinggi',
            'description' => 'Sebaiknya Anda mengurangi makanan yang manis-manis ya',
            'type' => 'gula',
            'min' => 0,
            'max' => 1,
        ],
        [
            'name' => 'Data tidak valid',
            'description' => 'Sepertinya ada kesalahan dalam pengisian data Anda',
            'type' => 'gula',
            'min' => 0,
            'max' => 1,
        ],
        [
            'name' => 'Rendah',
            'description' => 'Sebaiknya Anda mengonsumsi makanan yang mengandung zat besi',
            'type' => 'hb',
            'min' => 0,
            'max' => 1,
        ],
        [
            'name' => 'Normal',
            'description' => 'Sebaiknya Anda menjaga kadar hb Anda',
            'type' => 'hb',
            'min' => 0,
            'max' => 1,
        ],
        [
            'name' => 'Tinggi',
            'description' => 'Sebaiknya Anda mengurangi konsumsi makanan yang mengandung zat besi',
            'type' => 'hb',
            'min' => 0,
            'max' => 1,
        ],
        [
            'name' => 'Data tidak valid',
            'description' => 'Sepertinya ada kesalahan dalam pengisian data Anda',
            'type' => 'hb',
            'min' => 0,
            'max' => 1,
        ],
        [
            'name' => 'Normal',
            'description' => 'Sebaiknya Anda mengonsumsi makanan yang mengandung lemak baik',
            'type' => 'kolesterol',
            'min' => 0,
            'max' => 1,
        ],
        [
            'name' => 'Batas Tinggi',
            'description' => 'Sebaiknya Anda menjaga kadar kolesterol Anda',
            'type' => 'kolesterol',
            'min' => 0,
            'max' => 1,
        ],
        [
            'name' => 'Tinggi',
            'description' => 'Sebaiknya Anda mengurangi konsumsi makanan yang mengandung lemak jahat',
            'type' => 'kolesterol',
            'min' => 0,
            'max' => 1,
        ],
        [
            'name' => 'Data tidak valid',
            'description' => 'Sepertinya ada kesalahan dalam pengisian data Anda',
            'type' => 'kolesterol',
            'min' => 0,
            'max' => 1,
        ],
        [
            'name' => 'Rendah',
            'description' => 'Sebaiknya Anda mengonsumsi makanan yang mengandung purin',
            'type' => 'asam_urat',
            'min' => 0,
            'max' => 1,
        ],
        [
            'name' => 'Normal',
            'description' => 'Sebaiknya Anda menjaga kadar asam urat Anda',
            'type' => 'asam_urat',
            'min' => 0,
            'max' => 1,
        ],
        [
            'name' => 'Tinggi',
            'description' => 'Sebaiknya Anda mengurangi konsumsi makanan yang mengandung purin',
            'type' => 'asam_urat',
            'min' => 0,
            'max' => 1,
        ],
        [
            'name' => 'Data tidak valid',
            'description' => 'Sepertinya ada kesalahan dalam pengisian data Anda',
            'type' => 'asam_urat',
            'min' => 0,
            'max' => 1,
        ]
    ];
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    	collect($this->data)
        ->map(function (array $item) {
            ResultConfig::updateOrCreate($item);
        });
    }
}
