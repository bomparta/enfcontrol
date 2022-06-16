<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrabajo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('trabajo', function (Blueprint $table) {
        $table->bigInteger('id_usuario')->after('id');
            $table->bigInteger('id_lugar_trabajo');
            $table->string('cargo');
            $table->string('tel_trabajo');
            $table->biginteger('jubilado');
            $table->bigInteger('id_estado_inscribio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
