<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_actividad', function (Blueprint $table) {
            $table->id();
            $table->string("descripcion");
            $table->smallInteger('status');
            $table->bigInteger('id_tipo_act_plan');
            $table->bigInteger('id_programa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_actividad');
    }
}
