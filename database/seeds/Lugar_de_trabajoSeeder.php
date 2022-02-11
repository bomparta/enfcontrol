<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Lugar_de_trabajoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lugar_trabajo')->insert([
            'lugar_trabajo' => 'MINISTERIO PÚBLICO',
            'descuento' => '1',
        ]);
        DB::table('lugar_trabajo')->insert([
            'lugar_trabajo' => 'DEFENSORÍA DEL PUEBLO',
            'descuento' => '1',
        ]);
        DB::table('lugar_trabajo')->insert([
            'lugar_trabajo' => 'DEFENSA PÚBLICA',
            'descuento' => '0',
        ]);
        DB::table('lugar_trabajo')->insert([
            'lugar_trabajo' => 'PODER JUDICIAL',
            'descuento' => '0',
        ]);
        DB::table('lugar_trabajo')->insert([
            'lugar_trabajo' => 'CONTRALORÍA GENERAL DE LA REPÚBLICA',
            'descuento' => '0',
        ]);
        DB::table('lugar_trabajo')->insert([
            'lugar_trabajo' => 'CONSEJO NACIONAL ELECTORAL',
            'descuento' => '0',
        ]);
        DB::table('lugar_trabajo')->insert([
            'lugar_trabajo' => 'MINISTERIO PERTENECIENTE AL PODER EJECUTIVO',
            'descuento' => '0',
        ]);
        DB::table('lugar_trabajo')->insert([
            'lugar_trabajo' => 'EMPRESA- FUNDACIÓN- INSTITUTOS DEL ESTADO VENEZOLANO',
            'descuento' => '0',
        ]);
        DB::table('lugar_trabajo')->insert([
            'lugar_trabajo' => 'EMPRESA PRIVADA',
            'descuento' => '0',
        ]);
        DB::table('lugar_trabajo')->insert([
            'lugar_trabajo' => 'FUERZA ARMADA NACIONAL BOLIVARIANA',
            'descuento' => '0',
        ]);
        DB::table('lugar_trabajo')->insert([
            'lugar_trabajo' => 'ÓRGANOS AUXILIARES DE INVESTIGACIÓN',
            'descuento' => '0',
        ]);
        DB::table('lugar_trabajo')->insert([
            'lugar_trabajo' => 'SISTEMA DE SALUD PÚBLICO',
            'descuento' => '0',
        ]);
        DB::table('lugar_trabajo')->insert([
            'lugar_trabajo' => 'SISTEMA DE SALUD PRIVADO',
            'descuento' => '0',
        ]);
        DB::table('lugar_trabajo')->insert([
            'lugar_trabajo' => 'BECARIA / BECARIO',
            'descuento' => '0',
        ]);
        DB::table('lugar_trabajo')->insert([
            'lugar_trabajo' => 'PROFESIONAL DE LIBRE EJERCICIO',
            'descuento' => '0',
        ]);
        DB::table('lugar_trabajo')->insert([
            'lugar_trabajo' => 'ECONOMÍA INFORMAL',
            'descuento' => '0',
        ]);
        DB::table('lugar_trabajo')->insert([
            'lugar_trabajo' => 'DESEMPLEADA / DESEMPLEADO',
            'descuento' => '0',
        ]);
    }
}
