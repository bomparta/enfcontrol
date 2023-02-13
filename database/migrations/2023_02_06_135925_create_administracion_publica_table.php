<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministracionPublicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administracion_publica', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('funcionario_id')->nullable();
            $table->string('organismo','255')->nullable();
            $table->string('ult_cargo','255')->nullable();
            $table->bigInteger('id_tipo_funcionario')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->date('fecha_egreso')->nullable();
            $table->smallInteger('anno_servicios')->nullable();
            $table->smallInteger('meses_servicios')->nullable();
            $table->smallInteger('dias_servicios')->nullable();
            $table->string('observaciones','255')->nullable();            
            $table->string('nombre_documento')->nullable();
            $table->string('ruta_documento')->nullable();
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
        Schema::dropIfExists('administracion_publica');
    }
}
