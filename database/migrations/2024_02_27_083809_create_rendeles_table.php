<?php

use App\Models\Rendeles;
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
        Schema::create('rendeles', function (Blueprint $table) {
            $table->id('rend_szam');
            $table->date('kelt');
            $table->foreignId('vasarlo')->references('id')->on('users');
            $table->foreignId('csomag')->references('csomag')->on('csomags');
            $table->timestamps();
        });
        Rendeles::create(["kelt" => "2024-01-01", "vasarlo" => 3, "csomag" => 1]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendeles');
    }
};
