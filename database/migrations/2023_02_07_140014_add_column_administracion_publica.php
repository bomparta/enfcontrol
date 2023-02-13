<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnAdministracionPublica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('administracion_publica', function (Blueprint $table) {
           
            $table->integer('registrado_por');
            $table->integer('actualizado_por')->nullable();
            $table->integer('usuario_id_create');
            $table->integer('usuario_id_update')->nullable();
          
            
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
