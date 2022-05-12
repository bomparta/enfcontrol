<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modalidad')->insert([
            'descripcion' => 'Presencial',
           
        ]);
        DB::table('modalidad')->insert([
            'descripcion' => 'Virtual',
           
        ]);
	    DB::table('modalidad')->insert([
            'descripcion' => 'Mixta',
          
        ]);
    }
}
