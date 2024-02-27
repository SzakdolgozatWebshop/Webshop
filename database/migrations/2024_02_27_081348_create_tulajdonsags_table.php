<?php

use App\Models\Tulajdonsag;
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
        Schema::create('tulajdonsags', function (Blueprint $table) {
            $table->id('tul_id');
            $table->string('elnevezes');
            $table->string('mertekegyseg');
            $table->foreignId('Fokategoria')->references('kat_id')->on('kategorias');
            $table->timestamps();
        });
        Tulajdonsag::create([ 'elnevezes' => 'írási sebesség', 'mertekegyseg' => "mb/s","Fokategoria"=>1]);
        Tulajdonsag::create([ 'elnevezes' => 'tárhely ', 'mertekegyseg' => "GB","Fokategoria"=>1]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tulajdonsags');
    }
};
