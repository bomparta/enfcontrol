<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('id_tipo_identificacion');
            $table->smallInteger('id_nacionalidad'); 
            $table->integer('numero_identificacion');
            $table->string('nombre');
            $table->string('nombreseg');
            $table->string('apellido');
            $table->string('apellidoseg');
            $table->date('edad');
            $table->smallInteger('id_genero');
            $table->string('email')->default(NULL);;            
            $table->smallInteger('id_estado_civil');
            $table->string('telefono_hab')->default(NULL);
            $table->string('telefono_cel')->default(NULL);
            $table->smallInteger('id_organismo');
            $table->smallInteger('id_tipo_funcionario');
            $table->string('cargo');
            $table->smallInteger('id_adscripcion');
            $table->smallInteger('id_dependencia'); 
            $table->smallInteger('id_pais'); 
            $table->smallInteger('id_entidad'); 
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
        Schema::dropIfExists('persona');
    }
}
