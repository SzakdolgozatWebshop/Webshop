<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('termeks', function (Blueprint $table) {
            $table->id('ter_id');
            $table->string('elnevezes')->nullable();
            $table->foreignId('Alketegoria')->references('kat_id')->on('kategorias');
            $table->string('marka');
            $table->integer('keszlet');
            $table->integer('eladasi_ar');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('termeks');
    }
};
