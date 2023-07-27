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
        Schema::create('healths', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
            $table->integer('tekanan_darah_sistol');
            $table->integer('tekanan_darah_diastol');
            $table->integer('kadar_gula');
            $table->integer('kadar_hb');
            $table->integer('kadar_kolesterol');
            $table->integer('kadar_asam_urat');
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('healths');
    }
};
