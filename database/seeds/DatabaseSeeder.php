<?php

use Illuminate\Database\Seeder;

use function Ramsey\Uuid\v1;

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
            //MunicipioSeeder::class,
            //ParroquiaSeeder::class,
            EjeSeeder::class,
            PeriodoSeeder::class,
            TrimestreSeeder::class,
            ProgramaSeeder::class,
            Lugar_de_trabajoSeeder::class,     
            UsuarioGrupoSeeder::class,
            Ind_financieroSeeder::class,
            Tipo_ind_financieroSeeder::class,
            RefrigeriosSeeder::class,
            ViaticosSeeder::class,
            OrganismoSeeder::class,
            NacionalidadSeeder::class,
            GeneroSeeder::class,
            Estado_civilSeeder::class,
            Tipo_identificacionSeeder::class,
            Tipo_funcionarioSeeder::class,
            AulaSeeder::class,
            AdscripcionSeeder::class,
            TratamientoSeeder::class,
            ModalidadSeeder::class,
            MatriculaSeeder::class,
            TurnoSeeder::class,
            Centro_ejecucionSeeder::class,
            PaisSeeder::class,
            NivelAcademicoSeeder::class,
            SeccionSeeder::class,
            BancoSeeder::class,
            CodigoCelSeeder::class,
            CodigoHabSeeder::class,
          //  TipoTrabajadorSeeder::class,

            ]);
    }
}
