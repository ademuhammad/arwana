<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePompasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pompas', function (Blueprint $table) {
            $table->id();
            $table->string('pompafilter')->default('LOW');
            $table->string('pompabuang')->default('LOW');
            $table->string('pompaisi')->default('LOW');
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
        Schema::dropIfExists('pompas');
    }
}
