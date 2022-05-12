<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActuacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actuacions', function (Blueprint $table) {
            $table->increments('id');
            $table->char('cod_actividad',10);
            $table->bigInteger('anio');
            $table->char('cod_actuacion',10);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->bigInteger('id_status_actividad');
            $table->bigInteger('id_entidad');
            $table->bigInteger('id_ind_financiero');
            $table->bigInteger('id_tipo_ind_financiero');
            $table->bigInteger('id_viaticos');
            $table->integer('duracion');
            $table->integer('horas');
            $table->string('lugar');
            $table->string('observaciones');
            $table->timestamp('fecha_registro', 0);
            $table->timestamp('fecha_actualizacion', 0);
            $table->smallInteger('status');
            $table->bigInteger('id_planificador');
            $table->bigInteger('num_participantes');
            $table->bigInteger('hoja_ruta');
            $table->date('fecha_asignacion');
            $table->bigInteger('mes_reporte');
            $table->boolean('aprobatorio')->default(false);
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
        Schema::dropIfExists('actuacions');
    }
}
