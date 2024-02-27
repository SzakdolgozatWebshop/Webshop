<?php

use App\Models\Kategoria;
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
        Schema::create('kategorias', function (Blueprint $table) {
            $table->id('kat_id');
            $table->string('elnevezes');
            $table->bigInteger('Fokategoria')->nullable();
            $table->timestamps();
        });
        Kategoria::create([ 'elnevezes' => 'Háttértár', 'Fokategoria' => Null]);
        Kategoria::create([ 'elnevezes' => 'HDD', 'Fokategoria' => 1]);
        Kategoria::create([ 'elnevezes' => 'SSD', 'Fokategoria' => 1]);
        Kategoria::create([ 'elnevezes' => 'Pendrive', 'Fokategoria' => 1]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategorias');
    }
};
