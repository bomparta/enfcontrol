<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genero')->insert([
            'cod' => 'M',
            'genero' => 'Masculino',
            'status' => '1',
        ]);
        DB::table('genero')->insert([
            'cod' => 'F',
            'genero' => 'Femenino',
            'status' => '1',
        ]);
    }
}
