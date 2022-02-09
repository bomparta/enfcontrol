<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganismoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('organismo')->insert([
            'organismo' => 'Ninguno',
            'status' => '0',
        ]);
        DB::table('organismo')->insert([
            'organismo' => 'Ministerio Publico',
            'status' => '1',
        ]);
        DB::table('organismo')->insert([
            'organismo' => 'Fuerzas Armadas Nacionales Bolivariana',
            'status' => '1',
        ]);
        DB::table('organismo')->insert([
            'organismo' => 'Cuerpo Policiales',
            'status' => '1',
        ]);
        DB::table('organismo')->insert([
            'organismo' => 'Organismos de Investigacion',
            'status' => '1',
        ]);
        DB::table('organismo')->insert([
            'organismo' => 'Organismo Publico',
            'status' => '1',
        ]);
        DB::table('organismo')->insert([
            'organismo' => 'Instituto Docente y Educacion',
            'status' => '1',
        ]);
        DB::table('organismo')->insert([
            'organismo' => 'Organismo Particulares',
            'status' => '1',
        ]);

    }
}
