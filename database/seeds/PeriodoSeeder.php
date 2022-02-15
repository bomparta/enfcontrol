<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periodo')->insert([
            'nombre' => 'Septiembre- Diciembre 2020',
            'status' => '0',
            'condicion' => '0',
        ]);
        DB::table('periodo')->insert([
            'nombre' => 'Enero-Abril 2021',
            'status' => '0',
            'condicion' => '0',
        ]);
        DB::table('periodo')->insert([
            'nombre' => 'Mayo-Julio 2021',
            'status' => '0',
            'condicion' => '0',
        ]);
        DB::table('periodo')->insert([
            'nombre' => 'Junio-Julio 2021 TEG',
            'status' => '0',
            'condicion' => '0',
        ]);
        DB::table('periodo')->insert([
            'nombre' => 'Septiembre-Diciembre 2021',
            'status' => '0',
            'condicion' => '0',
        ]);
        DB::table('periodo')->insert([
            'nombre' => 'Enero - Abril 2022',
            'status' => '1',
            'condicion' => '1',
        ]);
    }
}
