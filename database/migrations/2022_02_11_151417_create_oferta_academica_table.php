<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertaAcademicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oferta_academica', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->bigInteger('id_periodo');
            $table->bigInteger('id_programa');
            $table->bigInteger('id_pensum');
            $table->string("codigo");
            $table->string("trimestre");
            $table->bigInteger('id_dia_clase');
            $table->bigInteger('id_docente');
            $table->string("horario");
            $table->string("unidades_creditos");
            $table->bigInteger('seccion');
            $table->string("cupos");
            $table->string("valorpubgen");
            $table->string("monto_total_gen");
            $table->string("valorpubmp");
            $table->string("monto_total_mp");
            $table->smallInteger('status');
            $table->bigInteger('cupos_ocupados');
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
        Schema::dropIfExists('oferta_academica');
    }
}
