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
            $table->bigInteger('id_tipo_funcionario');
            $table->smallInteger('id_oficina_administrativa');
            $table->string('cargo');
            $table->string('grupo_sanguineo');
            $table->bigInteger('es_alergico');
            $table->string('tipo_alergia');
            $table->bigInteger('posee_enfermedad');
            $table->string('tipo_enfermedad');
            $table->bigInteger('estatura');
            $table->bigInteger('peso');
            $table->bigInteger('pantalon');
            $table->bigInteger('camisa');
            $table->bigInteger('calzado');
            $table->bigInteger('estado_domicilio');
            $table->bigInteger('municipio_domicilio');
            $table->bigInteger('parroquia_domicilio');
            $table->bigInteger('codigo_postal');
            $table->string('sector_urbanizacion');
            $table->string('calle_avenida');
            $table->string('nro_casa_apartamento');
            $table->string('piso_nro_casa');
            $table->string('nombre_casa_edificio_residencia');
            $table->bigInteger('condicion_casa_id');
            $table->string('profesion');
            $table->string('ocupacion');
            $table->bigInteger('estudia');
            $table->string('nivel_cursa');
            $table->string('especialidad');
            $table->string('institucion_estudia');
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
