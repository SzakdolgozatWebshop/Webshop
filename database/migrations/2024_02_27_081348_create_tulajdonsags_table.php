<?php

use App\Models\Tulajdonsag;
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
        Schema::create('tulajdonsags', function (Blueprint $table) {
            $table->id('tul_id');
            $table->string('elnevezes');
            $table->string('mertekegyseg');
            $table->foreignId('Fokategoria')->references('kat_id')->on('kategorias');
            $table->timestamps();
        });
        Tulajdonsag::create([ 'elnevezes' => 'írási sebesség', 'mertekegyseg' => "mb/s","Fokategoria"=>1]);
        Tulajdonsag::create([ 'elnevezes' => 'tárhely ', 'mertekegyseg' => "GB","Fokategoria"=>1]);

        DB::statement("
        CREATE TRIGGER check_fokatagoria_insert BEFORE INSERT ON tulajdonsags
        FOR EACH ROW
        BEGIN
            DECLARE fokatagoria_count INT;
            SELECT COUNT(*) INTO fokatagoria_count FROM kategorias WHERE kat_id = NEW.Fokategoria AND Fokategoria IS NULL;
            IF fokatagoria_count = 0 THEN
                SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Invalid Fokatagoria value';
            END IF;
        END;
        ");


        Tulajdonsag::create(['elnevezes' => 'írási sebesség', 'mertekegyseg' => 'mb/s', 'Fokategoria' => 1]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tulajdonsags');
    }
};
