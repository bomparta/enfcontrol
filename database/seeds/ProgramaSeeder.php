<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class ProgramaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programa')->insert([
            'programa' => 'ESPECIALIZACIÓN EN EJERCICIO DE LA FUNCIÓN FISCAL',
            'codigo' => 'EEFF',
            'status' => '1',
        ]);
        DB::table('programa')->insert([
            'programa' => 'ESPECIALIZACIÓN EN DERECHO PENAL',
            'codigo' => 'EDP',
            'status' => '1',
        ]);
        DB::table('programa')->insert([
            'programa' => 'ESPECIALIZACIÓN EN DERECHO PROCESAL PENAL',
            'codigo' => 'EDPP',
            'status' => '1',
        ]);
        DB::table('programa')->insert([
            'programa' => 'ESPECIALIZACIÓN EN MEDICINA FORENSE',
            'codigo' => 'EMF',
            'status' => '1',
        ]);
        DB::table('programa')->insert([
            'programa' => 'ESPECIALIZACIÓN EN CRIMINALÍSTICA DE CAMPO',
            'codigo' => 'ECC',
            'status' => '1',
        ]);
        DB::table('programa')->insert([
            'programa' => 'ESPECIALIZACIÓN EN DERECHO PROBATORIO',
            'codigo' => 'EDPR',
            'status' => '1',
        ]);
        DB::table('programa')->insert([
            'programa' => 'SEMINARIO DE INVESTIGACIÓN ESPECIAL',
            'codigo' => 'SIE',
            'status' => '1',
        ]);
        DB::table('programa')->insert([
            'programa' => 'TRABAJO ESPECIAL DE GRADO (REINCORPORACIÓN)',
            'codigo' => 'TEG',
            'status' => '1',
        ]);
        DB::table('programa')->insert([
            'programa' => 'TRABAJO ESPECIAL DE GRADO (REGULARES)',
            'codigo' => 'TEGR',
            'status' => '1',
        ]);
        DB::table('programa')->insert([
            'programa' => 'CURSO DE PERFECCIONAMIENTO PROFESIONAL EN VICTIMOLOGIA (PRESENCIAL)',
            'codigo' => 'CPPV',
            'status' => '1',
        ]);
        DB::table('programa')->insert([
            'programa' => 'CURSO DE PERFECCIONAMIENTO PROFESIONAL EN JUSTICIA PENAL(PRESENCIAL)',
            'codigo' => 'CPPJP',
            'status' => '1',
        ]);
        DB::table('programa')->insert([
            'programa' => 'CURSO DE PERFECCIONAMIENTO PROFESIONAL EN CIENCIAS FORENSES (PRESENCIAL)',
            'codigo' => 'CPPCF',
            'status' => '1',
        ]);
        DB::table('programa')->insert([
            'programa' => 'CURSO DE PERFECCIONAMIENTO PROFESIONAL EN DEFENSA DE LA MUJER (PRESENCIAL)',
            'codigo' => 'CPPDM',
            'status' => '1',
        ]);
        DB::table('programa')->insert([
            'programa' => 'CURSO DE PERFECCIONAMIENTO PROFESIONAL EN VICTIMOLOGIA (A DISTANCIA)',
            'codigo' => 'CPPVD',
            'status' => '1',
        ]);
        DB::table('programa')->insert([
            'programa' => 'CURSO DE PERFECCIONAMIENTO PROFESIONAL EN JUSTICIA PENAL(A DISTANCIA)',
            'codigo' => 'CPPJPD',
            'status' => '1',
        ]);
        DB::table('programa')->insert([
            'programa' => 'CURSO DE PERFECCIONAMIENTO PROFESIONAL EN CIENCIAS FORENSES (A DISTANCIA)',
            'codigo' => 'CPPCFD',
            'status' => '1',
        ]);
        DB::table('programa')->insert([
            'programa' => 'CURSO DE PERFECCIONAMIENTO PROFESIONAL EN DEFENSA DE LA MUJER (A DISTANCIA)',
            'codigo' => 'CPPDMD',
            'status' => '1',
        ]);
    }
}
