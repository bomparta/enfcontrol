<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelAcademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nivel_academico')->insert([
            'descripcion' => 'Licenciado / Abogado',
        ]);
        DB::table('nivel_academico')->insert([
            'descripcion' => 'Especializaciacion / Maestría / Magister',
        ]);
        DB::table('nivel_academico')->insert([
            'descripcion' => 'Doctorado',
        ]);
    }
}
