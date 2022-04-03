<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_usuario');
            $table->bigInteger('id_estado');
            $table->bigInteger('id_municipio');
            $table->bigInteger('id_parroquia');
            $table->string('ciudad_urbanismo');
            $table->string('calle_avenida');
            $table->string('casa_edificio');
            $table->string('pto_referencia');
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
        Schema::dropIfExists('direccion');
    }
}
