<?php

namespace App\Http\Controllers;

use App\Cod_Celular;
use App\Cod_Habitacion;
use App\Genero;
use App\DatosEstudiante;
use App\Estado_civil;
use App\Nacionalidad;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('estudiante/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nacionalidades= Nacionalidad::All();
        $generos= Genero::All();
        $estado_civils= Estado_civil::All();
        $cod_habs= Cod_Habitacion::All();
        $cod_cels= Cod_Celular::All();
       return view('estudiante/datos',compact('generos','nacionalidades','estado_civils','cod_habs','cod_cels'));
    }

    public function createdireccion()
    {
       // return view('estudiante/create');
       return view('estudiante/direccion');
    }

    public function createxperiencia()
    {
       // return view('estudiante/create');
       return view('estudiante/experiencia');
    }

    public function createxperienciadoc()
    {
       // return view('estudiante/create');
       return view('estudiante/experienciadocente');
    }

    public function createorganizacion()
    {
       // return view('estudiante/create');
       return view('estudiante/organizacion');
    }

    public function createprograma()
    {
       // return view('estudiante/create');
       return view('estudiante/programa');
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
            'primernombre' => ['required', 'string', 'max:160'],
            'segundonombre' => ['required', 'string', 'max:160'],
            'primerapellido' => ['required', 'string', 'max:160'],
            'segundoapellido' => ['required', 'string', 'max:160'],
            'genero' => ['required'],
            'id_nacionalidad' => ['required'],
            'cedula' => ['required'],
            'estadocivil' => ['required'],
            'correo' => ['required'],
            'codtele' => ['required'],
            'telfhabitacion' => ['required'],
            'fechanac' => ['required'],
            'codtelecel' => ['required'],
            'telefonoCel' => ['required'],
    
           
        ]);

        

        $estudiantes = new DatosEstudiante();
        $estudiantes->nombre = $request->primernombre;
        $estudiantes->nombreseg = $request->segundonombre;
        $estudiantes->apellido = $request->primerapellido;
        $estudiantes->apellidoseg = $request->segundoapellido;
        $estudiantes->id_genero = $request->genero;
        $estudiantes->id_nacionalidad = $request->id_nacionalidad;
        $estudiantes->numero_identificacion = $request->cedula;
        $estudiantes->id_estado_civil = $request->estadocivil;
        $estudiantes->email = $request->estadocorreocivil;
        $estudiantes->telefono_hab = $request->codtele.$request->telfhabitacion;
        $estudiantes->telefono_cel = $request->codtele.$request->telfhabitacion;
        $estudiantes->edad = $request->fechanac;
        $estudiantes->save();

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
    public function edit($id)
    {
        $datos= DatosEstudiante::find($id);
        return view('estudiante.datos_edit',compact('datos'));
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

    public function datoslistestudiante($id)
    {
        $datosestudiantes = DatosEstudiante::find($id);
        return view('estudiante.listdatos',compact('datosestudiantes'));
    }

    public function direccionlistestudiante($id)
    {
        $direccionestudiantes = DatosEstudiante::find($id);
        return view('estudiante.listdireccion',compact('direccionestudiantes'));
    }

    public function experiencialistestudiante($id)
    {
        $experienciaestudiantes = DatosEstudiante::find($id);
        return view('estudiante.listexperiencia',compact('experienciaestudiantes'));
    }

    public function indexestatus()
    {
       // $estatusproceso = DatosEstudiante::find($id);
        return view('estudiante.estatus');
    }


}
