<?php

namespace App\Http\Controllers;

use DataTables;
use App\Alcance;
use App\Tematica;
use App\Actividad;
use App\TipoEstudio;
use App\Clasificacion;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       return view('actividad/actividad');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                
        $query= Actividad::count();
        $num= $query+1;
        $cod_actividad= str_pad($num, 3, '0', STR_PAD_LEFT);
        $fecha = 22;
        $clasificacion = Clasificacion::where('status', 1)->get();
        $tematica = Tematica::where('status', 1)->get();
        $alcance = Alcance::where('status', 1)->get();
        $tipo_estudio = TipoEstudio::where('status', 1)->get();
        return view('actividad/crear', compact('clasificacion','tematica','alcance','tipo_estudio','cod_actividad','fecha'));
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

    public function indexactividad()
    {
       $actividades = Actividad::all();
       return view('actividad/index', compact('actividades'));
    }
}
