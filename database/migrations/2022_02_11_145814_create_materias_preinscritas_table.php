<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasPreinscritasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias_preinscritas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_usuario');
            $table->bigInteger('id_oferta_academica');
            $table->bigInteger('id_periodo');
            $table->smallInteger('status');
            $table->smallInteger('reg_pago');
            $table->smallInteger('rev_academica');
            $table->string("observaciones");
            $table->smallInteger('nenabled');
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
        Schema::dropIfExists('materias_preinscritas');
    }
}
