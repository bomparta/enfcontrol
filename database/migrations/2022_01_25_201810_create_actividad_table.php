<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad', function (Blueprint $table) {
            $table->id();
            $table->string("codigo");
            $table->smallInteger('anio');
            $table->string("nombre");
            $table->bigInteger('id_clasificacion');
            $table->bigInteger('id_tematica');
            $table->bigInteger('id_alcance');
            $table->bigInteger('id_tipo_actividad');
            $table->string("convenio");
            $table->string("institucion");
            $table->boolean('certificacion');
            $table->bigInteger('id_planificador1');
            $table->bigInteger('id_planificador2');
            $table->bigInteger('id_planificador3');
            $table->timestamps();
            $table->smallInteger('status');
            $table->bigInteger('id_programa');
            $table->smallInteger('pasantias');
            $table->smallInteger('investigacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividad');
    }
}
