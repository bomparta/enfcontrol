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
            'descripcion' => 'Amazonas',
        ]);
        DB::table('entidad')->insert([
            'descripcion' => 'Anzoátegui',
        ]);
        DB::table('entidad')->insert([
            'descripcion' => 'Apure',
        ]);
        DB::table('entidad')->insert([
            'descripcion' => 'Aragua',
        ]);
        DB::table('entidad')->insert([
            'descripcion' => 'Barinas',
        ]);
        DB::table('entidad')->insert([
            'descripcion' => 'Bolivar',
        ]);
        DB::table('entidad')->insert([
            'descripcion' => 'Carabobo',
        ]);
        DB::table('entidad')->insert([
            'descripcion' => 'Cojedes',
        ]);
        DB::table('entidad')->insert([
            'descripcion' => 'Delta Amacuro',
        ]);
        DB::table('entidad')->insert([
            'descripcion' => 'Falcón',
        ]);
        DB::table('entidad')->insert([
            'descripcion' => 'Guárico',
        ]);
        DB::table('entidad')->insert([
            'descripcion' => 'Lara',
        ]);
        DB::table('entidad')->insert([
            'descripcion' => 'Mérida',
        ]);
        DB::table('entidad')->insert([
            'descripcion' => 'Miranda',
        ]);
        DB::table('entidad')->insert([
            'descripcion' => 'Monagas',
        ]);
        DB::table('entidad')->insert([
            'descripcion' => 'Nueva Esparta',
        ]);
        DB::table('entidad')->insert([
            'descripcion' => 'Portuguesa',
        ]);

        DB::table('entidad')->insert([
            'descripcion' => 'Sucre',
        ]);

        DB::table('entidad')->insert([
            'descripcion' => 'Táchira',
        ]);

        DB::table('entidad')->insert([
            'descripcion' => 'Trujillo',
        ]);

        DB::table('entidad')->insert([
            'descripcion' => 'La Guaira',
        ]);

        DB::table('entidad')->insert([
            'descripcion' => 'Yaracuy',
        ]);

        DB::table('entidad')->insert([
            'descripcion' => 'Zulia',
        ]);

        DB::table('entidad')->insert([
            'descripcion' => 'Distrito Capital',
        ]);

        DB::table('entidad')->insert([
            'descripcion' => 'Exterior',
        ]);


    }
}
