<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('esps', function (Blueprint $table) {
            $table->id();
            $table->integer('final_ph');
            $table->integer('final_ker');
            $table->integer('fuzzy');
            $table->string('keadaanph');
            $table->string('keadaanturbity');
            $table->string('kualitasair');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('esps');
    }
}
