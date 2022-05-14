<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreinscripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preinscripcion', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_estudiante');
            $table->bigInteger('id_oferta_academica');
            $table->smallInteger('status')->default(1)->comment('1 selecionado / 0 no seleccionado');
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
        Schema::dropIfExists('preinscripcion');
    }
}
