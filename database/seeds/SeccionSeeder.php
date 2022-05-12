<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seccion')->insert([
            'descripcion' => 'Seccion 01',
        ]);
        DB::table('seccion')->insert([
            'descripcion' => 'Seccion 02',
        ]);
        DB::table('seccion')->insert([
            'descripcion' => 'Seccion 03',
        ]);
        DB::table('seccion')->insert([
            'descripcion' => 'Seccion 04',
        ]);
    }
}
