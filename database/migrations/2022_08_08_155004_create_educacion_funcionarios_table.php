<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducacionFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educacion_funcionarios', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('funcionario_id');
            $table->string('pri_ult_anio')->nullable();
            $table->date('fecha_ini_pri')->nullable();
            $table->date('fecha_fin_pri')->nullable();
            $table->string('dir_ref_pri','255')->nullable();
            $table->string('institucion_pri','255')->nullable();
            $table->string('sec_ult_anio')->nullable();
            $table->date('fecha_ini_sec')->nullable();
            $table->date('fecha_fin_sec')->nullable();
            $table->string('dir_ref_sec','255')->nullable();
            $table->string('institucion_sec','255')->nullable();
            $table->string('tec_ult_anio')->nullable();
            $table->date('fecha_ini_tec')->nullable();
            $table->date('fecha_fin_tec')->nullable();
            $table->string('dir_ref_tec','255')->nullable();
            $table->string('institucion_tec','255')->nullable();
            $table->string('uni_ult_anio')->nullable();
            $table->date('fecha_ini_uni')->nullable();
            $table->date('fecha_fin_uni')->nullable();
            $table->string('dir_ref_uni','255')->nullable();
            $table->string('institucion_uni','255')->nullable();
            $table->string('profesion_ocup')->nullable();
            $table->string('otros_estudios')->nullable();
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
        Schema::dropIfExists('educacion_funcionarios');
    }
}
