<?php

namespace App\Http\Controllers;

use DataTables;
use App\Persona;
use App\Facilitadores;
use App\Genero;
use App\Nacionalidad;
use App\Tipo_Identificacion;
use App\Organismo;
use App\Tipo_funcionario;
use App\Pais;
use App\Entidad;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FacilitadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $facilitadores = DB::select("SELECT actuacion_ponente.id_actuacion,actuacion_ponente.id as id_actuacion_ponentes,numero_identificacion,
        nacionalidad.cod as nacionalidad, 
        sexo.descripcion as sexo, nombre,nombreseg, apellido, apellidoseg,
        email,organismo.organismo ,persona.cargo, entidad.descripcion as entidad,persona.email
        FROM actuacion_ponente
        INNER JOIN persona ON persona.id = actuacion_ponente.id_persona
        INNER JOIN sexo ON sexo.id = persona.id_genero
        INNER JOIN nacionalidad ON nacionalidad.id = persona.id_nacionalidad
        INNER JOIN organismo ON organismo.id = actuacion_ponente.id_organismo
      
        INNER JOIN entidad ON entidad.id = actuacion_ponente.id_entidad
        INNER JOIN actuacion ON actuacion_ponente.id_actuacion = actuacion.id
        where actuacion_ponente.id_actuacion= $id
        order by persona.numero_identificacion");    
        return view('facilitadores/index', compact('facilitadores','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
    $sexo= Genero::where('status', 1)->get();
    $nacionalidad = Nacionalidad::where ('status',1)->get();
    $organismo = Organismo::where('status', 1)->get();
    $tipo_funcionario = Tipo_Funcionario::where('status', 1)->get();
    $pais = pais::where('status', 1)->get();
    $entidad = Entidad::where('status', 1)->get();
    $tipo_identificacion= Tipo_Identificacion::where('status', 1)->get();   
    

   // print $persona->id_genero;       

   //var_dump($sexo);
   return view('facilitadores/crear', compact('id','nacionalidad','tipo_identificacion','sexo', 'organismo', 'pais','entidad'));
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
        'id_actuacion' => ['required'],
        'id_persona' => ['required'],
        'tipo_identificacion' => ['required'],
        'numero_identificacion' => ['required'],
        'nacionalidad' => ['required'],
        'nombres' => ['required'],
        'apellidos' => ['required'],
        'genero' => ['required'],
        'organismo' => ['required'],
        'funcionario' => ['required'],
        'cargo' => ['required'],
        'entidad' => ['required'],
        'pais' => ['required'], 
        'correo' => ['required', 'string', 'max:255'],
        'hab' => ['required'], 
        'cel' => ['required'],
       
    ]);

    $facilitadores = new Facilitadores();
    $facilitadores->id_actuacion = $request->id_actuacion;    
    $facilitadores->id_persona = $request->id_persona;   
    $facilitadores->id_organismo = $request->organismo;   
    $facilitadores->cargo = $request->cargo;   
    $facilitadores->id_tipo_funcionario = $request->tipo_funcionario;    
    $facilitadores->id_entidad = $request->entidad;
    $facilitadores->id_pais = $request->pais;
    $facilitadores->save();

   /* $persona = new Persona();
    $participantes->id_viaticos = $request->viaticos;
    $participantes->fecha_inicio = $request->fecha_inicio;
    $participantes->fecha_fin = $request->fecha_fin;
    $participantes->duracion = $request->duracion;
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
   */
 
    return redirect('/listado')->with('success', 'Facilitador(es) registrado(s) con éxito!!.');
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
    $facilitadores = Facilitadores::where('id',$id)->first();
    $persona = Persona::where('id',$participantes->id_persona)->first();
    $sexo= Genero::where('status', 1)->get();
    $nacionalidad = Nacionalidad::where ('status',1)->get();
    $organismo = Organismo::where('status', 1)->get();
   // $tipo_funcionario = Tipo_Funcionario::where('status', 1)->get();
    $pais = pais::where('status', 1)->get();
    $entidad = Entidad::where('status', 1)->get();
    $tipo_identificacion= Tipo_Identificacion::where('status', 1)->get();   
    

   // print $persona->id_genero;       

   //var_dump($sexo);
   return view('facilitadores/edit', compact('facilitadores','nacionalidad','tipo_identificacion','persona','sexo', 'organismo', 'pais','entidad'));
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
    return view('facilitadores/edit');
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
public function delete($id)
{
    //
    return view('facilitadores/edit');
}
}
