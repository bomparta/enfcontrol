<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudVacacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacaciones.solicitud_vacaciones', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('funcionario_id')->nullable();
            $table->date('fecha_solicitud')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->date('fecha_reintegro')->nullable();
            $table->bigInteger('dias_disfrute')->nullable();
            $table->bigInteger('status')->default(1);  
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
        Schema::dropIfExists('vacaciones.solicitud_vacaciones');
    }
}
