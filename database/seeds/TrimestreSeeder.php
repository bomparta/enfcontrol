<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrimestreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trimestre')->insert([
            'nombre' => 'I TRIMESTRE',
            'sigla_t' => 'T1',
        ]);
        DB::table('trimestre')->insert([
            'nombre' => 'II TRIMESTRE',
            'sigla_t' => 'T2',
        ]);
        DB::table('trimestre')->insert([
            'nombre' => 'III TRIMESTRE',
            'sigla_t' => 'T3',
        ]);
        DB::table('trimestre')->insert([
            'nombre' => 'IV TRIMESTRE',
            'sigla_t' => 'T4',
        ]);
        DB::table('trimestre')->insert([
            'nombre' => 'V TRIMESTRE',
            'sigla_t' => 'T5',
        ]);
        DB::table('trimestre')->insert([
            'nombre' => 'VI TRIMESTRE',
            'sigla_t' => 'T6',
        ]);
    }
}
