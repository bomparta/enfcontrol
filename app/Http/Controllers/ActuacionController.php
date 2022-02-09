<?php

namespace App\Http\Controllers;
use DataTables;
use App\Alcance;
use App\Tematica;
use App\Actividad;
use App\TipoEstudio;
use App\Clasificacion;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class ActuacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actuaciones = DB::table('actividad')
       ->select('actividad.codigo','actividad.anio','actividad.nombre','clasificacion.descripcion as clasificacion','tematica.descripcion as tematica','alcance.descripcion as alcance','tipo_actividad.descripcion as tipo_actividad','convenio')
       ->join("tematica", "tematica.id", "=", "actividad.id")
       ->join("clasificacion", "clasificacion.id", "=", "actividad.id_clasificacion")
       ->join("alcance", "alcance.id", "=", "actividad.id_alcance")
       ->join("tipo_actividad", "tipo_actividad.id", "=", "actividad.id_tipo_actividad")
       ->orderby('actividad.codigo')
       ->get();

     

        return view('actuacion/index', compact('actuaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                
        $query= Actividad::count();
       $num= $query+1; // aqui debo traerme por post el codigo de la actividad
        $cod_actividad= str_pad($num, 3, '0', STR_PAD_LEFT);
        $fecha = 22;
        $clasificacions = Clasificacion::where('status', 1)->get();
        $tematicas = Tematica::where('status', 1)->get();
        $alcances = Alcance::where('status', 1)->get();
        $tipo_estudios = TipoEstudio::where('status', 1)->get();
        return view('actuacion/crear', compact('clasificacions','tematicas','alcances','tipo_estudios','cod_actividad','fecha'));
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
    public function edit(Request $request,$id)
    {
        $codigo = $id;

        return view('actuacion/edit', compact('codigo'));
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

    public function get_actuaciones($cod)
    {
        
        $actuaciones = DB::table('actividad')
       ->select('actividad.codigo','actividad.anio','actividad.nombre','clasificacion.descripcion as clasificacion','tematica.descripcion as tematica','alcance.descripcion as alcance','tipo_actividad.descripcion as tipo_actividad','convenio')
       ->join("tematica", "tematica.id", "=", "actividad.id")
       ->join("clasificacion", "clasificacion.id", "=", "actividad.id_clasificacion")
       ->join("alcance", "alcance.id", "=", "actividad.id_alcance")
       ->join("tipo_actividad", "tipo_actividad.id", "=", "actividad.id_tipo_actividad")
       ->where('actividad.codigo',$cod)
       ->orderby('actividad.codigo')
       ->get();

           return view('actuacion/listadoactuacion', compact('actuaciones'));
    }
}
