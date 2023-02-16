<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacacionesDisfrutadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacaciones.vacaciones_disfrutadas', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('funcionario_id')->nullable();
            $table->smallInteger('lapso_disfrute')->nullable();
            $table->bigInteger('dias_disfrutados');      
            $table->bigInteger('dias_completos'); 
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
        Schema::dropIfExists('vacaciones.vacaciones_disfrutadas');
    }
}
