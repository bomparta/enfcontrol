<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodigoCelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('codigo_cel')->insert([
            'descripcion' => '0412',
        ]);
        DB::table('codigo_cel')->insert([
            'descripcion' => '0414',
        ]);
        DB::table('codigo_cel')->insert([
            'descripcion' => '0416',
        ]);
        DB::table('codigo_cel')->insert([
            'descripcion' => '0424',
        ]);
        DB::table('codigo_cel')->insert([
            'descripcion' => '0426',
        ]);
    }
}
