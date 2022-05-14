<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TratamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tratamiento')->insert([
            'descripcion' => 'Ponente',
           
        ]);
        DB::table('tratamiento')->insert([
            'descripcion' => 'Facilitador(a)',
           
        ]);
	 DB::table('tratamiento')->insert([
            'descripcion' => 'Relator',
          
        ]);
 	DB::table('tratamiento')->insert([
           'descripcion' => 'Orador',
           
        ]);
	DB::table('tratamiento')->insert([
            'descripcion' => 'Moderador',
          
        ]);
	DB::table('tratamiento')->insert([
             'descripcion' => 'Panelista',
           
        ]);
	DB::table('tratamiento')->insert([
            'descripcion' => 'Tutor de Ponencias',
           
        ]);
    }
}
