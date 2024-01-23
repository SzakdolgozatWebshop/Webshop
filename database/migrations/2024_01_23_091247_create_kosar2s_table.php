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
        Schema::create('kosar2s', function (Blueprint $table) {
            $table->foreignId('cikkszam')->references('cikkszam')->on('cikk_models');
            $table->foreignId('kosar_id')->references('kosar_id')->on('kosars');
            $table->integer('menny');
            $table->date('utolsoBe');
            $table->primary('kosar_id', 'cikkszam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kosar2s');
    }
};
