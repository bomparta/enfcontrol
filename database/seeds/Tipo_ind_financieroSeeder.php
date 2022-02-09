<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tipo_ind_financieroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_ind_financiero')->insert([
            'id_ind_financiero' => '1',
            'descripcion' => 'Ninguno',
            'status' => '1',
        ]);
        DB::table('tipo_ind_financiero')->insert([
            'id_ind_financiero' => '1',
            'descripcion' => 'Punto de Cuenta',
            'status' => '1',
        ]);
        DB::table('tipo_ind_financiero')->insert([
            'id_ind_financiero' => '1',
            'descripcion' => 'Solicitud de Servicio',
            'status' => '1',
        ]);
        DB::table('tipo_ind_financiero')->insert([
            'id_ind_financiero' => '2',
            'descripcion' => 'Sin Solicitud',
            'status' => '1',
        ]);
        DB::table('tipo_ind_financiero')->insert([
            'id_ind_financiero' => '2',
            'descripcion' => 'Solicitud de Servicio',
            'status' => '1',
        ]);
    }
}
