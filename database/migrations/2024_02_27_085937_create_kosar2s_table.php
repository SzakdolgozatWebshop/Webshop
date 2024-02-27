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
            $table->foreignId('kosar_id')->references('kosar_id')->on('kosars');
            $table->foreignId('Termek')->references('ter_id')->on('termeks');
            $table->integer('menny');
            $table->primary(['kosar_id', 'Termek']);
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
