<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPersonaNullTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('persona', function (Blueprint $table) {      
            $table->dropColumn('id_tipo_identificacion');
                $table->dropColumn('id_nacionalidad'); 
                $table->dropColumn('numero_identificacion');
                $table->dropColumn('nombre');
                $table->dropColumn('nombreseg');
                $table->dropColumn('apellido');
                $table->dropColumn('apellidoseg');
                $table->dropColumn('edad');
                $table->dropColumn('id_genero');
                $table->dropColumn('email')->default(NULL);;            
                $table->dropColumn('id_estado_civil');
                $table->dropColumn('telefono_hab')->default(NULL);
                $table->dropColumn('telefono_cel')->default(NULL);
                $table->dropColumn('id_organismo');
                $table->dropColumn('id_tipo_funcionario');
                $table->dropColumn('cargo');
                $table->dropColumn('id_adscripcion');
                $table->dropColumn('id_dependencia'); 
                $table->dropColumn('id_pais'); 
                $table->dropColumn('id_entidad'); 
                $table->dropColumn('status')->default(1);
            });
    }
}
