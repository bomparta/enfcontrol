<?php

namespace App\Http\Controllers;


use App\Genero;
use App\Entidad;
use App\Direccion;
use App\Municipio;
use App\Parroquia;
use App\Cod_Celular;
use App\Estado_civil;
use App\ImagenUpload;
use App\Nacionalidad;
use App\Cod_Habitacion;
use App\Persona;
use App\DatosEstudiantes;
use App\Funcionario;
use App\Tipo_trabajador;
use App\Parentezco;
use App\Familiares;
use App\Cuentas_bancarias;
use App\Laboral;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        return view('rrhh/funcionario/homefuncionario');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)// editar datos personales
    {
        $nacionalidades= Nacionalidad::All();
        $generos= Genero::All();
        $estado_civils= Estado_civil::All();
        $cod_habs= Cod_Habitacion::All();
        $cod_cels= Cod_Celular::All();
        $entidad = Entidad::All();
        $tipo_trabajador= Tipo_Trabajador::All();
         $cedula_usuario=Auth::user()->cedula;// buscar la manera que este valor de usuario este referenciado en la tabla funcionario y Usuario
      
  
     
        $datos_funcionario  =   Funcionario::select ('*', 'funcionario.id as id_funcionario','funcionario.id_tipo_funcionario as id_tipo_trabajador',
        'funcionario.cargo as cargo_func')->join ('persona', 'persona.id','=','funcionario.persona_id')
        ->where('persona.numero_identificacion','=',$cedula_usuario)->get();
     
     //var_dump($datos_funcionario);
     //var_dump($generos);
     if(count($datos_funcionario)>0){
        return view('rrhh/funcionario/datosedit',compact('datos_funcionario','nacionalidades','generos','estado_civils','cod_habs','cod_cels','entidad','tipo_trabajador'));    
     }else{
        $datos_funcionario  =   Persona::select ('*','persona.id as persona_id')->where('persona.numero_identificacion','=',$cedula_usuario)->get();
        return view('rrhh/funcionario/datosedit',compact('datos_funcionario','nacionalidades','generos','estado_civils','cod_habs','cod_cels','entidad','tipo_trabajador'));    
     }
    }
    public function updatedatospersonales(Request $request)
    {
        //
        $request->validate([
            'id_persona' => ['required'],
            'id_tipo_trabajador' => ['required'],
            'id_oficina_administrativa' => ['required'],
            'cargo' => ['required', 'string', 'max:160'],
            'estado_nac' => ['required'],
            
        ]);
       // dd($request);
        if(!isset($request->id_funcionario)){
            $datos_funcionario = new Funcionario();
            $datos_funcionario->persona_id = $request->id_persona ;
            $datos_funcionario->id_tipo_funcionario = $request->id_tipo_trabajador;
            $datos_funcionario->id_oficina_administrativa = $request->id_oficina_administrativa;
            $datos_funcionario->cargo = $request->cargo;          
            $datos_funcionario->save();

        }else{
       

        Funcionario::where('id', $request->id_funcionario)
        ->update([
            'persona_id'=> $request->id_persona,
            'id_tipo_funcionario'=> $request->id_tipo_trabajador,
            'id_oficina_administrativa' => $request->id_oficina_administrativa,
            'cargo' =>$request->cargo,
                 
        ]);
    }

        Persona::where('id', $request->id_persona)
        ->update([          
            'id_tipo_identificacion' =>'1',
            'id_nacionalidad' =>$request->nacionalidad,
            'numero_identificacion'=>$request->cedula,
            'nombre'=>$request->primernombre,
            'nombreseg'=>$request->segundonombre,
            'apellido'=>$request->primerapellido,
            'apellidoseg'=>$request->segundoapellido,
            'edad'=>$request->fechanac,
            'ciudad_nac'=>$request->ciudad_nac,
            'estado_nac'=>$request->estado_nac,
            'id_genero'=>$request->genero,
            'email'=>$request->correo,
            'id_estado_civil'=>$request->estadocivil,
            'telefono_hab'=>'',
            'telefono_cel'=>'',
            'id_organismo'=>0,
            'id_tipo_funcionario'=>0,
            'cargo'=>'',
            'id_adscripcion'=>0,
            'id_dependencia'=>0,
            'id_pais'=>1,
            'id_entidad'=>0,   
        ]);
     
        return redirect('rrhh/funcionario/datosedit')->with('message', ' Datos Personales actualizados con éxito!!.');
    }

    public function create()
    {
        $nacionalidades= Nacionalidad::All();
        $generos= Genero::All();
        $estado_civils= Estado_civil::All();
        $cod_habs= Cod_Habitacion::All();
        $cod_cels= Cod_Celular::All();
        $entidad = Entidad::All();
        $parentezco=Parentezco::All();
        $tipo_trabajador= Tipo_Trabajador::All();
        $cedula_usuario=Auth::user()->cedula;// buscar la manera que este valor de usuario este referenciado en la tabla funcionario y Usuario
      
        $datos_persona  =   Persona::select ('*')->where('numero_identificacion','=',$cedula_usuario)->paginate(1);
        //var_dump($cedula_usuario);
        if(count($datos_persona)==0){
            return view('rrhh/funcionario/datos',compact('cedula_usuario','parentezco','generos','nacionalidades','estado_civils','cod_habs','cod_cels','entidad','tipo_trabajador'));               
        }
     
    }
    public function createfamiliar()
    {
        $nacionalidades= Nacionalidad::All();
        $generos= Genero::All();
        $estado_civils= Estado_civil::All();
        $cod_habs= Cod_Habitacion::All();
        $cod_cels= Cod_Celular::All();
        $parentezco=Parentezco::All();       
        $cedula_usuario=Auth::user()->cedula;// buscar la manera que este valor de usuario este referenciado en la tabla funcionario y Usuario
       $funcionario= Funcionario::select('funcionario.id as funcionario_id') 
       ->join ('persona', 'persona.id','=','funcionario.persona_id')
       ->where('persona.numero_identificacion','=',$cedula_usuario)->get();
       $funcionario_id=null;
       foreach($funcionario as $funcionario){
        $funcionario_id=$funcionario->funcionario_id;
       }
      
        $familiar  =   Familiares::select ('*','familiares.id as id_familiar','familiares.persona_id as id_persona', 'nacionalidad.cod as nacionalidad',
        'parentezco.descripcion as parentezco')
        ->join ('funcionario', 'familiares.funcionario_id','=','funcionario.id')
        ->join ('persona', 'persona.id','=','familiares.persona_id')
        ->join ('nacionalidad', 'nacionalidad.id','=','persona.id_nacionalidad')
        ->join ('parentezco', 'parentezco.id','=','familiares.parentezco_id')
        ->join ('genero', 'persona.id_genero','=','genero.id')
        ->where('familiares.funcionario_id','=',$funcionario_id)->paginate(10);
        
  // var_dump($familiar);
    return view('rrhh/funcionario/familiar',compact('funcionario_id','familiar','generos','parentezco','nacionalidades','estado_civils','cod_habs','cod_cels'));    
}
   
    public function editfamiliar(Request $request,$id)// editar datos familiares
    {
        $nacionalidades= Nacionalidad::All();
        $generos= Genero::All();
        $estado_civils= Estado_civil::All();
        $cod_habs= Cod_Habitacion::All();
        $cod_cels= Cod_Celular::All();
        $parentezco=Parentezco::All();       
   
        $familiar_id=$id;
       
      
    
         $familiar  =   Familiares::select ('*','familiares.id as id_familiar','familiares.persona_id as id_persona','familiares.ocupacion')
        ->join ('funcionario', 'familiares.funcionario_id','=','funcionario.id')
        ->join ('persona', 'persona.id','=','familiares.persona_id')
        ->join ('genero', 'persona.id_genero','=','genero.id')     
        ->where('familiares.id','=',$familiar_id)->get();   
      //dd($familiar);
        return view('rrhh.funcionario.familiar_edit',compact('familiar','generos','parentezco','nacionalidades','estado_civils','cod_habs','cod_cels'));         
     
    }
   
    public function updatefamiliar(Request $request)
    {
        //
       
        $request->validate([
            'id_persona' => ['required'],
            'id_funcionario' => ['required'],
            'id_familiar' => ['required'],
            'parentezco' => ['required', 'string', 'max:160'],
            'fechanac' => ['required'],
            
        ]);
      //  dd($request);
        Familiares::where('id', $request->id_familiar)
        ->update([
            'persona_id'=> $request->id_persona,
            'funcionario_id'=> $request->id_funcionario,
            'parentezco_id'=> $request->parentezco,
            'ocupacion' =>$request->ocupacion,
            'telefono' =>$request->telefono,
            'vive_id' =>$request->vive,                 
        ]);
   

        Persona::where('id', $request->id_persona)
        ->update([          
            
            'nombre'=>$request->primernombre,
            'nombreseg'=>$request->segundonombre,
            'apellido'=>$request->primerapellido,
            'apellidoseg'=>$request->segundoapellido,
            'edad'=>$request->fechanac,            
            'id_genero'=>$request->genero,
            'email'=>$request->correo,
           
        ]);
     
        return redirect('rrhh/funcionario/familiar')->with('message', ' Datos Familiar actualizados con éxito!!.');
    }
   
    public function createdireccion()
    {
        $estados= Entidad::All();
        $municipios= Municipio::All(); 
        $cod_habs= Cod_Habitacion::All();
        $cod_cels= Cod_Celular::All();
        $todos_cod = Arr::collapse([$cod_habs, $cod_cels]);
        $cedula_usuario=Auth::user()->cedula;// buscar la manera que este valor de usuario este referenciado en la tabla funcionario y Usuario
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')
        ->where('persona.numero_identificacion','=',$cedula_usuario)->paginate(1);

        //var_dump($funcionario);
       // if (COUNT($funcionario)>0  ) {
          
            return view('rrhh/funcionario/direccion',compact('funcionario','estados','municipios','cod_habs','cod_cels','todos_cod'));
      //  }
    }
    public function createhist_medico()
    {
        $cedula_usuario=Auth::user()->cedula;
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')
        ->where('persona.numero_identificacion','=',$cedula_usuario)->paginate(1);



       return view('rrhh/funcionario/hist_medico',compact('funcionario'));
    }
    public function updatehist_medico (Request $request)
    {
        
        $request->validate([            
            'posee_enfermedad' => ['required'],
            'es_alergico' => ['required'],
            'grupo_sanguineo' => ['required'],
            'estatura' => ['required'],
            'peso' => ['required'],
            'pantalon' => ['required'],
            'camisa' => ['required'],
            'calzado' => ['required'],            
        ]);

      // dd($request);

       Funcionario::where('id', $request->id_funcionario)
       ->update([          
           
           'posee_enfermedad'=>$request->posee_enfermedad,
           'tipo_enfermedad'=>$request->tipo_enfermedad,
           'es_alergico'=>$request->es_alergico,
           'tipo_alergia'=>$request->tipo_alergia,
           'tratamiento'=>$request->tratamiento,     //agregar migrate       
           'grupo_sanguineo'=>$request->grupo_sanguineo,
           'estatura'=>$request->estatura,
           'peso'=>$request->peso,
           'camisa'=>$request->camisa,
           'pantalon'=>$request->pantalon,
           'calzado'=>$request->calzado,
       ]);

        return redirect('rrhh/funcionario/hist_medico')->with('message', ' Historial Médico actualizado con éxito!!.');
    }
    public function createbanco()
    {
       $cedula_usuario=Auth::user()->cedula;
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula_usuario)->get();
        $funcionario_id=null;
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
        }
        $cuentas=Cuentas_bancarias::select('*')->where('cuentas_bancarias.funcionario_id','=',$funcionario_id)->paginate(5);

       return view('rrhh/funcionario/cta_bancaria',compact('cuentas','funcionario_id'));
    }
    public function storebanco(Request $request)
    {
        
        $request->validate([
            
            'id_funcionario' => ['required'],
            'num_cuenta'=>['required', 'string', 'max:20'],
            'tipo_cuenta'=>['required'],
            'nom_banco'=>['required'],
        ]);
      
        $cuentas = new Cuentas_bancarias();        
        $cuentas->funcionario_id = $request->id_funcionario;
        $cuentas->cuenta = $request->num_cuenta;
        $cuentas->tipo_cuenta = $request->tipo_cuenta;          
        $cuentas->nombre_banco = $request->nom_banco;          
      
        $cuentas->save();

        return redirect('rrhh/funcionario/cta_bancaria')->with('message', ' La Cuenta Bancaria fue agregado con éxito!!.');
    }
    public function editbanco(Request $request,$id)// editar datos familiares
    {
        
        $cuenta_id=$id;
         $cuentas  =   Cuentas_bancarias::select ('*')       
        ->where('cuentas_bancarias.id','=',$cuenta_id)->get();   
     // dd($request);
        return view('rrhh/funcionario/cta_bancaria_edit',compact('cuentas'));         
     
    }
    public function updatebanco (Request $request)
    {
        
        $request->validate([            
            'id_cuenta' => ['required'],
            'num_cuenta'=>['required', 'string', 'max:20'],
            'tipo_cuenta'=>['required'],
            'nom_banco'=>['required'],           
        ]);

      // dd($request);

       Cuentas_bancarias::where('id', $request->id_cuenta)
       ->update([         
  
           'cuenta'=>$request->num_cuenta,
           'tipo_cuenta'=>$request->tipo_cuenta,
           'nombre_banco'=>$request->nom_banco,
          
       ]);

        return redirect('rrhh/funcionario/cta_bancaria')->with('message', ' Cuenta Bancaria actualizada con éxito!!.');
    }
    public function createxperiencia()
    {
        $cod_habs= Cod_Habitacion::All();
        $cod_cels= Cod_Celular::All();
        $todos_cod = Arr::collapse([$cod_habs, $cod_cels]);
        $cedula_usuario=Auth::user()->cedula;
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula_usuario)->get();
        $funcionario_id=null;
        $laboral=null;
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
        }
        $laboral=Laboral::select('*')->where('laboral.funcionario_id','=',$funcionario_id)->paginate(5);

       return view('rrhh/funcionario/experiencia',compact('laboral','funcionario_id','todos_cod'));
     

     // return view('rrhh/funcionario/experiencia');
    }
    public function storexperiencia(Request $request)
    {
        
        $request->validate([
            
            'id_funcionario' => ['required'],
            'empresa'=>['required', 'string', 'max:150'],
            'cargo'=>['required'],
            'fechaingreso'=>['required'],
            'fechaegreso'=>['required'],
        ]);
      
        $laboral = new Laboral();        
        $laboral->funcionario_id = $request->id_funcionario;
        $laboral->nombre_empresa = $request->empresa;
        $laboral->cargo = $request->cargo;          
        $laboral->fecha_ingreso = $request->fechaingreso;         
        $laboral->fecha_egreso = $request->fechaegreso;           
        $laboral->telefono_empresa = $request->cod_telefono.$request->telefono;           
      
        $laboral->save();

        return redirect('rrhh/funcionario/experiencia')->with('message', ' Su Experiencia Laboral fue agregada con éxito!!.');
    }
    public function editexperiencia(Request $request,$id)// editar datos familiares
    {
        $cod_habs= Cod_Habitacion::All();
        $cod_cels= Cod_Celular::All();
        $todos_cod = Arr::collapse([$cod_habs, $cod_cels]);
        $experiencia_id=$id;
         $laboral  =   Laboral::select ('*')       
        ->where('laboral.id','=',$experiencia_id)->get();   
     // dd($request);
        return view('rrhh/funcionario/experiencia_edit',compact('laboral','todos_cod'));         
     
    }
    public function updatexperiencia (Request $request)
    {
        
        $request->validate([            
            'id_experiencia' => ['required'],            
            'empresa'=>['required', 'string', 'max:150'],
            'cargo'=>['required'],
            'fechaingreso'=>['required'],
            'fechaegreso'=>['required'],        
        ]);

      // dd($request);
         $telefono=$request->cod_telefono.$request->telefono;
       Laboral::where('id', $request->id_experiencia)
       ->update([         
  
           'nombre_empresa'=>$request->empresa,
           'cargo'=>$request->cargo,
           'fecha_ingreso'=>$request->fechaingreso,
           'fecha_egreso'=>$request->fechaegreso,
           'telefono_empresa'=>$telefono,

       ]);

        return redirect('rrhh/funcionario/experiencia')->with('message', ' Su Experiencia Laboral fue actualizada con éxito!!.');
    }
    public function createducacion()
    {
       
       return view('rrhh/funcionario/educacion');
    }
    public function createstudios_act()
    {
       
       return view('rrhh/funcionario/estudios_act');
    }
    public function createcursos()
    {
       $cursos=NULL;
       return view('rrhh/funcionario/cursos',compact($cursos));
    }
    public function createidiomas()
    {
       
       return view('rrhh/funcionario/idiomas');
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
            
            'id_oficina_administrativa' => ['required'],
            'cargo' => ['required', 'string', 'max:160'],
            'estado_nac' => ['required'],
            
        ]);
        //dd($request);  
        $datos_persona = new Persona();      
   
        $datos_persona->id_tipo_identificacion = 1 ;
        $datos_persona->id_nacionalidad = $request->nacionalidad;
        $datos_persona->numero_identificacion = $request->cedula;
        $datos_persona->nombre = $request->primernombre;  
        $datos_persona->nombreseg = $request->segundonombre;
        $datos_persona->apellido = $request->primerapellido;
        $datos_persona->apellidoseg = $request->segundoapellido;
        $datos_persona->edad = $request->fechanac;
        $datos_persona->ciudad_nac = $request->ciudad_nac;
        $datos_persona->estado_nac = $request->estado_nac;
        $datos_persona->id_genero = $request->genero;        
        $datos_persona->email = $request->correo; 
        $datos_persona->id_estado_civil = $request->estadocivil; 
        $datos_persona->save();      
          //dd($request);  
         $id_persona= $datos_persona->id ;
       //   dd($datos_persona);  
        $datos_funcionario = new Funcionario();
        $datos_funcionario->persona_id = $id_persona;
        $datos_funcionario->id_tipo_funcionario = $request->id_tipo_trabajador;
        $datos_funcionario->id_oficina_administrativa = $request->id_oficina_administrativa;
        $datos_funcionario->cargo = $request->cargo;          
        $datos_funcionario->save();

        return redirect('rrhh/funcionario/datosedit')->with('message', ' Datos Personales actualizados con éxito!!.');
    }
    public function updatedireccion(Request $request)
    {
        
        $request->validate([
            
            '_estado' => ['required'],
            '_submunicipio' => ['required'],
            '_subparroquia' => ['required'],
            'urbanizacion' => ['required','string', 'max:160'],
            'calleAv' => ['required','string', 'max:160'],
            'nroCasaApto' => ['required','string', 'max:160'],
            'nombreCasaApto' => ['required','string', 'max:160'],
            'pto_referencia' => ['required','string', 'max:160'],
            'condicon_viv' => ['required'],
            'cod_postal' => ['required'],
            'codhab' => ['required'],
            'telfhabitacion' => ['required'],
            'codtelecel' => ['required'],
            'telefonoCel' => ['required'],
            'dir_contacto' => ['required','string', 'max:250'],
            'cod_contacto' => ['required'],
            'telf_contacto' => ['required'],
            'per_contacto' => ['required','string', 'max:160'],
        ]);
         
          //dd($request);  
          $telefono_hab=$request->codhab.$request->telfhabitacion;
          $telefono_cel=$request->codtelecel.$request->telefonoCel;
          $telefono_contacto=$request->cod_contacto.$request->telf_contacto;

       Funcionario::where('id', $request->id_funcionario)
       ->update([          
           
           'estado_domicilio'=>$request->_estado,
           'municipio_domicilio'=>$request->_submunicipio,
           'parroquia_domicilio'=>$request->_subparroquia,
           'codigo_postal'=>$request->cod_postal,
           'sector_urbanizacion'=>$request->urbanizacion,            
           'calle_avenida'=>$request->calleAv,
           'nro_casa_apartamento'=>$request->nroCasaApto,
           'nombre_casa_edificio_residencia'=>$request->nombreCasaApto,
           'piso_nro_casa'=>$request->pto_referencia,//corregir el migrate
           'condicion_casa_id'=>$request->condicon_viv,

           'telfhabitacion'=>$telefono_hab,
          'telcelular'=>$telefono_cel,
          'telefono_contacto'=>$telefono_contacto,
           'persona_contacto'=>$request->per_contacto,
          'direccion_contacto'=>$request->dir_contacto,           
          
       ]);

        return redirect('rrhh/funcionario/direccion')->with('message', ' Dirección de Domicilio actualizados con éxito!!.');
    }
 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storefamiliar(Request $request)
    {
        
        $request->validate([
            
            'id_funcionario' => ['required'],
           
            
        ]);
       //dd($request);  
        $datos_persona = new Persona();      
   
        $datos_persona->id_tipo_identificacion = 1 ;
        $datos_persona->id_nacionalidad = $request->nacionalidad;
        $datos_persona->numero_identificacion = $request->cedula;
        $datos_persona->nombre = $request->primernombre;  
        $datos_persona->nombreseg = $request->segundonombre;
        $datos_persona->apellido = $request->primerapellido;
        $datos_persona->apellidoseg = $request->segundoapellido;
        $datos_persona->edad = $request->fechanac;
        $datos_persona->ciudad_nac = $request->ciudad_nac;
        $datos_persona->estado_nac = $request->estado_nac;
        $datos_persona->id_genero = $request->genero;        
        $datos_persona->email = $request->correo; 
        $datos_persona->id_estado_civil = $request->estadocivil; 
        $datos_persona->save();      
          //dd($request);  
         $id_persona= $datos_persona->id ;
       //   dd($datos_persona);  
        $familiar = new Familiares();
        $familiar->persona_id = $id_persona;
        $familiar->funcionario_id = $request->id_funcionario;
        $familiar->parentezco_id = $request->parentezco;
        $familiar->ocupacion = $request->ocupacion;          
        $familiar->telefono = $request->telefono;          
        $familiar->vive_id = $request->vive;          
        $familiar->save();

        return redirect('rrhh/funcionario/familiar')->with('message', ' Familiar fue agregado con éxito!!.');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
 
    

    public function direccionlistestudiante($id)
    {
        
        $direccionestudiantes = Direccion::select('*')
       ->where('id_usuario', '=',$id)
       ->get();
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
    

   // public function datosadjunto($id)
    public function datosadjunto()
    {
     //   $adjuntosestudiantes = DatosEstudiante::find($id);
        //return view('rrhh.funcionario.datosadjuntados',compact('adjuntosestudiantes'));
        return view('rrhh.funcionario.requisitos');
    }

    public function adjuntodatos($id)
    {
       // $adjuntosestudiantes = ImagenUpload::find($id);
        $adjuntosestudiantes = ImagenUpload::select('*')
       ->where('usuario', '=',$id)
       ->where('nombre', 'foto')
       ->get();
       $adjuntoscedula = ImagenUpload::select('*')
       ->where('usuario', '=',$id)
       ->where('nombre', 'cedula')
       ->get();
       $adjuntoscurriculum = ImagenUpload::select('*')
       ->where('usuario', '=',$id)
       ->where('nombre', 'curriculum')
       ->get();
       $adjuntoscarta = ImagenUpload::select('*')
       ->where('usuario', '=',$id)
       ->where('nombre', 'carta_solicitud')
       ->get();
       $adjuntoscarnetcolegiatura = ImagenUpload::select('*')
       ->where('usuario', '=',$id)
       ->where('nombre', 'carnet_colegiatura')
       ->get();
       $adjuntosimpre = ImagenUpload::select('*')
       ->where('usuario', '=',$id)
       ->where('nombre', 'impre_colegiatura')
       ->get();
        return view('estudiante.datosadjuntos',compact('adjuntosestudiantes','adjuntoscedula','adjuntoscurriculum','adjuntoscarta','adjuntoscarnetcolegiatura','adjuntosimpre'));
    }

    public function crearfoto()
    {
        
        return view('estudiante.crearfoto');
    }

    public function crearcedula()
    {
        
        return view('estudiante.crearcedula');
    }

    public function crearcurriculum()
    {
        
        return view('estudiante.crearcurriculum');
    }

    public function crearcarta()
    {
        
        return view('estudiante.crearcarta');
    }

    public function crearcarnetcolegiatura()
    {
        
        return view('estudiante.crearcarnetcolegiatura');
    }

    public function crearimpre()
    {
        
        return view('estudiante.crearimpre');
    }

    public function subirArchivo(Request $request)
    {
            //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
           // $request->file('archivo')->store('public/foto_carnet');
            //dd("subido y guardado");

            if($request->hasfile('archivo')):
                $imagen         = $request->file('archivo');
                //$usuario        = Auth::user()->id;
                //$nombre         = 'foto';
                $nombreimagen   = $imagen.".".$imagen->guessExtension();
                $ruta           = $request->file('archivo')->store('public/foto_carnet');
                $imagen->move($ruta,$nombreimagen);  
                //dd("$ruta / $nombreimagen subido y guardado"); 
                            
                $datosimagen = new ImagenUpload();
                $datosimagen->usuario = Auth::user()->id;
                $datosimagen->nombre = 'foto';
                $datosimagen->ruta = $ruta;
                $datosimagen->save();
                
                return redirect('/adjunto_datos/'.Auth::user()->id)->with('success', 'Se adjunto con exito la foto.');

            endif;
            return redirect('/adjunto_datos/'.Auth::user()->id)->with('danger', 'No se adjunto foto.');
            //return view('estudiante.datosadjuntos');
               //dd("$imagen subido y guardado");
    }

    public function subircedula(Request $request)
    {
            //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
           // $request->file('archivo')->store('public/foto_carnet');
            //dd("subido y guardado");

            if($request->hasfile('archivo')):
                $imagen         = $request->file('archivo');
                //$usuario        = Auth::user()->id;
                //$nombre         = 'foto';
                $nombreimagen   = $imagen.".".$imagen->guessExtension();
                $ruta           = $request->file('archivo')->store('public/foto_cedula');
                $imagen->move($ruta,$nombreimagen);  
                //dd("$ruta / $nombreimagen subido y guardado"); 
                            
                $datosimagen = new ImagenUpload();
                $datosimagen->usuario = Auth::user()->id;
                $datosimagen->nombre = 'cedula';
                $datosimagen->ruta = $ruta;
                $datosimagen->save();
                
                return redirect('/adjunto_datos/'.Auth::user()->id)->with('success', 'Se adjunto con exito la cedula.');

            endif;
            return redirect('/adjunto_datos/'.Auth::user()->id)->with('danger', 'No se adjunto la cedula.');
               //dd("$imagen subido y guardado");
    }

    public function subircurriculum(Request $request)
    {
            //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
           
            if($request->hasfile('archivo')):
                $imagen         = $request->file('archivo');
                $nombreimagen   = $imagen.".".$imagen->guessExtension();
                $ruta           = $request->file('archivo')->store('public/archivo_curriculum');
                $imagen->move($ruta,$nombreimagen);  
                //dd("$ruta / $nombreimagen subido y guardado"); 
                            
                $datosimagen = new ImagenUpload();
                $datosimagen->usuario = Auth::user()->id;
                $datosimagen->nombre = 'curriculum';
                $datosimagen->ruta = $ruta;
                $datosimagen->save();
                
                return redirect('/adjunto_datos/'.Auth::user()->id)->with('success', 'Se adjunto con exito el curriculum.');

            endif;
            return redirect('/adjunto_datos/'.Auth::user()->id)->with('danger', 'No se adjunto el curricullum.');
               //dd("$imagen subido y guardado");
    }

    public function subircarta(Request $request)
    {
            //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
           
            if($request->hasfile('archivo')):
                $imagen         = $request->file('archivo');
                $nombreimagen   = $imagen.".".$imagen->guessExtension();
                $ruta           = $request->file('archivo')->store('public/carta_solicitud');
                $imagen->move($ruta,$nombreimagen);  
                //dd("$ruta / $nombreimagen subido y guardado"); 
                            
                $datosimagen = new ImagenUpload();
                $datosimagen->usuario = Auth::user()->id;
                $datosimagen->nombre = 'carta_solicitud';
                $datosimagen->ruta = $ruta;
                $datosimagen->save();
                
                return redirect('/adjunto_datos/'.Auth::user()->id)->with('success', 'Se adjunto con exito la carta de solicitud.');

            endif;
            return redirect('/adjunto_datos/'.Auth::user()->id)->with('danger', 'No se adjunto la carta de solicitud.');
               //dd("$imagen subido y guardado");
    }

    public function subircarnetcolegiatura(Request $request)
    {
            //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
           // $request->file('archivo')->store('public/foto_carnet');
            //dd("subido y guardado");

            if($request->hasfile('archivo')):
                $imagen         = $request->file('archivo');
                $nombreimagen   = $imagen.".".$imagen->guessExtension();
                $ruta           = $request->file('archivo')->store('public/foto_carnet_colegiatura');
                $imagen->move($ruta,$nombreimagen);  
                //dd("$ruta / $nombreimagen subido y guardado"); 
                            
                $datosimagen = new ImagenUpload();
                $datosimagen->usuario = Auth::user()->id;
                $datosimagen->nombre = 'carnet_colegiatura';
                $datosimagen->ruta = $ruta;
                $datosimagen->save();
                
                return redirect('/adjunto_datos/'.Auth::user()->id)->with('success', 'Se adjunto con exito carnet de colegiatura.');

            endif;
            return redirect('/adjunto_datos/'.Auth::user()->id)->with('danger', 'No se adjunto carnet de colegiatura.');
            //return view('estudiante.datosadjuntos');
               //dd("$imagen subido y guardado");
    }

    public function subirimpre(Request $request)
    {
            //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
           // $request->file('archivo')->store('public/foto_carnet');
            //dd("subido y guardado");

            if($request->hasfile('archivo')):
                $imagen         = $request->file('archivo');
                $nombreimagen   = $imagen.".".$imagen->guessExtension();
                $ruta           = $request->file('archivo')->store('public/foto_impre_colegiatura');
                $imagen->move($ruta,$nombreimagen);  
                //dd("$ruta / $nombreimagen subido y guardado"); 
                            
                $datosimagen = new ImagenUpload();
                $datosimagen->usuario = Auth::user()->id;
                $datosimagen->nombre = 'impre_colegiatura';
                $datosimagen->ruta = $ruta;
                $datosimagen->save();
                
                return redirect('/adjunto_datos/'.Auth::user()->id)->with('success', 'Se adjunto con exito impre de colegiatura.');

            endif;
            return redirect('/adjunto_datos/'.Auth::user()->id)->with('danger', 'No se adjunto impre de colegiatura.');
            //return view('estudiante.datosadjuntos');
               //dd("$imagen subido y guardado");
    }


    public function submunicipio(Request $request){
     //   dd($request);
        if(isset($request->texto)){
            $submunicipio = Municipio::where('id_entidad',$request->texto)->get();
            return response()->json(
                [
                    'lista' => $submunicipio,
                    'success' => true
                ]
                );
        }else{
            return response()->json(
                [
                    'success' => false
                ]
                );

        }

    }

    public function subparroquia(Request $request){
        if(isset($request->texto)){
            $subparroquia = Parroquia::where('id_municipio',$request->texto)->get();
            return response()->json(
                [
                    'lista' => $subparroquia,
                    'success' => true
                ]
                );
        }else{
            return response()->json(
                [
                    'success' => false
                ]
                );

        }

    }

}
