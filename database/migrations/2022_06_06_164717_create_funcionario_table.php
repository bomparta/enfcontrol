<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('persona_id');
            $table->bigInteger('id_tipo_funcionario')->nullable();
            $table->smallInteger('id_oficina_administrativa')->nullable();;
            $table->string('cargo')->nullable();
            $table->string('grupo_sanguineo')->nullable();
            $table->bigInteger('es_alergico')->nullable();
            $table->string('tipo_alergia')->nullable();
            $table->bigInteger('posee_enfermedad')->nullable();
            $table->string('tipo_enfermedad')->nullable();
            $table->string('estatura')->nullable();
            $table->string('peso')->nullable();
            $table->string('pantalon')->nullable();
            $table->string('camisa')->nullable();
            $table->bigInteger('calzado')->nullable();
            $table->bigInteger('estado_domicilio')->nullable();
            $table->bigInteger('municipio_domicilio')->nullable();
            $table->bigInteger('parroquia_domicilio')->nullable();
            $table->bigInteger('codigo_postal')->nullable();
            $table->string('sector_urbanizacion')->nullable();
            $table->string('calle_avenida')->nullable();
            $table->string('nro_casa_apartamento')->nullable();
            $table->string('piso_nro_casa')->nullable();
            $table->string('nombre_casa_edificio_residencia')->nullable();
            $table->bigInteger('condicion_casa_id')->nullable();
            $table->string('profesion')->nullable();
            $table->string('ocupacion')->nullable();
            $table->bigInteger('estudia')->nullable();
            $table->string('nivel_cursa')->nullable();
            $table->string('especialidad')->nullable();
            $table->string('institucion_estudia')->nullable();
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
        Schema::dropIfExists('funcionario');
    }
}
