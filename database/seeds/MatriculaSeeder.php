<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatriculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matricula')->insert([
            'descripcion' => 'Exenta',
           
        ]);
        DB::table('matricula')->insert([
            'descripcion' => 'No Exenta',
           
        ]);
    }
}
