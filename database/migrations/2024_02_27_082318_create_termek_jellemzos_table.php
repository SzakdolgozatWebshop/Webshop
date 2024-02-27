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
        Schema::create('termek_jellemzos', function (Blueprint $table) {
            $table->foreignId('Termek')->references('ter_id')->on('termeks');
            $table->foreignId('Tulajdonsag')->references('tul_id')->on('tulajdonsags');
            $table->string('ertek');
            $table->primary(['Termek', 'Tulajdonsag']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('termek_jellemzos');
    }
};
