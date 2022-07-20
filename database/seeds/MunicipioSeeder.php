<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('municipio')->insert([ 'id_entidad'=> '1', 'nombre' => 'Alto Orinoco']);
        DB::table('municipio')->insert([ 'id_entidad'=> '1', 'nombre' => 'Atabapo']);
        DB::table('municipio')->insert([ 'id_entidad'=> '1', 'nombre' => 'Atures']);
        DB::table('municipio')->insert([ 'id_entidad'=> '1', 'nombre' => 'Autana']);
        DB::table('municipio')->insert([ 'id_entidad'=> '1', 'nombre' => 'Manapiare']);
        DB::table('municipio')->insert([ 'id_entidad'=> '1', 'nombre' => 'Maroa']);
        DB::table('municipio')->insert([ 'id_entidad'=> '1', 'nombre' => 'Río Negro']);
        DB::table('municipio')->insert([ 'id_entidad'=> '2', 'nombre' => 'Anaco']);
        DB::table('municipio')->insert([ 'id_entidad'=> '2', 'nombre' => 'Aragua']);
        DB::table('municipio')->insert([ 'id_entidad'=> '2', 'nombre' => 'Manuel Ezequiel Bruzual']);
        DB::table('municipio')->insert([ 'id_entidad'=> '2', 'nombre' => 'Diego Bautista Urbaneja']);
        DB::table('municipio')->insert([ 'id_entidad'=> '2', 'nombre' => 'Fernando Peñalver']);
        DB::table('municipio')->insert([ 'id_entidad'=> '2', 'nombre' => 'Francisco Del Carmen Carvajal']);
        DB::table('municipio')->insert([ 'id_entidad'=> '2', 'nombre' => 'General Sir Arthur McGregor']);
        DB::table('municipio')->insert([ 'id_entidad'=> '2', 'nombre' => 'Guanta']);
        DB::table('municipio')->insert([ 'id_entidad'=> '2', 'nombre' => 'Independencia']);
        DB::table('municipio')->insert([ 'id_entidad'=> '2', 'nombre' => 'José Gregorio Monagas']);
        DB::table('municipio')->insert([ 'id_entidad'=> '2', 'nombre' => 'Juan Antonio Sotillo']);
        DB::table('municipio')->insert([ 'id_entidad'=> '2', 'nombre' => 'Juan Manuel Cajigal']);
        DB::table('municipio')->insert([ 'id_entidad'=> '2', 'nombre' => 'Libertad']);
        DB::table('municipio')->insert([ 'id_entidad'=> '2', 'nombre' => 'Francisco de Miranda']);
        DB::table('municipio')->insert([ 'id_entidad'=> '2', 'nombre' => 'Pedro María Freites']);
        DB::table('municipio')->insert([ 'id_entidad'=> '2', 'nombre' => 'Píritu']);
        DB::table('municipio')->insert([ 'id_entidad'=> '2', 'nombre' => 'San José de Guanipa']);
        DB::table('municipio')->insert([ 'id_entidad'=> '2', 'nombre' => 'San Juan de Capistrano']);


    }
}
