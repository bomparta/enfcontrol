<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EjeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('eje')->insert([
            'nombre' => 'Formacion Integral',
        ]);
        DB::table('eje')->insert([
            'nombre' => 'Formacion Especializada',
        ]);
        DB::table('eje')->insert([
            'nombre' => 'Formacion en Investigacion',
        ]);
    }
}
