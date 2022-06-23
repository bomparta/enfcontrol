<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFuncionarioNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('funcionario', function (Blueprint $table) {

        $table->dropColumn('id_tipo_funcionario');
        $table->dropColumn('id_oficina_administrativa');
        $table->dropColumn('cargo');
        $table->dropColumn('grupo_sanguineo');
        $table->dropColumn('es_alergico');
        $table->dropColumn('tipo_alergia');
        $table->dropColumn('posee_enfermedad');
        $table->dropColumn('tipo_enfermedad');
        $table->dropColumn('estatura');
        $table->dropColumn('peso');
        $table->dropColumn('pantalon');
        $table->dropColumn('camisa');
        $table->dropColumn('calzado');
        $table->dropColumn('estado_domicilio');
        $table->dropColumn('municipio_domicilio');
        $table->dropColumn('parroquia_domicilio');
        $table->dropColumn('codigo_postal');
        $table->dropColumn('sector_urbanizacion');
        $table->dropColumn('calle_avenida');
        $table->dropColumn('nro_casa_apartamento');
        $table->dropColumn('piso_nro_casa');
        $table->dropColumn('nombre_casa_edificio_residencia');
        $table->dropColumn('condicion_casa_id');
        $table->dropColumn('profesion');
        $table->dropColumn('ocupacion');
        $table->dropColumn('estudia');
        $table->dropColumn('nivel_cursa');
        $table->dropColumn('especialidad');
        $table->dropColumn('institucion_estudia');
        $table->dropColumn('status');


       // $table->dropColumn()->timestamps();
    });

    }
}
