<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EntidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('entidad')->insert([
            'descripcion' => 'Distrito Capital',
        ]);
        DB::table('entidad')->insert([
            'descripcion' => 'Amazonas',
        ]);
        DB::table('entidad')->insert([
            'descripcion' => 'Aragua',
        ]);
    }
}
