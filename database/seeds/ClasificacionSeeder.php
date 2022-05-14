<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clasificacion')->insert([
            'descripcion' => 'General',
            'status' => '1',
        ]);
        DB::table('clasificacion')->insert([
            'descripcion' => 'Cátedra Permanente de Derechos Humanos',
            'status' => '0',
        ]);
        DB::table('clasificacion')->insert([
            'descripcion' => 'Cátedra Abierta de Litigación Oral',
            'status' => '0',
        ]);
        DB::table('clasificacion')->insert([
            'descripcion' => 'Cátedra Permanente Sobre el Sistema de Justicia Penal Social en Venezuela',
            'status' => '0',
        ]);
        DB::table('clasificacion')->insert([
            'descripcion' => 'Eventos Científicos',
            'status' => '0',
        ]);
        DB::table('clasificacion')->insert([
            'descripcion' => 'Capacitación a Cuerpos Policiales (logros)',
            'status' => '0',
        ]);
        DB::table('clasificacion')->insert([
            'descripcion' => 'Diplomados y Especializaciones',
            'status' => '1',
        ]);
        DB::table('clasificacion')->insert([
            'descripcion' => 'Cátedra Libre de Defensa de la Mujer',
            'status' => '0',
        ]);
        DB::table('clasificacion')->insert([
            'descripcion' => 'Viculación Social dirigida a Cuerpos Policiales',
            'status' => '1',
        ]);
        DB::table('clasificacion')->insert([
            'descripcion' => 'Derechos Humanos',
            'status' => '0',
        ]);
        DB::table('clasificacion')->insert([
            'descripcion' => 'Actividades Académicas (AFA)',
            'status' => '0',
        ]);
        DB::table('clasificacion')->insert([
            'descripcion' => 'Actividades Académicas Externas a la Sede (AES)',
            'status' => '1',
        ]);
        DB::table('clasificacion')->insert([
            'descripcion' => 'Diplomados',
            'status' => '1',
        ]);
        DB::table('clasificacion')->insert([
            'descripcion' => 'Especialización',
            'status' => '1',
        ]);
        DB::table('clasificacion')->insert([
            'descripcion' => 'Vinculación Social dirigida a Comunidades',
            'status' => '1',
        ]);
        DB::table('clasificacion')->insert([
            'descripcion' => 'Cursos de Perfecionamiento Profesional',
            'status' => '1',
        ]);
        DB::table('clasificacion')->insert([
            'descripcion' => 'Actividades Formativas dirigidas al personal del Ministerio Público',
            'status' => '1',
        ]);


    }
}
