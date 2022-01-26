<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programa')->insert([
            'programa' => 'Estudios Conducentes a Grado Académico',
            'codigo' => 'ECGA',
            'status' => '1',
        ]);
        DB::table('programa')->insert([
            'programa' => 'Estudios No Conducentes a Grado Académico',
            'codigo' => 'ENCGA',
            'status' => '1',
        ]);
    }
}
