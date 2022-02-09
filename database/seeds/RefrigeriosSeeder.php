<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefrigeriosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('refrigerios')->insert([
            'descripcion' => 'Ninguno',
            'status' => '1',
        ]);
        DB::table('refrigerios')->insert([
            'descripcion' => 'Alimentos y Bebidas',
            'status' => '1',
        ]);
        DB::table('refrigerios')->insert([
            'descripcion' => 'Relaciones Sociales',
            'status' => '1',
        ]);
    }
}
