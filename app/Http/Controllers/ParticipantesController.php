<?php

namespace App\Http\Controllers;

use DataTables;

use App\Persona;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ParticipantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //

        $participantes = DB::select("SELECT numero_identificacion, nacionalidad.cod as nacionalidad, 
        sexo.descripcion as sexo, nombre,nombreseg, apellido, apellidoseg,
        email,organismo.organismo ,tipo_funcionario.tipo_funcionario ,persona.cargo, entidad.descripcion as entidad
        FROM actuacion_participantes
        INNER JOIN persona ON persona.id = actuacion_participantes.id_persona
        INNER JOIN sexo ON sexo.id = persona.id_genero
        INNER JOIN nacionalidad ON nacionalidad.id = persona.id_nacionalidad
        INNER JOIN organismo ON organismo.id = persona.id_organismo
        INNER JOIN tipo_funcionario ON tipo_funcionario.id = persona.id_tipo_funcionario
        INNER JOIN entidad ON entidad.id = persona.id_entidad
        INNER JOIN actuacion ON actuacion_participantes.id_actuacion = actuacion.id
        where actuacion_parTicipantes.id_actuacion= $id
        order by persona.apellido");        
        return view('participantes/index', compact('participantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
