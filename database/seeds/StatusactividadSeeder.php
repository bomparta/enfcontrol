<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusactividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_actividad')->insert([
            'descripcion' => 'Planificada',
        ]);
        DB::table('status_actividad')->insert([
            'descripcion' => 'Anulada',
        ]);
        DB::table('status_actividad')->insert([
            'descripcion' => 'Revisada',
        ]);
        DB::table('status_actividad')->insert([
            'descripcion' => 'Entregada',
        ]);
        DB::table('status_actividad')->insert([
            'descripcion' => 'Reprogramar',
        ]);
        DB::table('status_actividad')->insert([
            'descripcion' => 'Devuelta Planificador/Transcriptor',
        ]);
        DB::table('status_actividad')->insert([
            'descripcion' => 'Reportar',
        ]);
        DB::table('status_actividad')->insert([
            'descripcion' => 'Archivada',
        ]);
        DB::table('status_actividad')->insert([
            'descripcion' => 'Reporte POAN Enero',
        ]);
        DB::table('status_actividad')->insert([
            'descripcion' => 'Reporte POAN Febrero',
        ]);
        DB::table('status_actividad')->insert([
            'descripcion' => 'Reporte POAN Marzo',
        ]);
        DB::table('status_actividad')->insert([
            'descripcion' => 'Reporte POAN Abril',
        ]);
        DB::table('status_actividad')->insert([
            'descripcion' => 'Reporte POAN Mayo',
        ]);
        DB::table('status_actividad')->insert([
            'descripcion' => 'Reporte POAN Junio',
        ]);
        DB::table('status_actividad')->insert([
            'descripcion' => 'Reporte POAN Julio',
        ]);
        DB::table('status_actividad')->insert([
            'descripcion' => 'Reporte POAN Agosto',
        ]);
        DB::table('status_actividad')->insert([
            'descripcion' => 'Reporte POAN Septiembre',
        ]);

        DB::table('status_actividad')->insert([
            'descripcion' => 'Reporte POAN Octubre',
        ]);
        DB::table('status_actividad')->insert([
            'descripcion' => 'Reporte POAN Noviembre',
        ]);
        DB::table('status_actividad')->insert([
            'descripcion' => 'Reporte POAN Diciembre',
        ]);
    }
}
