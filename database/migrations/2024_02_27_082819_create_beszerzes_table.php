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
        Schema::create('beszerzes', function (Blueprint $table) {
            $table->foreignId('Termek')->references('ter_id')->on('termeks');
            $table->date('mikor');
            $table->integer('mennyi');
            $table->primary(['Termek', 'mikor']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beszerzes');
    }
};
