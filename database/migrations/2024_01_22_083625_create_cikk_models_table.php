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
        Schema::create('cikk_models', function (Blueprint $table) {
            $table->id('cikkszam');
            $table->string('marka');
            $table->string('kategoria');
            $table->string('megnevM');
            $table->string('megnevA');
            $table->integer('eladasAr');
            $table->foreignId('opcio_id')->references('op_id')->on('opcio_models');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cikk_models');
    }
};
