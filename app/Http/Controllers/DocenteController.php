<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividades = DB::select('SELECT actividad.id,actividad.codigo,actividad.anio,actividad.nombre,clasificacion.descripcion as clasificacion,tematica.descripcion as tematica,alcance.descripcion as alcance,tipo_actividad.descripcion as tipo_actividad,(SELECT COUNT(*) AS convenio FROM actuacion WHERE cod_actividad = actividad.codigo) FROM actividad 
        INNER JOIN tematica ON tematica.id = actividad.id_tematica
        INNER JOIN clasificacion ON clasificacion.id = actividad.id_clasificacion
        INNER JOIN alcance ON alcance.id = actividad.id_alcance
        INNER JOIN tipo_actividad ON tipo_actividad.id = actividad.id_tipo_actividad
        ');

        return view('control/docente/list', compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control/docente/add');
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
