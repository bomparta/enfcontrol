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
        $clasificacions = Clasificacion::where('status', 1)->get();
        $tematicas = Tematica::where('status', 1)->get();
        $alcances = Alcance::where('status', 1)->get();
        $tipo_estudios = TipoEstudio::where('status', 1)->get();
        return view('actividad/crear', compact('clasificacions','tematicas','alcances','tipo_estudios','cod_actividad','fecha'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:160'],
            'clasificacion' => ['required'],
            'tematica' => ['required'],
            'alcance' => ['required'],
            'tipo_estudio' => ['required'],
    
           
        ]);

        

        $actividad = new Actividad();
        $actividad->codigo = $request->codigo_original;
        $actividad->anio = $request->fecha;
        $actividad->nombre = $request->nombre;
        $actividad->id_clasificacion = $request->clasificacion;
        $actividad->id_tematica = $request->tematica;
        $actividad->id_alcance = $request->alcance;
        $actividad->id_tipo_actividad = $request->tipo_estudio;
        $actividad->convenio = 1;
        $actividad->institucion = 1;
        $actividad->certificacion = True;
        $actividad->id_planificador1 = 1;
        $actividad->id_planificador2 = 1;
        $actividad->id_planificador3 = 1;
        $actividad->status = 1;
        $actividad->id_programa = 1;
        $actividad->pasantias = 1;
        $actividad->investigacion = 1;
        $actividad->save();

        return redirect('/parametros/actividad')->with('success', 'Actividad creada con éxito.');
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

        $actividad = Actividad::where('codigo',$id)->first();
        $clasificacions = Clasificacion::where('status', 1)->get();
        $tematicas = Tematica::where('status', 1)->get();
        $alcances = Alcance::where('status', 1)->get();
        $tipo_estudios = TipoEstudio::where('status', 1)->get();
        return view('actividad/edit', compact('actividad','clasificacions','tematicas','alcances','tipo_estudios'));
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
        $request->validate([
            'nombre' => ['required', 'string', 'max:160'],
            'clasificacion' => ['required'],
            'tematica' => ['required'],
            'alcance' => ['required'],
            'tipo_estudio' => ['required'],
    
           
        ]);

        Actividad::where('codigo', $id)
        ->update([
            'nombre' => $request->nombre,
            'id_clasificacion' => $request->clasificacion,
            'id_tematica' => $request->tematica,
            'id_alcance' => $request->alcance,
            'id_tipo_actividad' => $request->tipo_estudio,
        ]);
       

        return redirect('/listado')->with('success', 'Actividad actualizada con éxito.');
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

        $actividades = DB::select('SELECT actividad.id,actividad.codigo,actividad.anio,actividad.nombre,clasificacion.descripcion as clasificacion,tematica.descripcion as tematica,alcance.descripcion as alcance,tipo_actividad.descripcion as tipo_actividad,(SELECT COUNT(*) AS convenio FROM actuacion WHERE cod_actividad = actividad.codigo) FROM actividad 
        INNER JOIN tematica ON tematica.id = actividad.id_tematica
        INNER JOIN clasificacion ON clasificacion.id = actividad.id_clasificacion
        INNER JOIN alcance ON alcance.id = actividad.id_alcance
        INNER JOIN tipo_actividad ON tipo_actividad.id = actividad.id_tipo_actividad order by actividad.id
        ');
            
        return view('actividad/index', compact('actividades'));
    }
    


}
