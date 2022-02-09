<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViaticosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('viaticos')->insert([
            'descripcion' => 'Ninguno',
            'status' => '1',
        ]);
        DB::table('viaticos')->insert([
            'descripcion' => 'Planificadores',
            'status' => '1',
        ]);
        DB::table('viaticos')->insert([
            'descripcion' => 'Facilitadores',
            'status' => '1',
        ]);
        DB::table('viaticos')->insert([
            'descripcion' => 'participantes',
            'status' => '1',
        ]);
        DB::table('viaticos')->insert([
            'descripcion' => 'Planificadores/Facilitadores',
            'status' => '1',
        ]);
        DB::table('viaticos')->insert([
            'descripcion' => 'Planificadores/Participantes',
            'status' => '1',
        ]);
        DB::table('viaticos')->insert([
            'descripcion' => 'Facilitadores/Participantes',
            'status' => '1',
        ]);
        DB::table('viaticos')->insert([
            'descripcion' => 'Planificadores/Facilitadores/Participantes',
            'status' => '1',
        ]);
    }
}
