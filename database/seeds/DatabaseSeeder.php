<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ClasificacionSeeder::class,
            TematicaSeeder::class,
            AlcanceSeeder::class,
            TipoActividadSeeder::class,
            ProgramaSeeder::class,
            StatusactividadSeeder::class,
            PersonaSeeder::class,
            EntidadSeeder::class,

            ]);
    }
}
