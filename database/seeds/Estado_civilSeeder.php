<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Estado_civilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_civil')->insert([
            'descripcion' => 'Soltero/a',
            'status' => '1',
        ]);
        DB::table('estado_civil')->insert([
            'descripcion' => 'Casado/a',
            'status' => '1',
        ]);
        DB::table('estado_civil')->insert([
            'descripcion' => 'Divorciado/a',
            'status' => '1',
        ]);
        DB::table('estado_civil')->insert([
            'descripcion' => 'Viudo/a',
            'status' => '1',
        ]);
        DB::table('estado_civil')->insert([
            'descripcion' => 'Separado/a',
            'status' => '1',
        ]);
        DB::table('estado_civil')->insert([
            'descripcion' => 'Comcubinoto/a',
            'status' => '1',
        ]);
    }
}
