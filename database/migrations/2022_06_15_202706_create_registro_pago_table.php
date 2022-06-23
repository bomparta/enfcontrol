<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroPagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_pago', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_usuario');
            $table->bigInteger('id_banco');
            $table->string("cedula");
            $table->bigInteger('id_estudiante');
            $table->bigInteger('id_estado_estudio');
            $table->string("nro_referencia");
            $table->date("fecha_transferencia");
            $table->string("monto_apagar");
            $table->string("monto_depositado");
            $table->string("postgrado");
            $table->string("uc");
            $table->bigInteger('id_periodo');
            $table->smallInteger('status')->comment('1 spagado / 0 no pagado');
            $table->smallInteger('conciliado')->comment('0 No conciliado / 1 conciliado / 2 nerror');
            $table->smallInteger('academico')->comment('1 revisado / 0 no revisado');
            $table->smallInteger('aspirante')->comment('1 aspirante / 0 no aspirante');

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
        Schema::dropIfExists('registro_pago');
    }
}
