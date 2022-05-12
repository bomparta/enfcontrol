<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('turno')->insert([
            'descripcion' => 'MAÑANA(08:00 a.m. a 12:00 p.m.)',
           
        ]);
        DB::table('turno')->insert([
            'descripcion' => 'TARDE(01:00 p.m. a 04:00 p.m.)',
           
        ]);
	    DB::table('turno')->insert([
            'descripcion' => 'NOCHE(04:30 a.m. a 09:30 p.m.)',
           
        ]);
    }
}
