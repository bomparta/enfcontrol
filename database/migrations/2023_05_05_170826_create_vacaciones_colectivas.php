<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacacionesColectivas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacaciones.vacaciones_colectivas', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('id_oficina_administrativa');
            $table->bigInteger('id_tipo_funcionario');
            $table->smallInteger('lapso_disfrute');
            $table->bigInteger('dias_adescontar');         
            $table->string('observaciones');                    
            $table->bigInteger('status')->default(1); 
            $table->string('registrado_por')->nullable();     
            $table->string('actualizado_por')->nullable();   
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
        Schema::dropIfExists('vacaciones_colectivas');
    }
}
