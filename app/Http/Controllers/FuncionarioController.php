<?php

namespace App\Http\Controllers;


use App\Genero;
use App\Entidad;
use App\Municipio;
use App\Parroquia;
use App\Cod_Celular;
use App\Estado_civil;
use App\ImagenUpload;
use App\Imagen_uploads_familiar;
use App\Imagen_uploads_cursos;
use App\Imagen_uploads_laborales;
use App\Nacionalidad;
use App\Cod_Habitacion;
use App\Persona;
use App\Banco;
use App\Funcionario;
use App\Tipo_trabajador;
use App\Parentezco;
use App\Familiares;
use App\Cuentas_bancarias;
use App\Laboral;
use App\Cursos;
use App\Idiomas;
use App\Educacion_funcionarios;
use App\Ubic_Administrativa;
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
        $entidad = Entidad::orderBy('descripcion')->get();
        $municipios=  Municipio::All();
        $parroquias=  Parroquia::All();
        $tipo_trabajador= Tipo_Trabajador::All();
         $cedula_usuario=Auth::user()->cedula;// buscar la manera que este valor de usuario este referenciado en la tabla funcionario y Usuario
         $uni_adscripcion= Ubic_Administrativa::where('status',1)->orderBy('orden_jerarquico')->get();
         
        $datos_funcionario  =   Funcionario::select ('*', 'funcionario.id as id_funcionario','funcionario.id_tipo_funcionario as id_tipo_trabajador',
        'funcionario.cargo as cargo_func')->join ('persona', 'persona.id','=','funcionario.persona_id')
        ->where('persona.numero_identificacion','=',$cedula_usuario)->get();
       
      
