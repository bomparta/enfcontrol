<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntidadPlasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidad_plas', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('id_entidad');
            $table->smallInteger('id_entidad_pla');
            $table->smallInteger('id_municipio_pla');
            $table->smallInteger('id_parroquia');
            $table->string('ciudad');
            $table->smallInteger('status')->default(1);
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
        Schema::dropIfExists('entidad_plas');
    }
}
