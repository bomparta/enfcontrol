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


/*       ->select("SELECT 
					actividad.id as actividad_id, actuacion.id, 
					(actuacion.cod_actividad || '-' || actuacion.anio || '-' || actuacion.cod_actuacion) as codigo, 
					actividad.nombre as nombre, actividad.id_planificador1, actividad.id_planificador2, actividad.id_planificador3, 
					actividad.id_tipo_actividad,actividad.certificacion, actuacion.id_planificador, 
					((to_char(actuacion.fecha_inicio,'DD/MM/YYYY')) || ' a ' || (to_char(actuacion.fecha_fin,'DD/MM/YYYY'))) as periodo, 
					entidad.descripcion as entidad, actuacion.horas, (persona.nombre || ' ' || persona.apellido) as planificador, 
					actuacion.id_status_actividad, status_actividad.descripcion as status_actividad, persona.id as persona_id, usuario.id as usuario_id,
					(SELECT COUNT(actuacion_participantes.id) AS conteo FROM actuacion_participantes WHERE actuacion_participantes.id_actuacion = actuacion.id AND actuacion_participantes.status = 1 GROUP BY actuacion_participantes.id_actuacion) as cant_participantes,
					(SELECT COUNT(id) AS conteo FROM asistencia WHERE asistencia.id_actuacion = actuacion.id AND asistencia.certificado_asistencia = 1 AND asistencia.status = 1 GROUP BY asistencia.id_actuacion) as cant_asistencias,
					(SELECT COUNT(id) AS conteo FROM actuacion_ponentes WHERE actuacion_ponentes.id_actuacion = actuacion.id AND actuacion_ponentes.status = 1 GROUP BY actuacion_ponentes.id_actuacion) as cant_facilitadores,
					(SELECT persona.nombre || ' ' || persona.apellido from persona,usuario, actuacion_usuario where 
						actuacion_usuario.id_usuario = usuario.id and
						usuario.id_persona = persona.id and
						actuacion_usuario.id_actuacion = actuacion.id limit 1) as operador")
				FROM 
                actuacion, actividad, entidad, status_actividad, persona, usuario
				WHERE 	
					actuacion.cod_actividad = actividad.codigo AND 
					actuacion.id_entidad = entidad.id AND 
					actuacion.id_planificador = persona.id AND 
					actuacion.id_status_actividad = status_actividad.id AND 
					actuacion.status = 1 AND 
					persona.id = usuario.id_persona";)
       ->join("actividad", "tematica.id", "=", "actividad.id")
       ->join("entidad", "clasificacion.id", "=", "actividad.id_clasificacion")
       ->join("status_actividad", "alcance.id", "=", "actividad.id_alcance")
       ->join("persona", "tipo_actividad.id", "=", "actividad.id_tipo_actividad")
       ->join("users", "tipo_actividad.id", "=", "actividad.id_tipo_actividad")
       ->get();
*/
        


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
}
