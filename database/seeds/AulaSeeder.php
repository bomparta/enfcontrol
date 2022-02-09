<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('aula')->insert([
            'descripcion' => 'AULA 1 - ENF (E-1)',
            'capacidad' => '50',
        ]);
        DB::table('aula')->insert([
            'descripcion' => 'AULA 2 - ENF (E-2)',
            'capacidad' => '37',
        ]);
	 DB::table('aula')->insert([
            'descripcion' => 'AULA 3 - ENF (E-3)',
            'capacidad' => '33',
        ]);
 	DB::table('aula')->insert([
           'descripcion' => 'AULA 4 - ENF',
            'capacidad' => '15',
        ]);
	DB::table('aula')->insert([
            'descripcion' => 'AULA 5 - ENF (E-3)',
            'capacidad' => '50',
        ]);
	DB::table('aula')->insert([
             'descripcion' => 'AULA 6 - ENF (E-4)',
            'capacidad' => '40',
        ]);
	DB::table('aula')->insert([
            'descripcion' => 'AULA 7 - ENF (E-5)',
            'capacidad' => '60',
        ]);
    }
}
