<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActuacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actuacion', function (Blueprint $table) {
            $table->id();
            $table->integer("id_actividad");
            $table->string("cod_actividad");
            $table->smallInteger('anio');
            $table->string("cod_actuacion");
            $table->date("fecha_inicio");
            $table->date("fecha_fin");
            $table->bigInteger('id_status_actividad');
            $table->bigInteger('id_entidad');
            $table->bigInteger('id_ind_financiero');
            $table->bigInteger('id_tipo_ind_financiero');
            $table->bigInteger('id_refrigerios');
            $table->bigInteger('id_viaticos');
            $table->double('duracion', 8, 2);
            $table->double('horas', 8, 2);
            $table->string("lugar");
            $table->string("observaciones")->default(NULL);
            $table->timestamps();
            $table->smallInteger('status')->default(1);
            $table->bigInteger('id_planificador');
            $table->bigInteger('num_participantes')->default(NULL);
            $table->bigInteger('hoja_ruta')->default(NULL);
            $table->date("fecha_asignacion")->default(NULL);
            $table->date("mes_reporte")->default(NULL);
            $table->boolean('aprobatorio')->default(NULL);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actuacion');
    }
}
