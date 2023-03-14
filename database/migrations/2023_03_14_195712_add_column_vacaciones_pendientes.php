<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnVacacionesPendientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('vacaciones.vacaciones_pendientes', function (Blueprint $table) {
            $table->string('observaciones_rrhh')->nullable();  
            $table->string('registrado_por')->nullable();     
            $table->string('actualizado_por')->nullable();       
                 
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
