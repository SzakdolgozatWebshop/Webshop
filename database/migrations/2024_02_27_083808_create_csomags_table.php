<?php

use App\Models\Csomag;
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
        Schema::create('csomags', function (Blueprint $table) {
            $table->id('csomag');
            $table->date('atadva')->nullable();
            $table->boolean('allapot');
            $table->timestamps();
        });
        Csomag::create(["atadva" => null, "allapot" => false]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('csomags');
    }
};
