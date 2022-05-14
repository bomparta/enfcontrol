<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActuacionParticipantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actuacion_participantes', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('id_actuacion');
            $table->smallInteger('id_persona'); 
            $table->smallInteger('id_organismo');
            $table->smallInteger('id_adscripcion');
            $table->smallInteger('id_dependencia')->default(1);
 	    $table->string('cargo');
            $table->smallInteger('id_tipo_funcionario');
            $table->smallInteger('id_entidad');
	    $table->smallInteger('id_pais')->default(1);
            $table->smallInteger('id_actuacion_asistencia');
            $table->string('cert_asistencia','2');  
	    $table->string('cert_aprobacion','2');       
            $table->date('fecha_envio_constancia');     
            $table->smallInteger('id_usuario_creador');
            $table->smallInteger('status')->default(1);
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
        Schema::dropIfExists('actuacion_participantes');
    }
}
