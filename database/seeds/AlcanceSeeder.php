<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlcanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alcance')->insert([
            'descripcion' => 'Nacional',
            'status' => '1',
        ]);
    }
}