//dd($datos_funcionario);
     if(count($datos_funcionario)==0){
         $datos_funcionario  =   Persona::select ('*','persona.id as persona_id')->where('persona.numero_identificacion','=',$cedula_usuario)->get();     
     }
   return view('rrhh/funcionario/datosedit',compact('uni_adscripcion','datos_funcionario','nacionalidades','generos','estado_civils','cod_habs','cod_cels','entidad','municipios','tipo_trabajador'));    
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
        $uni_adscripcion= Ubic_Administrativa::All();
        $generos= Genero::All();
        $estado_civils= Estado_civil::All();
        $cod_habs= Cod_Habitacion::All();
        $cod_cels= Cod_Celular::All();
        $entidad = Entidad::orderBy('descripcion')->get();
        $parentezco=Parentezco::All();
        $tipo_trabajador= Tipo_Trabajador::All();
        $cedula_usuario=Auth::user()->cedula;// buscar la manera que este valor de usuario este referenciado en la tabla funcionario y Usuario
      
        $datos_persona  =   Persona::select ('*')->where('numero_identificacion','=',$cedula_usuario)->paginate(1);
        //var_dump($cedula_usuario);
        if(count($datos_persona)==0){
            return view('rrhh/funcionario/datos',compact('uni_adscripcion','cedula_usuario','parentezco','generos','nacionalidades','estado_civils','cod_habs','cod_cels','entidad','tipo_trabajador'));               
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
        $estados= Entidad::select('*')->whereNotin('id',[25])->orderBy('descripcion')->get();
      
        $municipios=  Municipio::All();
        $parroquias=  Parroquia::All();
        $cod_habs= Cod_Habitacion::All();
        $cod_cels= Cod_Celular::All();
        $todos_cod = Arr::collapse([$cod_habs, $cod_cels]);
        $cedula_usuario=Auth::user()->cedula;// buscar la manera que este valor de usuario este referenciado en la tabla funcionario y Usuario
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')
        ->where('persona.numero_identificacion','=',$cedula_usuario)->paginate(1);

        //var_dump($funcionario);
       // if (COUNT($funcionario)>0  ) {
          
            return view('rrhh/funcionario/direccion',compact('funcionario','estados','municipios','parroquias','cod_habs','cod_cels','todos_cod'));
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
        $banco=Banco::All();
        $funcionario_id=null;
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
        }
        $cuentas=Cuentas_bancarias::select('banco.id as id_banco', 'banco.nombre','cuentas_bancarias.*')
        ->join ('banco', 'banco.id','=','cuentas_bancarias.nombre_banco')    
        ->where('cuentas_bancarias.funcionario_id','=',$funcionario_id)->paginate(5);

       return view('rrhh/funcionario/cta_bancaria',compact('cuentas','funcionario_id','banco'));
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
        $banco=Banco::All();
        $cuenta_id=$id;
         $cuentas  =   Cuentas_bancarias::select ('*')       
        ->where('cuentas_bancarias.id','=',$cuenta_id)->get();   
     // dd($request);
        return view('rrhh/funcionario/cta_bancaria_edit',compact('cuentas','banco'));         
     
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
        $cedula_usuario=Auth::user()->cedula;
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')
        ->where('persona.numero_identificacion','=',$cedula_usuario)->paginate(1);
        $funcionario_id=null;
        $educacion=null;
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
        }
        $educacion= Educacion_funcionarios::where('funcionario_id',$funcionario_id)->get();
       return view('rrhh/funcionario/educacion',compact('educacion','funcionario_id','funcionario'));
    } 
    public function editeducacion()
    {
        $cedula_usuario=Auth::user()->cedula;
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')
        ->where('persona.numero_identificacion','=',$cedula_usuario)->paginate(1);
        $funcionario_id=null;
        $educacion=null;
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
        }
        $educacion= Educacion_funcionarios::where('funcionario_id',$funcionario_id)->get();
       return view('rrhh/funcionario/educacion_edit',compact('educacion','funcionario_id','funcionario'));
    }
    public function storeducacion(Request $request)
    {
        
        $request->validate([
            
            'id_funcionario' => ['required'],
            'profesion'=>['required', 'string', 'max:150'],
           
        ]);
      
        $educacion = new Educacion_funcionarios();        
        $educacion->funcionario_id = $request->id_funcionario;
        $educacion->profesion_ocup = $request->profesion;
        $educacion->otros_estudios = $request->otros_estudios;
        $educacion->pri_ult_anio = $request->pri_ultimo_anno;
        $educacion->institucion_pri = $request->institucion_pri;          
        $educacion->dir_ref_pri = $request->dir_ref_pri;         
        $educacion->fecha_ini_pri = $request->fechainicio_pri;           
        $educacion->fecha_fin_pri = $request->fechaculminacion_pri;    
        $educacion->sec_ult_anio = $request->sec_ultimo_anno;
        $educacion->institucion_sec = $request->institucion_sec;          
        $educacion->dir_ref_sec = $request->dir_ref_sec;         
        $educacion->fecha_ini_sec = $request->fechainicio_sec;           
        $educacion->fecha_fin_sec = $request->fechaculminacion_sec;     
        $educacion->tec_ult_anio = $request->tec_ultimo_anno;
        $educacion->institucion_tec = $request->institucion_tec;          
        $educacion->dir_ref_tec = $request->dir_ref_tec;         
        $educacion->fecha_ini_tec = $request->fechainicio_tec;           
        $educacion->fecha_fin_tec = $request->fechaculminacion_tec;            
        $educacion->tec_ult_anio = $request->tec_ultimo_anno;
        $educacion->institucion_tec = $request->institucion_tec;          
        $educacion->dir_ref_tec = $request->dir_ref_tec;         
        $educacion->fecha_ini_tec = $request->fechainicio_tec;           
        $educacion->fecha_fin_tec = $request->fechaculminacion_tec;            
        $educacion->uni_ult_anio = $request->uni_ultimo_anno;
        $educacion->institucion_tec = $request->institucion_tec;          
        $educacion->dir_ref_uni = $request->dir_ref_uni;         
        $educacion->fecha_ini_uni = $request->fechainicio_uni;           
        $educacion->fecha_fin_uni = $request->fechaculminacion_uni;    
        $educacion->institucion_uni = $request->institucion_uni; 
        $educacion->save();

        return redirect('rrhh/funcionario/educacion_edit')->with('message', ' Su datos Educativos fueron agregados con éxito!!.');
    }
    public function updateducacion(Request $request)
    {
        $request->validate([
            
            'id_funcionario' => ['required'],
            'profesion'=>['required', 'string', 'max:150'],
           
        ]);
      
        Educacion_funcionarios::where('funcionario_id', $request->id_funcionario)->where('status',1)
        ->update([         
           
            'profesion_ocup' => $request->profesion,
            'otros_estudios' => $request->otros_estudios,
            'pri_ult_anio' => $request->pri_ultimo_anno,
            'institucion_pri' => $request->institucion_pri,        
            'dir_ref_pri' => $request->dir_ref_pri,       
            'fecha_ini_pri' => $request->fechainicio_pri,         
            'fecha_fin_pri' => $request->fechaculminacion_pri,  
            'sec_ult_anio' => $request->sec_ultimo_anno,
            'institucion_sec' => $request->institucion_sec,        
            'dir_ref_sec' => $request->dir_ref_sec,      
            'fecha_ini_sec' => $request->fechainicio_sec,         
            'fecha_fin_sec' => $request->fechaculminacion_sec,     
            'tec_ult_anio' => $request->tec_ultimo_anno,
            'institucion_tec' => $request->institucion_tec,        
            'dir_ref_tec' => $request->dir_ref_tec,       
            'fecha_ini_tec' => $request->fechainicio_tec,          
            'fecha_fin_tec' => $request->fechaculminacion_tec,          
            'tec_ult_anio' => $request->tec_ultimo_anno,
            'institucion_tec' => $request->institucion_tec,       
            'dir_ref_tec' => $request->dir_ref_tec,     
            'fecha_ini_tec' => $request->fechainicio_tec,       
            'fecha_fin_tec' => $request->fechaculminacion_tec,          
            'uni_ult_anio' => $request->uni_ultimo_anno,
            'institucion_tec' => $request->institucion_tec,        
            'dir_ref_uni' => $request->dir_ref_uni,     
            'fecha_ini_uni' => $request->fechainicio_uni,        
            'fecha_fin_uni' => $request->fechaculminacion_uni,   
            'institucion_uni' => $request->institucion_uni,       
 
        ]);
       return redirect('rrhh/funcionario/educacion_edit')->with('message', ' Su datos Educativos fueron actualizados con éxito!!.');;
    }
    public function createstudios_act()
    {
        $cedula_usuario=Auth::user()->cedula;
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')
        ->where('persona.numero_identificacion','=',$cedula_usuario)->paginate(1);
       return view('rrhh/funcionario/estudios_act',compact('funcionario'));
    }
    public function updatestudios_act(Request $request)
    {
        $request->validate([
            
            'id_funcionario' => ['required'],
            'estudia'=>['required'],
           //'nivel_curso'=>['required'],
            //'universidad'=>['required'],
            //'especialidad'=>['required'],
           
        ]);
      
        Funcionario::where('id', $request->id_funcionario)
        ->update([         
   
            'estudia'=>$request->estudia,
            'nivel_cursa'=>$request->nivel_curso,
            'especialidad'=>$request->especialidad,
            'institucion_estudia'=>$request->universidad,
           
 
        ]);
       return redirect('rrhh/funcionario/estudios_act')->with('message', ' Sus Estudios Actuales fue actualizado con éxito!!.');;
    }
    
    public function createcursos()
    {
        $cedula_usuario=Auth::user()->cedula;
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula_usuario)->get();
        $funcionario_id=null;
        $cursos=null;
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
        }
        $cursos=Cursos::select('*')->where('cursos.funcionario_id','=',$funcionario_id)->paginate(5);

       return view('rrhh/funcionario/cursos',compact('cursos','funcionario_id'));
    }
    
    public function storecursos(Request $request)
    {
        
        $request->validate([
            
            'id_funcionario' => ['required'],
            'nommbre_curso'=>['required', 'string', 'max:150'],
            'institucion_curso'=>['required', 'string', 'max:150'],
            'dir_ref_curso'=>['required'],
            'fechainicio_curso'=>['required'],
            'fechaculminacion_curso'=>['required'],
        ]);
      
        $cursos = new Cursos();        
        $cursos->funcionario_id = $request->id_funcionario;
        $cursos->nommbre_curso = $request->nommbre_curso;
        $cursos->institucion_curso = $request->institucion_curso;          
        $cursos->dir_ref_curso = $request->dir_ref_curso;         
        $cursos->fechainicio_curso = $request->fechainicio_curso;           
        $cursos->fechaculminacion_curso = $request->fechaculminacion_curso;           
      
        $cursos->save();

        return redirect('rrhh/funcionario/cursos')->with('message', ' Su Curso fue agregado con éxito!!.');
    }
    public function editcursos(Request $request,$id)// editar datos familiares
    {       
         $curso_id=$id;
         $cursos  =   Cursos::select ('*')       
        ->where('cursos.id','=',$curso_id)->get();   
        // dd($request);
        return view('rrhh/funcionario/cursos_edit',compact('cursos'));         
     
    }
    public function updatecursos (Request $request)
    {
        
        $request->validate([           
            'id_curso'=>['required'],
            'nommbre_curso'=>['required', 'string', 'max:150'],
            'institucion_curso'=>['required', 'string', 'max:150'],
            'dir_ref_curso'=>['required'],
            'fechainicio_curso'=>['required'],
            'fechaculminacion_curso'=>['required'],      
        ]);

      // dd($request);
     
       Cursos::where('id', $request->id_curso)
       ->update([         
  
           'nommbre_curso'=>$request->nommbre_curso,
           'institucion_curso'=>$request->institucion_curso,
           'dir_ref_curso'=>$request->dir_ref_curso,
           'fechainicio_curso'=>$request->fechainicio_curso,
           'fechaculminacion_curso'=>$request->fechaculminacion_curso,

       ]);

        return redirect('rrhh/funcionario/cursos')->with('message', ' Su Curso realizado fue actualizado con éxito!!.');
    }
    public function createidiomas()
    {
        $cedula_usuario=Auth::user()->cedula;
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula_usuario)->get();
        $funcionario_id=null;
        $cursos=null;
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
        }
        $idiomas=Idiomas::select('*')->where('idiomas.funcionario_id','=',$funcionario_id)->paginate(5);
       return view('rrhh/funcionario/idiomas',compact('idiomas','funcionario_id','funcionario'));
    }
    public function storeidiomas(Request $request)
    {
        
        $request->validate([
            
            'id_funcionario' => ['required'],
            'nommbre_idioma'=>['required', 'string', 'max:150'],
           
            'lee'=>['required'],
            'habla'=>['required'],
            'escribe'=>['required'],
        ]);
      
        $idiomas = new Idiomas();        
        $idiomas->funcionario_id = $request->id_funcionario;
        $idiomas->nommbre_idioma = $request->nommbre_idioma;
        $idiomas->lee = $request->lee;          
        $idiomas->habla = $request->habla;         
        $idiomas->escribe = $request->escribe;           
              
      
        $idiomas->save();

        return redirect('rrhh/funcionario/idiomas')->with('message', ' Su Idioma fue agregado con éxito!!.');
    }
    public function editidiomas(Request $request,$id)// editar datos familiares
    {       
         $idioma_id=$id;
         $idiomas  =   Idiomas::select ('*')       
        ->where('idiomas.id','=',$idioma_id)->get();   
        // dd($request);
        return view('rrhh/funcionario/idiomas_edit',compact('idiomas'));         
     
    }
    public function updateidiomas (Request $request)
    {
        
        $request->validate([           
            'id_idioma'=>['required'],
             'nommbre_idioma'=>['required', 'string', 'max:150'],          
            'lee'=>['required'],
            'habla'=>['required'],
            'escribe'=>['required'],      
        ]);

      // dd($request);
     
       Idiomas::where('id', $request->id_idioma)
       ->update([         
  
           'nommbre_idioma'=>$request->nommbre_idioma,
           'lee'=>$request->lee,
           'habla'=>$request->habla,
           'escribe'=>$request->escribe,
          

       ]);

        return redirect('rrhh/funcionario/idiomas')->with('message', ' Su Idioma fue actualizado con éxito!!.');
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
   
       $persona=Persona::select(('*'))->where('numero_identificacion','=',$request->cedula)->get();
       if($persona->count()>0){
        foreach($persona as $persona){
            $id_persona_familiar=$persona->id;
        } 
        Persona::where('id', $id_persona_familiar)
        ->update([          
            
           
            'edad'=>$request->fechanac,            
            'id_genero'=>$request->genero,
          
           
        ]);
     

       }else{
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
        $id_persona_familiar= $datos_persona->id ;
  
}
          //dd($request);  
         $id_persona= $id_persona_familiar ;
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
    public function destroycuenta($id)
    {
        //dd($id);
        $cuenta = Cuentas_bancarias::findOrFail($id);
        
        $cuenta->delete();

        return    redirect()->back()->with('message', ' La cuenta bancaria  del Trabajador(a)  fue eliminado con éxito!!.');
    }
public function destroyfamiliar($id)
    {
        //dd($id);
        $familiar = Familiares::findOrFail($id);
        
        $familiar->delete();

        return    redirect()->back()->with('message', ' El familiar del Trabajador(a)  fue eliminado con éxito!!.');
    }
    public function destroylaboral($id)
    {
        //dd($id);
        $Laboral = Laboral::findOrFail($id);
        
        $Laboral->delete();

        return    redirect()->back()->with('message', ' El registro  del Trabajador(a)  fue eliminado con éxito!!.');
    }
    public function destroycursos($id)
    {
        //dd($id);
        $Cursos = Cursos::findOrFail($id);
        
        $Cursos->delete();

        return    redirect()->back()->with('message', ' El curso registrado del Trabajador(a)  fue eliminado con éxito!!.');
    }
 
    public function destroyidiomas($id)
    {
       // dd($id);
        $Idiomas = Idiomas::findOrFail($id);
        
        $Idiomas->delete();

        return    redirect()->back()->with('message', 'El idioma registrado del Trabajador(a)  fue eliminado con éxito!!.');
    }
   /* use App\Familiares;
    use App\Cuentas_bancarias;
    use App\Laboral;
    use App\Cursos;
    use App\Idiomas;*/
    

   // public function datosadjunto($id)
    public function datosadjunto()
    {
        $cedula_usuario=Auth::user()->cedula;
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula_usuario)->get();
        $funcionario_id=null;
        $laboral=null;
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
        }
        $laboral=Laboral::select('*')->where('laboral.funcionario_id','=',$funcionario_id)->paginate(10);
        $cursos=Cursos::select('*')->where('cursos.funcionario_id','=',$funcionario_id)->paginate(15);
        $familiar  =   Familiares::select ('*','familiares.id as id_familiar','familiares.persona_id as id_persona', 'nacionalidad.cod as nacionalidad',
        'parentezco.descripcion as parentezco')
        ->join ('funcionario', 'familiares.funcionario_id','=','funcionario.id')
        ->join ('persona', 'persona.id','=','familiares.persona_id')
        ->join ('nacionalidad', 'nacionalidad.id','=','persona.id_nacionalidad')
        ->join ('parentezco', 'parentezco.id','=','familiares.parentezco_id')
        ->join ('genero', 'persona.id_genero','=','genero.id')
        ->where('familiares.funcionario_id','=',$funcionario_id)->paginate(10);

        $id= Auth::user()->id;
        $foto = ImagenUpload::select('*')
       ->where('usuario', '=',$id)
       ->where('nombre', 'foto')
       ->get();
       $cedula = ImagenUpload::select('*')
       ->where('usuario', '=',$id)
       ->where('nombre', 'cedula')
       ->get();
       $partida = ImagenUpload::select('*')
       ->where('usuario', '=',$id)
       ->where('nombre', 'partida_nac')
       ->get();
       $matrimonio = ImagenUpload::select('*')
       ->where('usuario', '=',$id)
       ->where('nombre', 'matrimonio')
       ->get();
       $constancia = ImagenUpload::select('*')
       ->where('usuario', '=',$id)
       ->where('nombre', 'constancia_est')
       ->get();
       $horario = ImagenUpload::select('*')
       ->where('usuario', '=',$id)
       ->where('nombre', 'horario')
       ->get();
       $curriculum = ImagenUpload::select('*')
       ->where('usuario', '=',$id)
       ->where('nombre', 'curriculum')
       ->get();
       $titulo = ImagenUpload::select('*')
       ->where('usuario', '=',$id)
       ->where('nombre', 'titulo')
       ->get();
       $rif = ImagenUpload::select('*')
       ->where('usuario', '=',$id)
       ->where('nombre', 'rif')
       ->get();
       $carnet = ImagenUpload::select('*')
       ->where('usuario', '=',$id)
       ->where('nombre', 'carnet_mp')
       ->get();
        if ($funcionario->count()>0){
            return view('rrhh.funcionario.requisitos',compact('familiar','laboral','cursos','foto','cedula','partida','matrimonio','rif','carnet','constancia','horario','curriculum','titulo'));
        }else{
            return    redirect()->back()->with('error', 'DEBE COMPLETAR LOS DATOS BÁSICOS, PARA PODER CARGAR SUS REQUISITOS.'); 
        }
        
    }

   

    public function creardocumento(Request $request,$tipo_documento)
    {

        return view('rrhh.funcionario.creardocumento',compact('tipo_documento'));
    }

    
    public function subirArchivo(Request $request)
    {
            //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
           // $request->file('archivo')->store('public/foto_carnet');
          // dd($request->hasfile('archivo'));
          // dd($request->hasfile('archivo'),$request->all());

            if($request->hasfile('archivo')){
                $imagen         = $request->file('archivo');
                $nombreimagen   = $imagen.".".$imagen->guessExtension();
                $ruta           = $request->file('archivo')->store('public/documentos_rrhh/'.$request->tipo_documento);
               // dd($ruta);
                if(!$imagen->move($ruta,$nombreimagen)){
                    return redirect('rrhh/funcionario/requisitos/')->with('error', 'Permiso denegado para guardar archivo!! .');
                }
                  
                
                $id= Auth::user()->id;
               // dd($id);
                $requisitos =  ImagenUpload::select('*')
                ->where('usuario', '=',$id)
                ->where('nombre', '=', $request->tipo_documento)
                ->get();
              //  dd($requisitos);
                if($requisitos->count()==0 ){
                            
                    $datosimagen = new ImagenUpload();
                    $datosimagen->usuario = Auth::user()->id;
                    $datosimagen->nombre = $request->tipo_documento;
                    $datosimagen->ruta = $ruta;
                    $datosimagen->save();
                }else{
                    
                    ImagenUpload::where('usuario', Auth::user()->id) ->where('nombre', '=', $request->tipo_documento)
                    ->update([                                  
                        'ruta'=>$ruta
                    ]);
                }
                
                return redirect('rrhh/funcionario/requisitos/')->with('message', 'Se adjunto el documento con exito!! .');
            }else{
                return redirect('rrhh/funcionario/requisitos/')->with('error', 'No se adjunto el documento correctamente. Verificar el tamaño del Archivo no debe exceder a más de 1 Mb.');
            }
            
            
         
    }
    
    
    public function requisito_familiar(Request $request,$tipo_documento,$id_familiar,$ir=null)
    {
        $cedula =null;
        $partida =null;
        if($tipo_documento=='cedula_familiar'){
        $cedula = Imagen_uploads_familiar::select('*')
        ->where('familiar_id', '=',$id_familiar)
        ->where('nombre', 'cedula_familiar')
        ->get();
        }
        if($tipo_documento=='partida_nac_familiar'){
        $partida = Imagen_uploads_familiar::select('*')
        ->where('familiar_id', '=',$id_familiar)
        ->where('nombre', 'partida_nac_familiar')
        ->get();
        }
        //dd($cedula);
        //dd($partida);
        $familiar= Familiares::select ('*','familiares.id as id_familiar','familiares.persona_id as id_persona', 'nacionalidad.cod as nacionalidad',
        'parentezco.descripcion as parentezco')
        ->join ('funcionario', 'familiares.funcionario_id','=','funcionario.id')
        ->join ('persona', 'persona.id','=','familiares.persona_id')
        ->join ('nacionalidad', 'nacionalidad.id','=','persona.id_nacionalidad')
        ->join ('parentezco', 'parentezco.id','=','familiares.parentezco_id')
        ->join ('genero', 'persona.id_genero','=','genero.id')
        ->where('familiares.id',$id_familiar)
        ->get();
        //dd($familiar);
    return view('rrhh.funcionario.creardocumento_familiar',compact('ir','tipo_documento','id_familiar','cedula','partida','familiar'));
    }
    public function subirArchivo_familiar(Request $request)
    {
            //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
           // $request->file('archivo')->store('public/foto_carnet');
          // dd($request->all());

            if($request->hasfile('archivo')):
                $imagen         = $request->file('archivo');
                $nombreimagen   = $imagen.".".$imagen->guessExtension();
                $ruta           = $request->file('archivo')->store('public/documentos_rrhh/'.$request->tipo_documento);
                $imagen->move($ruta,$nombreimagen);  
                
                $id= Auth::user()->id;
                $requisitos =  Imagen_uploads_familiar::select('*')
                ->where('familiar_id', '=', $request->familiar_id)
                ->where('nombre', '=', $request->tipo_documento)
                ->get();
                if(count($requisitos)==0 ){
                            
                    $datosimagen = new Imagen_uploads_familiar();
                    $datosimagen->usuario = Auth::user()->id;
                    $datosimagen->familiar_id = $request->familiar_id;
                    $datosimagen->nombre = $request->tipo_documento;
                    $datosimagen->ruta = $ruta;
                    $datosimagen->save();
                }else{
                    
                    Imagen_uploads_familiar::where('familiar_id', $request->familiar_id)
                    ->update([                                  
                        'ruta'=>$ruta
                    ]);
                }
                
                return redirect('rrhh/funcionario/familiar/')->with('message', 'Se adjunto el documento con exito!! .');

            endif;
            return redirect('rrhh/funcionario/familiar/')->with('error', 'No se adjunto el documento correctamente. Verificar el tamaño del Archivo no debe exceder a más de 1 Mb.');
         
    }
    public function requisito_cursos(Request $request,$tipo_documento,$id_curso,$ir=null)
    {
        $curso =null;
   
        if($tipo_documento=='curso'){
        $curso = Imagen_uploads_cursos::select('*')
        ->where('cursos_id', '=',$id_curso)
        ->where('nombre', 'curso')
        ->get();
        }       
        $cursos= Cursos::select ('*')
        ->where('cursos.id',$id_curso)
        ->get();
      // dd($curso);
    return view('rrhh.funcionario.creardocumento_curso',compact('ir','tipo_documento','id_curso','cursos','curso'));
    }
    public function subirArchivo_cursos(Request $request)
    {
            //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
           // $request->file('archivo')->store('public/foto_carnet');
            //dd("subido y guardado");

            if($request->hasfile('archivo')):
                $imagen         = $request->file('archivo');
                $nombreimagen   = $imagen.".".$imagen->guessExtension();
                $ruta           = $request->file('archivo')->store('public/documentos_rrhh/'.$request->tipo_documento);
                $imagen->move($ruta,$nombreimagen);  
                
                $id= Auth::user()->id;
                $requisitos =  Imagen_uploads_cursos::select('*')
                ->where('cursos_id', '=', $request->cursos_id)
                ->where('nombre', '=', $request->tipo_documento)
                ->get();
                if(count($requisitos)==0 ){
                            
                    $datosimagen = new Imagen_uploads_cursos();
                    $datosimagen->usuario = Auth::user()->id;
                    $datosimagen->cursos_id = $request->cursos_id;
                    $datosimagen->nombre = $request->tipo_documento;
                    $datosimagen->ruta = $ruta;
                    $datosimagen->save();
                }else{
                    
                    Imagen_uploads_cursos::where('cursos_id', $request->cursos_id)
                    ->update([                                  
                        'ruta'=>$ruta
                    ]);
                }
                
                return redirect('rrhh/funcionario/cursos/')->with('message', 'Se adjunto el documento con exito!! .');

            endif;
            return redirect('rrhh/funcionario/cursos/')->with('error', 'No se adjunto el documento correctamente. Verificar el tamaño del Archivo no debe exceder a más de 1 Mb.');
         
    }
    public function requisito_laboral(Request $request,$tipo_documento,$id_laboral,$ir=null)
    {
        $carta_trab =null;
   
        if($tipo_documento=='carta_trab'){
        $carta_trab = Imagen_uploads_laborales::select('*')
        ->where('laboral_id', '=',$id_laboral)
        ->where('nombre', 'carta_trab')
        ->get();
        }       
        $laboral= Laboral::select ('*')
        ->where('laboral.id',$id_laboral)
        ->get();
      // dd($curso);
    return view('rrhh.funcionario.creardocumento_laboral',compact('ir','tipo_documento','id_laboral','laboral','carta_trab'));
    }
    public function subirArchivo_laboral(Request $request)
    {
            //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
           // $request->file('archivo')->store('public/foto_carnet');
            //dd("subido y guardado");

            if($request->hasfile('archivo')):
                $imagen         = $request->file('archivo');
                $nombreimagen   = $imagen.".".$imagen->guessExtension();
                $ruta           = $request->file('archivo')->store('public/documentos_rrhh/'.$request->tipo_documento);
                $imagen->move($ruta,$nombreimagen);  
                
                $id= Auth::user()->id;
                $requisitos =  Imagen_uploads_laborales::select('*')
                ->where('laboral_id', '=', $request->laboral_id)
                ->where('nombre', '=', $request->tipo_documento)
                ->get();
                if(count($requisitos)==0 ){
                            
                    $datosimagen = new Imagen_uploads_laborales();
                    $datosimagen->usuario = Auth::user()->id;
                    $datosimagen->laboral_id = $request->laboral_id;
                    $datosimagen->nombre = $request->tipo_documento;
                    $datosimagen->ruta = $ruta;
                    $datosimagen->save();
                }else{
                    
                    Imagen_uploads_laborales::where('laboral_id', $request->laboral_id)
                    ->update([                                  
                        'ruta'=>$ruta
                    ]);
                }
                
                return redirect('rrhh/funcionario/experiencia/')->with('message', 'Se adjunto el documento con exito!! .');

            endif;
            return redirect('rrhh/funcionario/experiencia/')->with('error', 'No se adjunto el documento correctamente. Verificar el tamaño del Archivo no debe exceder a más de 1 Mb.');
         
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
