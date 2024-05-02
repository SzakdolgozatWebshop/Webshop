<?php

use App\Models\Rend_tetel;
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
        Schema::create('rend_tetels', function (Blueprint $table) {
            $table->foreignId('rend_szam')->references('rend_szam')->on('rendeles');
            $table->foreignId('Termek')->references('ter_id')->on('termeks');
            $table->integer('menny');
            $table->integer('ar');
            $table->integer('allapot'); //0->becsomagolva, 1->nincs becsomagolva
            //$table->foreignId('csomagolva')->references('csomag')->on('csomags');
            //$table->primary(['rend_szam', 'Termek']);
            $table->timestamps();
        });

        Schema::table('rend_tetels', function (Blueprint $table) {
            $table->primary(['rend_szam', 'Termek']);
        });

        DB::table('rend_tetels')->insert([
            'rend_szam' => 1,
            'Termek' => 1,
            'menny' => 1,
            'ar' => 2500,
            'allapot' => 0,
        ]);

        DB::table('rend_tetels')->insert([
            'rend_szam' => 1,
            'Termek' => 2,
            'menny' => 2,
            'ar' => 2000,
            'allapot' => 0,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rend_tetels');
    }
};
