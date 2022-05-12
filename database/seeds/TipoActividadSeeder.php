<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoActividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Taller',
            'status' => '1',
            'id_tipo_act_plan' => '20',
            'id_programa' => '3',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Jornada',
            'status' => '1',
            'id_tipo_act_plan' => '16',
            'id_programa' => '3',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Congreso',
            'status' => '1',
            'id_tipo_act_plan' => '7',
            'id_programa' => '3',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Curso',
            'status' => '1',
            'id_tipo_act_plan' => '10',
            'id_programa' => '3',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Conferencia',
            'status' => '1',
            'id_tipo_act_plan' => '6',
            'id_programa' => '3',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Conversatorio',
            'status' => '1',
            'id_tipo_act_plan' => '9',
            'id_programa' => '3',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Cine Foro',
            'status' => '1',
            'id_tipo_act_plan' => '3',
            'id_programa' => '3',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Diplomado',
            'status' => '1',
            'id_tipo_act_plan' => '20',
            'id_programa' => '2',
        ]);DB::table('tipo_actividad')->insert([
            'descripcion' => 'Especializacion',
            'status' => '1',
            'id_tipo_act_plan' => '14',
            'id_programa' => '1',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Charlas',
            'status' => '1',
            'id_tipo_act_plan' => '2',
            'id_programa' => '3',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Coloquio',
            'status' => '1',
            'id_tipo_act_plan' => '20',
            'id_programa' => '3',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Programa',
            'status' => '1',
            'id_tipo_act_plan' => '18',
            'id_programa' => '3',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Encuentro',
            'status' => '1',
            'id_tipo_act_plan' => '13',
            'id_programa' => '3',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Foro',
            'status' => '1',
            'id_tipo_act_plan' => '15',
            'id_programa' => '3',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Seminario',
            'status' => '1',
            'id_tipo_act_plan' => '19',
            'id_programa' => '3',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Clase Magistrar',
            'status' => '1',
            'id_tipo_act_plan' => '5',
            'id_programa' => '3',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Convencion',
            'status' => '1',
            'id_tipo_act_plan' => '8',
            'id_programa' => '3',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Clase',
            'status' => '1',
            'id_tipo_act_plan' => '4',
            'id_programa' => '3',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Aula Virtual',
            'status' => '1',
            'id_tipo_act_plan' => '1',
            'id_programa' => '3',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Doctorado',
            'status' => '1',
            'id_tipo_act_plan' => '12',
            'id_programa' => '1',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Maestria',
            'status' => '1',
            'id_tipo_act_plan' => '17',
            'id_programa' => '1',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Catedra',
            'status' => '1',
            'id_tipo_act_plan' => '21',
            'id_programa' => '3',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Induccion',
            'status' => '1',
            'id_tipo_act_plan' => '20',
            'id_programa' => '3',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Curso de Ampliacion',
            'status' => '1',
            'id_tipo_act_plan' => '20',
            'id_programa' => '2',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Curso de Actualizacion',
            'status' => '1',
            'id_tipo_act_plan' => '20',
            'id_programa' => '2',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Curso de Perfeccioinamiento Profesional',
            'status' => '1',
            'id_tipo_act_plan' => '20',
            'id_programa' => '2',
        ]);
        DB::table('tipo_actividad')->insert([
            'descripcion' => 'Programa Postdoctoral',
            'status' => '1',
            'id_tipo_act_plan' => '20',
            'id_programa' => '2',
        ]);
    }
}
