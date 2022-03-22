<?php

namespace App\Http\Controllers;

use DataTables;
use App\Persona;
use App\Participantes;
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

class ParticipantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $participantes = DB::select("SELECT actuacion_participantes.id_actuacion,actuacion_participantes.id as id_actuacion_participante,numero_identificacion,
        nacionalidad.cod as nacionalidad, 
        sexo.descripcion as sexo, nombre,nombreseg, apellido, apellidoseg,
        email,organismo.organismo ,tipo_funcionario.tipo_funcionario ,persona.cargo, entidad.descripcion as entidad,persona.email
        FROM actuacion_participantes
        INNER JOIN persona ON persona.id = actuacion_participantes.id_persona
        INNER JOIN sexo ON sexo.id = persona.id_genero
        INNER JOIN nacionalidad ON nacionalidad.id = persona.id_nacionalidad
        INNER JOIN organismo ON organismo.id = actuacion_participantes.id_organismo
        INNER JOIN tipo_funcionario ON tipo_funcionario.id = actuacion_participantes.id_tipo_funcionario
        INNER JOIN entidad ON entidad.id = actuacion_participantes.id_entidad
        INNER JOIN actuacion ON actuacion_participantes.id_actuacion = actuacion.id
        where actuacion_participantes.id_actuacion= $id
        order by persona.numero_identificacion");     
     
     return view('participantes/index', compact('participantes','id'));
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
       return view('participantes/crear', compact('id','nacionalidad','tipo_identificacion','sexo', 'organismo','tipo_funcionario', 'pais','entidad'));
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

        $participantes = new Participantes();
        $participantes->id_actuacion = $request->id_actuacion;    
        $participantes->id_persona = $request->id_persona;   
        $participantes->id_organismo = $request->organismo;   
        $participantes->cargo = $request->cargo;   
        $participantes->id_tipo_funcionario = $request->tipo_funcionario;    
        $participantes->id_entidad = $request->entidad;
        $participantes->id_pais = $request->pais;
        $participantes->save();

        $persona = new Persona();
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
       
     
        return redirect('/listado')->with('success', 'Actuación actualizada con éxito!!.');
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
        $participantes = Participantes::where('id',$id)->first();
        $persona = Persona::where('id',$participantes->id_persona)->first();
        $sexo= Genero::where('status', 1)->get();
        $nacionalidad = Nacionalidad::where ('status',1)->get();
        $organismo = Organismo::where('status', 1)->get();
        $tipo_funcionario = Tipo_Funcionario::where('status', 1)->get();
        $pais = pais::where('status', 1)->get();
        $entidad = Entidad::where('status', 1)->get();
        $tipo_identificacion= Tipo_Identificacion::where('status', 1)->get();   
        

       // print $persona->id_genero;       

       //var_dump($sexo);
       return view('participantes/edit', compact('participantes','nacionalidad','tipo_identificacion','persona','sexo', 'organismo','tipo_funcionario', 'pais','entidad'));
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
        return view('participantes/edit');
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
        return view('participantes/edit');
    }
}
