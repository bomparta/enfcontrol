<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioGrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario_grupo')->insert([
            'nombre' => 'Estudiante',
            'activos' => '1',
        ]);
        DB::table('usuario_grupo')->insert([
            'nombre' => 'Profesor',
            'activos' => '0',
        ]);
        DB::table('usuario_grupo')->insert([
            'nombre' => 'Secretariado',
            'activos' => '0',
        ]);
        DB::table('usuario_grupo')->insert([
            'nombre' => 'Administrador',
            'activos' => '0',
        ]);
        DB::table('usuario_grupo')->insert([
            'nombre' => 'Informatica',
            'activos' => '0',
        ]);
        DB::table('usuario_grupo')->insert([
            'nombre' => 'Supervisor',
            'activos' => '0',
        ]);
        DB::table('usuario_grupo')->insert([
            'nombre' => 'Planificador',
            'activos' => '0',
        ]);
        DB::table('usuario_grupo')->insert([
            'nombre' => 'Operador',
            'activos' => '0',
        ]);
        DB::table('usuario_grupo')->insert([
            'nombre' => 'Super Administrador',
            'activos' => '0',
        ]);
        DB::table('usuario_grupo')->insert([
            'nombre' => 'Personal RRHH',
            'activos' => '0',
        ]);
        DB::table('usuario_grupo')->insert([
            'nombre' => 'Funcionario',
            'activos' => '0',
        ]);
        DB::table('usuario_grupo')->insert([
            'nombre' => 'Administrador RRHH',
            'activos' => '0',
        ]);
    }
}
