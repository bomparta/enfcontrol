<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_usuario');
            $table->string('nacionalidad');
            $table->string('cedula');
            $table->string('nombre_primer');
            $table->string('nombre_segundo');
            $table->string('apellido_primer');
            $table->string('apellido_segundo');
            $table->bigInteger('id_sexo');
            $table->date('fecha_nac');
            $table->bigInteger('id_estado_civil');
            $table->string('correo');
            $table->bigInteger('id_codigo_hab');
            $table->string('tel_habitacion');
            $table->string('tel_celular');
            $table->bigInteger('id_codigo_cel');
            $table->string('telefono_whatsapp');
            $table->bigInteger('id_codigo_cel_whatsapp');
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
        Schema::dropIfExists('estudiante');
    }
}