<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pmt_monitors', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anak');
            $table->string('jenis_kelamin', 10);
            $table->string('usia');
            $table->string('nama_ibu');
            $table->string('alamat');
            $table->string('no_hp');
            $table->date('tanggal_home_visit');
            $table->boolean('pemberian_pmt')->default(false);
            $table->string('berat_badan_terakhir');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pmt_monitors');
    }
};
