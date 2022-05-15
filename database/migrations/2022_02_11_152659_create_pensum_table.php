<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePensumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pensum', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("sigla_uc");
            $table->bigInteger('id_programa');
            $table->bigInteger('id_trimestre');
            $table->string("horas");
            $table->string("unidad_curricular");
            $table->string("codigo");
            $table->bigInteger('id_eje');
            $table->smallInteger('status')->default(1)->comment('1 activo / 0 inactivo');
            $table->string("materia_prela");
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
        Schema::dropIfExists('pensum');
    }
}
