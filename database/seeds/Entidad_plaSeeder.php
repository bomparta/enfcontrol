<?php

use Illuminate\Database\Seeder;

class Entidad_plaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('entidad_plas')->insert(['id_entidad' =>'1', 'id_entidad_pla' => '1', 'id_municipio_pla' => '1', 'id_parroquia' => '9', 'ciudad' => 'Caracas']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'2', 'id_entidad_pla' => '2', 'id_municipio_pla' => '3', 'id_parroquia' => '1', 'ciudad' => 'Puerto Ayacucho']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'3', 'id_entidad_pla' => '3', 'id_municipio_pla' => '8', 'id_parroquia' => '1', 'ciudad' => 'Puerto La Cruz']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'4', 'id_entidad_pla' => '4', 'id_municipio_pla' => '1', 'id_parroquia' => '1', 'ciudad' => 'San Fernando de Apure']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'5', 'id_entidad_pla' => '5', 'id_municipio_pla' => '3', 'id_parroquia' => '1', 'ciudad' => 'Maracay']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'6', 'id_entidad_pla' => '6', 'id_municipio_pla' => '4', 'id_parroquia' => '1', 'ciudad' => 'Barinas']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'7', 'id_entidad_pla' => '7', 'id_municipio_pla' => '5', 'id_parroquia' => '6', 'ciudad' => 'Ciudad Bolívar']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'8', 'id_entidad_pla' => '8', 'id_municipio_pla' => '6', 'id_parroquia' => '1', 'ciudad' => 'Valencia']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'9', 'id_entidad_pla' => '9', 'id_municipio_pla' => '8', 'id_parroquia' => '1', 'ciudad' => 'San Carlos']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'10', 'id_entidad_pla' => '10', 'id_municipio_pla' => '4', 'id_parroquia' => '1', 'ciudad' => 'Tucupita']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'11', 'id_entidad_pla' => '11', 'id_municipio_pla' => '14', 'id_parroquia' => '1', 'ciudad' => 'Coro']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'12', 'id_entidad_pla' => '12', 'id_municipio_pla' => '12', 'id_parroquia' => '1', 'ciudad' => 'San Juan de los Morros']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'13', 'id_entidad_pla' => '13', 'id_municipio_pla' => '3', 'id_parroquia' => '5', 'ciudad' => 'Barquisimeto']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'14', 'id_entidad_pla' => '14', 'id_municipio_pla' => '12', 'id_parroquia' => '13', 'ciudad' => 'Mérida']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'15', 'id_entidad_pla' => '15', 'id_municipio_pla' => '10', 'id_parroquia' => '1', 'ciudad' => 'Los Teques']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'16', 'id_entidad_pla' => '16', 'id_municipio_pla' => '8', 'id_parroquia' => '1', 'ciudad' => 'Maturín']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'17', 'id_entidad_pla' => '17', 'id_municipio_pla' => '8', 'id_parroquia' => '1', 'ciudad' => 'Porlamar']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'18', 'id_entidad_pla' => '18', 'id_municipio_pla' => '4', 'id_parroquia' => '1', 'ciudad' => 'Guanare']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'19', 'id_entidad_pla' => '19', 'id_municipio_pla' => '14', 'id_parroquia' => '1', 'ciudad' => 'Cumaná']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'20', 'id_entidad_pla' => '20', 'id_municipio_pla' => '23', 'id_parroquia' => '1', 'ciudad' => 'San Cristobal']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'21', 'id_entidad_pla' => '21', 'id_municipio_pla' => '20', 'id_parroquia' => '1', 'ciudad' => 'Trujillo']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'22', 'id_entidad_pla' => '24', 'id_municipio_pla' => '1', 'id_parroquia' => '4', 'ciudad' => 'Catia La Mar']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'23', 'id_entidad_pla' => '22', 'id_municipio_pla' => '11', 'id_parroquia' => '1', 'ciudad' => 'San Felipe']);
        DB::table('entidad_plas')->insert(['id_entidad' =>'24', 'id_entidad_pla' => '23', 'id_municipio_pla' => '13', 'id_parroquia' => '1', 'ciudad' => 'Maracaibo']);
    }
}
