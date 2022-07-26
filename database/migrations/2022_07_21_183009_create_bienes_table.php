<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBienesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bienes_nacionales.bienes', function (Blueprint $table) {
            $table->id();
            $table->string('num_bien','10')->nullable();
            $table->string('num_factura','10')->nullable();
            $table->date('fecha_factura')->nullable();
            $table->date('fecha_registro')->nullable();
            $table->string('num_orden_compra')->nullable();
            $table->date('fecha_compra')->nullable();
            $table->string('nombre_proveedor','150')->nullable();
            $table->string('rif_proveedor','10')->nullable();
            $table->string('correo_proveedor','50')->nullable();
            $table->string('rep_legal_proveedor','150')->nullable();
            $table->string('num_cotizacion','10')->nullable();
            $table->date('fecha_cotizacion')->nullable();
            $table->smallInteger('forma_adquisicion_id')->nullable();
            $table->smallInteger('tipo_bien_id')->nullable();
            $table->smallInteger('marca_id')->nullable();
            $table->string('modelo','150')->nullable();
            $table->string('color','150')->nullable();
            $table->string('serial','150')->nullable();
            $table->string('observacion','255')->nullable();
            $table->biginteger('registrado_por')->nullable();
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
        Schema::dropIfExists('bienes_nacionales.bienes');
    }
}
