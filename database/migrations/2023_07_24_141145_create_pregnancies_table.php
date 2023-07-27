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
        Schema::create('pregnancies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade');
            $table->boolean('hamil')->default(false);
            $table->integer('usia_kehamilan')->nullable();
            $table->boolean('muntah')->default(false);
            $table->boolean('janin_pasif')->default(false);
            $table->boolean('pendarahan')->default(false);
            $table->boolean('bengkak')->default(false);
            $table->boolean('sembelit')->default(false);
            $table->boolean('nyeri_bak')->default(false);
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pregnancies');
    }
};
