<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodigoHabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('codigo_hab')->insert([
            'descripcion' => '0212',
        ]);
    }
}
