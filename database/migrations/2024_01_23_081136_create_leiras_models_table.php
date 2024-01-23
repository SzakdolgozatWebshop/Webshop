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
        Schema::create('leiras_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cikkszam')->references('cikkszam')->on('cikk_models');
            $table->string('leirasText');
            $table->string('Mnev');
            $table->string('Anev');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leiras_models');
    }
};
