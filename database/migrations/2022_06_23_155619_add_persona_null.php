<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPersonaNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('persona', function (Blueprint $table) {      
            $table->smallInteger('id_tipo_identificacion')->nullable();
            $table->smallInteger('id_nacionalidad')->nullable(); 
            $table->integer('numero_identificacion')->nullable();
            $table->string('nombre')->nullable();;
            $table->string('nombreseg')->nullable();
            $table->string('apellido')->nullable();;
            $table->string('apellidoseg')->nullable();
            $table->date('edad')->nullable();
            $table->smallInteger('id_genero')->nullable();
            $table->string('email')->nullable();            
            $table->smallInteger('id_estado_civil')->nullable();;
            $table->string('telefono_hab')->nullable();
            $table->string('telefono_cel')->nullable();
            $table->smallInteger('id_organismo')->nullable();
            $table->smallInteger('id_tipo_funcionario')->nullable();
            $table->string('cargo')->nullable();
            $table->smallInteger('id_adscripcion')->nullable();
            $table->smallInteger('id_dependencia')->nullable(); 
            $table->smallInteger('id_pais')->nullable(); 
            $table->smallInteger('id_entidad')->nullable(); 
            $table->smallInteger('status')->default(1);
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
