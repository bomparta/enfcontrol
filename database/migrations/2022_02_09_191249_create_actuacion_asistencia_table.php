<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActuacionAsistenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actuacion_asistencia', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('id_actuacion');
            $table->smallInteger('id_actuacion_participante'); 
            $table->smallInteger('id_asistencia');            
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
        Schema::dropIfExists('actuacion_asistencia');
    }
}
