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
        // body height standart
        Schema::create('body_height_standarts', function (Blueprint $table) {
            $table->id();
            $table->string('gender', 10);
            $table->unsignedInteger('age');
            $table->float('m3sd', 6, 2);
            $table->float('m2sd', 6, 2);
            $table->float('m1sd', 6, 2);
            $table->float('median', 6, 2);
            $table->float('p1sd', 6, 2);
            $table->float('p2sd', 6, 2);
            $table->float('p3sd', 6, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('body_height_standarts');
    }
};
