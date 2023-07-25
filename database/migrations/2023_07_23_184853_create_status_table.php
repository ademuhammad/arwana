<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Status', function (Blueprint $table) { // Perbaiki nama tabel sesuai dengan nama yang digunakan dalam model
            $table->id();
            $table->enum('status', ['manual', 'otomatis'])->default('otomatis');
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
        Schema::dropIfExists('Status'); // Perbaiki nama tabel sesuai dengan nama yang digunakan dalam model
    }
}