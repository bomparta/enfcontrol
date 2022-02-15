<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodo', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->smallInteger('status')->default(1)->comment('1 activo / 0 inactivo');
            $table->smallInteger('condicion')->default(1)->comment('1 abierto / 0 cerrado');
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
        Schema::dropIfExists('periodo');
    }
}
