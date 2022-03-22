<?php

namespace App\Http\Controllers;
use DataTables;
use App\Actividad;
use App\Actuacion;
use App\Ind_financiero;
use App\Tip_ind_financiero;
use App\Refrigerios;
use App\Viaticos;
use App\Entidad;
use App\Status_actividad;
use App\Persona;
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
       

      $actuaciones = DB::select ("SELECT 
      actuacion.id_actividad,actuacion.anio,actuacion.cod_actuacion,actuacion.cod_actividad,actuacion.id,
       actuacion.fecha_inicio,actuacion.fecha_fin,entidad.descripcion as entidad,
       actuacion.horas,actuacion.id_planificador,persona.nombre as nomb_planificador,
       actividad.nombre,persona.apellido as ape_planificador,
       status_actividad.descripcion as estatus,
      (SELECT COUNT(actuacion_participantes.id) AS conteo FROM actuacion_participantes WHERE actuacion_participantes.id_actuacion = actuacion.id AND actuacion_participantes.status = 1 GROUP BY actuacion_participantes.id_actuacion) as cant_participantes,
      (SELECT COUNT(id) AS conteo FROM asistencia WHERE asistencia.id_actuacion = actuacion.id AND asistencia.certificado_asistencia = 1 AND asistencia.status = 1 GROUP BY asistencia.id_actuacion) as cant_asistencias,
    (SELECT COUNT(id) AS conteo FROM actuacion_ponente WHERE actuacion_ponente.id_actuacion = actuacion.id AND actuacion_ponente.status = 1 GROUP BY actuacion_ponente.id_actuacion) as cant_facilitadores
      
  FROM 
      actuacion, actividad, entidad, status_actividad, persona 
  WHERE 	
      actuacion.cod_actividad = actividad.codigo AND 
      actuacion.id_entidad = entidad.id AND 
      actuacion.id_planificador = persona.id AND 
      actuacion.id_status_actividad = status_actividad.id AND 
      actuacion.status = 1 
  Order by  actuacion.id 
     ");

        return view('actuacion/index', compact('actuaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request,$id)
    {

       $actividad = Actividad::where('id', $id)->get();
       $tot_actuacion = Actuacion::whereId_actividad($id)->count();
       $fecha = 22;
   
       $num= $tot_actuacion+1; // aqui debo traerme por post el codigo de la actuacion
       $codigo=str_pad($num, 3, '0', STR_PAD_LEFT);//codigo de la actuacion nuevo
       $cod_actuacion=str_pad($id, 3, '0', STR_PAD_LEFT).'-'.$fecha.'-'. str_pad($num, 3, '0', STR_PAD_LEFT);
      
        $ind_financiero = Ind_financiero::where('status', 1)->get();
        $tip_ind_financiero = Tip_ind_financiero::where('status', 1)->get();
        $refrigerio= Refrigerios::where ('status',1)->get();
        $viatico= Viaticos::where ('status',1)->get();
        $entidad= Entidad::where ('status',1)->get();
        $estatus= Status_actividad::where ('status',1)->get();
        $planificador = Persona::where ('status',1)->get(); 
       return view('actuacion/crear', compact('actividad','codigo','cod_actuacion','fecha','ind_financiero','tip_ind_financiero','refrigerio','viatico','entidad','estatus','planificador'));
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
        $request->validate([
            'ind_financiero' => ['required'],
            'tipo_ind_financiero' => ['required'],
            'refrigerios' => ['required'],
            'viaticos' => ['required'],
            'fecha_inicio' => ['required'],
            'fecha_fin' => ['required'],
            'duracion' => ['required'],
            'horas' => ['required'],
            'entidad' => ['required'],
            'status_actividad' => ['required'], 
            'lugar' => ['required', 'string', 'max:255'],
            'id_planificador' => ['required'], 
        ]);

        $actuacion = new Actuacion();
        $actuacion->id_actividad = $request->id_actividad;    
        $actuacion->cod_actividad = $request->cod_actividad;   
        $actuacion->cod_actuacion = $request->cod_actuacion;   
        $actuacion->anio = $request->anio;   
        $actuacion->id_ind_financiero = $request->ind_financiero;    
        $actuacion->id_tipo_ind_financiero = $request->tipo_ind_financiero;
        $actuacion->id_refrigerios = $request->refrigerios;
        $actuacion->id_viaticos = $request->viaticos;
        $actuacion->fecha_inicio = $request->fecha_inicio;
        $actuacion->fecha_fin = $request->fecha_fin;
        $actuacion->duracion = $request->duracion;
        $actuacion->horas = $request->horas;
        $actuacion->id_entidad = $request->entidad;
        $actuacion->id_status_actividad = $request->status_actividad;
        $actuacion->lugar = $request->lugar;
        $actuacion->observaciones = $request->observacion;
        $actuacion->mes_reporte = $request->fecha_reporte;
        $actuacion->aprobatorio = $request->aprobatorio;
        $actuacion->id_planificador = $request->id_planificador;
        $actuacion->fecha_asignacion = $request->fecha_limite;
        $actuacion->hoja_ruta = $request->hoja_ruta;
        $actuacion->num_participantes = $request->num_participantes;
        $actuacion->status = 1;
        $actuacion->save();
     
       // return $request;
        return redirect('/actuacion')->with('success', 'Actuación Guardada con éxito!!.');
      
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
       
        $codigo=$id;
       
        $actuacion = Actuacion::where('id',$codigo)->first();
        $actividad= Actividad::where ('id',$actuacion->id_actividad)->first();
        $ind_financiero = Ind_financiero::where('status', 1)->get();
        $tip_ind_financiero = Tip_ind_financiero::where('status', 1)->get();
        $refrigerio= Refrigerios::where ('status',1)->get();
        $viatico= Viaticos::where ('status',1)->get();
        $entidad= Entidad::where ('status',1)->get();
        $estatus= Status_actividad::where ('status',1)->get();
        $planificador = Persona::where ('status',1)->get(); 
        

        return view('actuacion/edit', compact('codigo','actuacion','actividad','ind_financiero','tip_ind_financiero','refrigerio','viatico','entidad','estatus','planificador'));
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
       
        $request->validate([
            'ind_financiero' => ['required'],
            'tipo_ind_financiero' => ['required'],
            'refrigerios' => ['required'],
            'viaticos' => ['required'],
            'fecha_inicio' => ['required'],
            'fecha_fin' => ['required'],
            'duracion' => ['required'],
            'horas' => ['required'],
            'entidad' => ['required'],
            'status_actividad' => ['required'], 
            'lugar' => ['required', 'string', 'max:255'],
            'id_planificador' => ['required'], 
        ]);

        Actuacion::where('id', $id)
        ->update([
            'id_ind_financiero' => $request->ind_financiero,
            'id_tipo_ind_financiero' => $request->tipo_ind_financiero,
            'id_refrigerios' => $request->refrigerios,
            'id_viaticos' => $request->viaticos,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'duracion' => $request->duracion,
            'horas' => $request->horas,
            'id_entidad' => $request->entidad,
            'id_status_actividad' => $request->status_actividad,
            'lugar' => $request->lugar,
            'observaciones' =>$request->observacion,
            'mes_reporte' =>$request->fecha_reporte,
            'aprobatorio'=>$request->aprobatorio,
            'id_planificador' => $request->id_planificador,
            'fecha_asignacion'=>$request->fecha_limite,
            'hoja_ruta'=>$request->hoja_ruta,
            'num_participantes'=>$request->num_participantes,
        ]);
       
     
        return redirect('/listado')->with('success', 'Actuación actualizada con éxito!!.');
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

    public function get_actuaciones( $id)
    {
        
        $actividad = DB::table('actividad')
       ->select('actividad.id','actividad.codigo','actividad.anio','actividad.nombre','clasificacion.descripcion as clasificacion','tematica.descripcion as tematica','alcance.descripcion as alcance','tipo_actividad.descripcion as tipo_actividad','convenio')
       ->join("tematica", "tematica.id", "=", "actividad.id")
       ->join("clasificacion", "clasificacion.id", "=", "actividad.id_clasificacion")
       ->join("alcance", "alcance.id", "=", "actividad.id_alcance")
       ->join("tipo_actividad", "tipo_actividad.id", "=", "actividad.id_tipo_actividad")
       ->where('actividad.id',$id)
       ->orderby('actividad.codigo')
       ->get();
      
      $actuaciones = DB::select ("SELECT 
      actuacion.id_actividad,actuacion.anio,actuacion.cod_actuacion,actuacion.cod_actividad,actuacion.id,
       actuacion.fecha_inicio,actuacion.fecha_fin,entidad.descripcion as entidad,
       actuacion.horas,actuacion.id_planificador,persona.nombre as nomb_planificador,
       persona.apellido as ape_planificador,
       status_actividad.descripcion as estatus,
      (SELECT COUNT(actuacion_participantes.id) AS conteo FROM actuacion_participantes WHERE actuacion_participantes.id_actuacion = actuacion.id AND actuacion_participantes.status = 1 GROUP BY actuacion_participantes.id_actuacion) as cant_participantes,
      (SELECT COUNT(id) AS conteo FROM asistencia WHERE asistencia.id_actuacion = actuacion.id AND asistencia.certificado_asistencia = 1 AND asistencia.status = 1 GROUP BY asistencia.id_actuacion) as cant_asistencias,
    (SELECT COUNT(id) AS conteo FROM actuacion_ponente WHERE actuacion_ponente.id_actuacion = actuacion.id AND actuacion_ponente.status = 1 GROUP BY actuacion_ponente.id_actuacion) as cant_facilitadores
      
  FROM 
      actuacion, actividad, entidad, status_actividad, persona 
  WHERE 	
      actuacion.cod_actividad = actividad.codigo AND 
      actuacion.id_entidad = entidad.id AND 
      actuacion.id_planificador = persona.id AND 
      actuacion.id_status_actividad = status_actividad.id AND 
      actuacion.status = 1 and actuacion.id_actividad=$id
  Order by  actuacion.id 
    ");

        //return view('actuacion/listadoactuacion', compact('actuaciones','actividad','participantes','asistencia','facilitador'));
        return view('actuacion/listadoactuacion', compact('actuaciones','actividad'));
    }
    public function get_participante($id,$cedula,$documento)
    {
        //
        $participante = DB::table('actuacion_participantes')
       ->select('actividad.id','actividad.codigo','actividad.anio','actividad.nombre','clasificacion.descripcion as clasificacion','tematica.descripcion as tematica','alcance.descripcion as alcance','tipo_actividad.descripcion as tipo_actividad','convenio')
       ->join("persona", "persona.id", "=", "actuacion_participantes.id_persona")
       ->where('persona.numero_identificacion',$cedula)
       ->where('persona.id_tipo_identificacion',$documento)
       ->where('actuacion_participantes.id',$id)
       ->get();
       return view('participantes/', compact('participante'));
    }
}
