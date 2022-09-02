<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRrhhMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    
    {
        Schema::create('rrhh_movimientos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('funcionario_id');
            $table->bigInteger('id_tipo_funcionario');
            $table->Integer('cedula');
            $table->smallInteger('id_oficina_administrativa');
            $table->string('cargo');
            $table->date('fechamov');
            $table->smallInteger('id_tipo_mov');
            $table->string('institucion');
            $table->string('observaciones')->nullable();
            $table->integer('registrado_por');
            $table->integer('actualizado_por')->nullable();
            $table->integer('usuario_id_create');
            $table->integer('usuario_id_update')->nullable();
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
        Schema::dropIfExists('rrhh_movimientos');
    }
}
