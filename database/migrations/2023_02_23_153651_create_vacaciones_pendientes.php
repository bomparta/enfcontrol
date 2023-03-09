<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacacionesPendientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacaciones.vacaciones_pendientes', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('funcionario_id');
            $table->smallInteger('lapso_disfrute');
            $table->bigInteger('dias_adisfrutar');              
            $table->bigInteger('dias_pendientes');   
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
        Schema::dropIfExists('vacaciones.vacaciones_pendientes');
    }
}
