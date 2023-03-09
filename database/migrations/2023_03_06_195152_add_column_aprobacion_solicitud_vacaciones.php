<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAprobacionSolicitudVacaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('vacaciones.solicitud_vacaciones', function (Blueprint $table) {
            $table->smallInteger('revisado')->default(0);            
            $table->smallInteger('aprobado_coordinador')->default(0);    
            $table->smallInteger('aprobado_director')->default(0);            
            $table->smallInteger('aprobado_presidencia')->default(0);   
            $table->string('observacion_director')->nullable();                     
            $table->string('observacion_presidencia')->nullable(); 
            $table->biginteger('usuario_coordinador')->nullable();                    
            $table->biginteger('usuario_director')->nullable();                    
            $table->biginteger('usuario_presidencia')->nullable();         
            $table->biginteger('tipo_aprobacion_director')->nullable();       
            $table->biginteger('tipo_aprobacion_presidencia')->nullable();               
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
