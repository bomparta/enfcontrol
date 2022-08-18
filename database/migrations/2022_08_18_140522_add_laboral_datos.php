<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLaboralDatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('laboral', function (Blueprint $table) {
            $table->string('direccion_empresa')->nullable()->after('telefono_empresa');  
            $table->string('persona_contacto')->nullable();        
            $table->string('cargo_final')->nullable();                
            $table->string('motivo_retiro')->nullable();     
            $table->string('tareas')->nullable();             
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
