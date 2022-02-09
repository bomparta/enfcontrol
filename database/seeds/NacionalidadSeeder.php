<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NacionalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nacionalidad')->insert([
            'cod' => 'V',
            'nacionalidad' => 'Venezolano/a',
            'status' => '1',
        ]);
        DB::table('nacionalidad')->insert([
            'cod' => 'E',
            'nacionalidad' => 'Extranjero/a',
            'status' => '1',
        ]);
    }
}
