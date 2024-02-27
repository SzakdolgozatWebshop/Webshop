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
        Schema::create('rend_tetels', function (Blueprint $table) {
            $table->foreignId('rend_szam')->references('rend_szam')->on('rendeles');
            $table->foreignId('Termek')->references('ter_id')->on('termeks');
            $table->integer('menny');
            $table->integer('ar');
            $table->foreignId('csomagolva')->references('csomag')->on('csomags');
            $table->primary(['rend_szam', 'Termek']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rend_tetels');
    }
};
