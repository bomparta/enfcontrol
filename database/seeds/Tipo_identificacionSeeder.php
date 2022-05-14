<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Tipo_identificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_identificacion')->insert([
            'descripcion' => 'Cedula',
            'status' => '1',
        ]);
        DB::table('tipo_identificacion')->insert([
            'descripcion' => 'Pasaporte',
            'status' => '1',
        ]);
        DB::table('tipo_identificacion')->insert([
            'descripcion' => 'Partida de Naciiento',
            'status' => '1',
        ]);
    }
}
