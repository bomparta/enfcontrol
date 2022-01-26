<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TematicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tematica')->insert([
            'descripcion' => 'Drogas',
            'status' => '1',
            'id_competencia' => '7',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Penal',
            'status' => '1',
            'id_competencia' => '17',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Familia',
            'status' => '1',
            'id_competencia' => '14',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Ambiental',
            'status' => '1',
            'id_competencia' => '11',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Contra la Corrupción',
            'status' => '1',
            'id_competencia' => '5',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Criminalistica',
            'status' => '1',
            'id_competencia' => '8',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Derechos Humanos',
            'status' => '1',
            'id_competencia' => '12',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Desarrollo Profesional',
            'status' => '1',
            'id_competencia' => '13',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Constitucional y Contencioso Administrativo',
            'status' => '1',
            'id_competencia' => '4',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Litigación Oral',
            'status' => '1',
            'id_competencia' => '3',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Legitimación de Capitales',
            'status' => '1',
            'id_competencia' => '6',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Defensa de la Mujer',
            'status' => '1',
            'id_competencia' => '9',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Violencia Escolar',
            'status' => '0',
            'id_competencia' => '16',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Protección de Niños, Niñas y Adolescentes',
            'status' => '1',
            'id_competencia' => '18',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Sistema Penal de Responsabilidad de Adolescentes',
            'status' => '0',
            'id_competencia' => '19',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Seguridad Integral',
            'status' => '1',
            'id_competencia' => '7',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Seminario de Investigacion',
            'status' => '1',
            'id_competencia' => '7',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Derecho Procesal Penal',
            'status' => '1',
            'id_competencia' => '7',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Derecho Probatorio',
            'status' => '0',
            'id_competencia' => '7',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Derecho Penal',
            'status' => '1',
            'id_competencia' => '7',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Ejercicio de la Función Fiscal',
            'status' => '1',
            'id_competencia' => '7',
        ]);
        DB::table('tematica')->insert([
            'descripcion' => 'Medicina Forense',
            'status' => '1',
            'id_competencia' => '7',
        ]);

    }
}
