<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TipoTrabajadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tipo_trabajador')->insert([

            'descripcion' => 'Empleado',           
        ]);
        DB::table('tipo_trabajador')->insert([
            'descripcion' => 'Contratado',           
        ]);
        DB::table('tipo_trabajador')->insert([
            'descripcion' => 'Obrero',           
        ]);
    }
}
