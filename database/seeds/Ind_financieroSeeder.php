<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Ind_financieroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ind_financiero')->insert([
            'descripcion' => 'Actividad POAN',
            'status' => '1',
        ]);
        DB::table('ind_financiero')->insert([
            'descripcion' => 'Logros Trimestrales',
            'status' => '1',
        ]);
    }
}
