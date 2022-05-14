<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencia', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('id_actuacion');
            $table->smallInteger('id_persona'); 
            $table->smallInteger('id_participante');
            $table->smallInteger('id_adscripcion');
            $table->smallInteger('cedula');
 	        $table->smallInteger('asistencia');
            $table->smallInteger('certificado_asistencia');
	        $table->smallInteger('certificado_aprobacion');
            $table->smallInteger('id_actuacion_asistencia');  
	        $table->smallInteger('nota');
            $table->smallInteger('pasantia');
            $table->date('fecha_envio_email');     
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
        Schema::dropIfExists('asistencia');
    }
}
