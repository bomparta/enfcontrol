<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BancoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banco')->insert([
            'nombre' => 'Banco de Venezuela',
            'nro_cuenta' => '0102-0140-30-0000187046',
            'status' => '1',
        ]);
    }
}
