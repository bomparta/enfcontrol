<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovBienesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bienes_nacionales.mov_bienes', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_registro')->nullable();
            $table->integer('bienes_id');
            $table->integer('tipo_movimiento_id');
            $table->string('responsable_asignado');            
            $table->integer('ubic_adm_id');//donde se ubica administrativamente
            $table->integer('entidad_id');//donde se ubica geograficamente
            $table->integer('quien_registro');
            $table->string('observaciones')->nullable();
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
        Schema::dropIfExists('bienes_nacionales.mov_bienes');
    }
}
