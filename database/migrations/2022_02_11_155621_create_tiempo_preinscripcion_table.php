<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiempoPreinscripcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiempo_preinscripcion', function (Blueprint $table) {
            $table->id();
            $table->date("fecha_inicio");
            $table->time("hora_inicio");
            $table->date("fecha_fin");
            $table->time("hora_fin");
            $table->smallInteger('status')->comment('1 activo / 0 no activo');
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
        Schema::dropIfExists('tiempo_preinscripcion');
    }
}
