<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboral', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('funcionario_id');
            $table->string('nombre_empresa');
            $table->string('cargo');
            $table->date('fecha_ingreso'); 
            $table->date('fecha_egreso'); 
            $table->string('telefono_empresa',11)->nullable();
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
        Schema::dropIfExists('laboral');
    }
}
