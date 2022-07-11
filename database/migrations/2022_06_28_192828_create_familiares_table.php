<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('familiares', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('persona_id');
            $table->smallInteger('funcionario_id');
            $table->smallInteger('parentezco_id');
            $table->string('ocupacion')->nullable();
            $table->string('telefono')->nullable();
            $table->smallInteger('vive_id')->nullable();
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
        Schema::dropIfExists('familiares');
    }
}
