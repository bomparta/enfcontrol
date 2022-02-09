<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActuacionPonenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actuacion_ponente', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('id_actuacion');
            $table->smallInteger('id_persona'); 
            $table->smallInteger('id_tratamiento');
            $table->smallInteger('id_organismo');
            $table->smallInteger('id_adscripcion');
 	        $table->smallInteger('id_dependencia');
            $table->string('cargo');
            $table->smallInteger('id_entidad');
	        $table->smallInteger('id_pais')->default(1);
	        $table->string('ponencia');
            $table->smallInteger('horas');  
	        $table->smallInteger('id_evaluacion');
            $table->date('fecha_envio_constancia');     
	        $table->smallInteger('id_usuario_creador');
	        $table->smallInteger('id_usuario_envio');
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
        Schema::dropIfExists('actuacion_ponente');
    }
}
