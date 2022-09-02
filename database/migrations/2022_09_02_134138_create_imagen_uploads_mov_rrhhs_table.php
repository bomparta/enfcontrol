<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenUploadsMovRrhhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagen_uploads_mov_rrhh', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('rrhh_mov_id');
            $table->string('ruta')->nullable();
            $table->string('cedula');
            $table->integer('registrado_por');   
            $table->integer('actualizado_por');                                   
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
        Schema::dropIfExists('imagen_uploads_mov_rrhh');
    }
}
