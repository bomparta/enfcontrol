<?php

namespace App\Http\Controllers;


use App\Genero;
use App\Entidad;
use App\Municipio;
use App\Parroquia;
use App\Cod_Celular;
use App\Estado_civil;
use App\Nacionalidad;
use App\Cod_Habitacion;
use App\Persona;
use App\Funcionario;
use App\Tipo_trabajador;
use App\Parentezco;
use App\Familiares;
use App\Cuentas_bancarias;
use App\Laboral;
use App\Cursos;
use App\Idiomas;
use App\Educacion_funcionarios;
use App\ImagenUpload;
use App\Imagen_uploads_familiar;
use App\Imagen_uploads_cursos;
use App\Imagen_uploads_laborales;
use App\Imagen_uploads_mov_rrhh;
use App\Ubic_Administrativa;
use App\User;
use App\RrhhMovimientos;
use App\TipoMovimientos;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;
class VacacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('/rrhh/vacaciones/homevacaciones');
    }
    public function funcionarios()
    {
      $vacaciones=NULL;
      $nacionalidades= Nacionalidad::All();
        $generos= Genero::All();
        $estado_civils= Estado_civil::All();
        $cod_habs= Cod_Habitacion::All();
        $cod_cels= Cod_Celular::All();
        $entidad = Entidad::orderBy('descripcion')->get();
        $tipo_trabajador= Tipo_Trabajador::All();
         $cedula_usuario=Auth::user()->cedula;// buscar la manera que este valor de usuario este referenciado en la tabla funcionario y Usuario
         $uni_adscripcion= Ubic_Administrativa::All();
         
        $datos_funcionario  =   $datos_funcionario= Funcionario::select('funcionario.id as funcionario_id',
        'funcionario.*','persona.*','funcionario.cargo as cargo','funcionario.id_oficina_administrativa'     ,
        'estado_civil.descripcion as est_civil','entidad.descripcion as estado_nac',
        'tipo_trabajador.descripcion as trabajador','ubic_administrativa.descripcion as administrativa',
        'ent.descripcion as ent_domi','municipio.nombre as muni_domi','parroquia.nombre as parr_domi','funcionario.id_tipo_funcionario as tipo_trabajador') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')    
        ->join('estado_civil','estado_civil.id','=','persona.id_estado_civil')  
        ->join('entidad','entidad.id','=','persona.estado_nac') 
        ->JOIN('tipo_trabajador','tipo_trabajador.id','funcionario.id_tipo_funcionario')      
        ->JOIN('ubic_administrativa','ubic_administrativa.id','funcionario.id_oficina_administrativa')          
        ->join('entidad as ent','ent.id','=','funcionario.estado_domicilio') 
        ->join('municipio','municipio.id','=','funcionario.municipio_domicilio')     
        ->join('parroquia','parroquia.id','=','funcionario.parroquia_domicilio')             
        ->where('persona.numero_identificacion','=',$cedula_usuario)->get();     
//dd($datos_funcionario);
     if(count($datos_funcionario)==0){
         $datos_funcionario  =   Persona::select ('*','persona.id as persona_id')->where('persona.numero_identificacion','=',$cedula_usuario)->get();     
     }

      return view('rrhh.vacaciones.solicitud_vacaciones_edit',compact('vacaciones','datos_funcionario'));
    }
    public function rrhh()
    {
        return view('vacaciones/vacaciones_rrhh');
    }
    public function create(Request $request,$cedula)
    {
      
        $nacionalidades= Nacionalidad::All();
        $tipo_trabajador= Tipo_Trabajador::All();
        $uni_adscripcion= Ubic_Administrativa::All();
        $tipo_mov= TipoMovimientos:: All();
        
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*','persona.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula)->get();
        $funcionario_id=null;
       // dd($request);
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
            $edad=Carbon::parse($funcionario->edad)->age;
        }
        $datos_funcionario= Funcionario::select('funcionario.id as funcionario_id',
        'funcionario.*','persona.*','funcionario.cargo as cargo','funcionario.id_oficina_administrativa'     ,
        'estado_civil.descripcion as est_civil','entidad.descripcion as estado_nac',
        'tipo_trabajador.descripcion as trabajador','ubic_administrativa.descripcion as administrativa',
        'ent.descripcion as ent_domi','municipio.nombre as muni_domi','parroquia.nombre as parr_domi','funcionario.id_tipo_funcionario as tipo_trabajador') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')    
        ->join('estado_civil','estado_civil.id','=','persona.id_estado_civil')  
        ->join('entidad','entidad.id','=','persona.estado_nac') 
        ->JOIN('tipo_trabajador','tipo_trabajador.id','funcionario.id_tipo_funcionario')      
        ->JOIN('ubic_administrativa','ubic_administrativa.id','funcionario.id_oficina_administrativa')          
        ->join('entidad as ent','ent.id','=','funcionario.estado_domicilio') 
        ->join('municipio','municipio.id','=','funcionario.municipio_domicilio')     
        ->join('parroquia','parroquia.id','=','funcionario.parroquia_domicilio')             
        ->where('persona.numero_identificacion','=',$cedula)->get();     
       // var_dump($datos_funcionario) ;
        
       return view('rrhh.vacaciones.registrar_solicitud',compact('cedula','nacionalidades','datos_funcionario','edad','tipo_trabajador','uni_adscripcion','tipo_mov'));
    } 
   /* public function reporterrhh()
    {
        return view('reportes/rrhh/lista_reporte_rrhh');
    }
    public function requisitos_cargados($cedula_usuario){
       
       
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*','persona.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula_usuario)->get();
        $funcionario_id=null;
        $laboral=null;
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
            $nombres=$funcionario->nombre.' '.$funcionario->nombreseg;
            $apellidos=$funcionario->apellido.' '.$funcionario->apellidoseg;
            if($funcionario->id_nacionalidad == 1) $nacionalidad="V";
            if($funcionario->id_nacionalidad == 2) $nacionalidad="E";
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
        $usuario= User::where('cedula','=',$cedula_usuario)
        ->whereIn('id_usuariogrupo',[11,12])->get();
       
        foreach($usuario as  $usuario){
            $id= $usuario->id;
        }
       
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
       ->where('nombre', 'matrimonio')
       ->get();
       $horario = ImagenUpload::select('*')
       ->where('usuario', '=',$id)
       ->where('nombre', 'horario')
       ->get();
       $curriculum = ImagenUpload::select('*')
       ->where('usuario', '=',$id)
       ->where('nombre', 'horario')
       ->get();
       $titulo = ImagenUpload::select('*')
       ->where('usuario', '=',$id)
       ->where('nombre', 'titulo')
       ->get();

        return view('rrhh.requisitos_trab',compact('nombres','apellidos','cedula_usuario','nacionalidad','familiar','laboral','cursos','foto','cedula','partida','matrimonio','constancia','horario','curriculum','titulo'));
        
    }
    public function doc_familiar($id_familiar,$tipo_documento){
        $familiar= Familiares::select ('*','familiares.id as id_familiar','familiares.persona_id as id_persona', 'nacionalidad.cod as nacionalidad',
        'parentezco.descripcion as parentezco')
        ->join ('funcionario', 'familiares.funcionario_id','=','funcionario.id')
        ->join ('persona', 'persona.id','=','familiares.persona_id')
        ->join ('nacionalidad', 'nacionalidad.id','=','persona.id_nacionalidad')
        ->join ('parentezco', 'parentezco.id','=','familiares.parentezco_id')
        ->join ('genero', 'persona.id_genero','=','genero.id')
        ->where('familiares.id',$id_familiar)
        ->get();
       
        $req_fam =  Imagen_uploads_familiar::select('ruta','usuario')
        ->where('familiar_id', '=', $id_familiar)
        ->where('nombre', '=', $tipo_documento)
        ->get();
      
      
        //dd($req_fam);
        return view('rrhh.ver_documento_familiar',compact('req_fam','tipo_documento','id_familiar','familiar'));
    }
    public function doc_cursos($id_curso,$tipo_documento){
       
            $cursos= Cursos::select ('*')
            ->where('cursos.id',$id_curso)
            ->get();
       
      
        $req_cursos =  Imagen_uploads_cursos::select('ruta','usuario')
        ->where('cursos_id', '=', $id_curso)
        ->where('nombre', '=', $tipo_documento)
        ->get();
       
      
        //dd($req_fam);
        return view('rrhh.ver_documento_cursos',compact('req_cursos','tipo_documento','id_curso','cursos'));
    }
    public function doc_laboral($id_laboral,$tipo_documento){
       
   
        $req_laboral = Imagen_uploads_laborales::select('*')
        ->where('laboral_id', '=',$id_laboral)
        ->where('nombre', 'carta_trab')
        ->get();
        
        $laboral= Laboral::select ('*')
        ->where('laboral.id',$id_laboral)
        ->get();
  
   
   
  
    //dd($req_fam);
    return view('rrhh.ver_documento_laboral',compact('req_laboral','tipo_documento','id_laboral','laboral'));
}
public function requisito_rrhh(Request $request,$tipo_documento,$id_rrhh_mov,$cedula)
{
    $rrhh_mov =null;
   // dd($tipo_documento);
   
    $rrhh_mov = Imagen_uploads_mov_rrhh::select('*')
    ->where('rrhh_mov_id', '=',$id_rrhh_mov)
    ->where('nombre', $tipo_documento)
    ->get();
          


    $rrhh=RrhhMovimientos::Select('*','rrhh_movimientos.id as id_rrhh_mov','tipo_trabajador.descripcion as tipo_trabajador','ubic_administrativa.descripcion as ubic_administrativa','tipo_movimientos.descripcion as tipo_mov','rrhh_movimientos.cargo as cargo_mov') 
    ->JOIN('tipo_trabajador','tipo_trabajador.id','rrhh_movimientos.id_tipo_funcionario')      
    ->JOIN('ubic_administrativa','ubic_administrativa.id','rrhh_movimientos.id_oficina_administrativa') 
    ->JOIN('tipo_movimientos','tipo_movimientos.id','rrhh_movimientos.id_tipo_mov') 
    ->JOIN('funcionario','funcionario.id','rrhh_movimientos.funcionario_id') 
    ->JOIN('persona','persona.id','funcionario.persona_id') 
    ->where('rrhh_movimientos.id', '=',$id_rrhh_mov)
    ->get();   

return view('rrhh.creardocumento_rrhh',compact('tipo_documento','id_rrhh_mov','rrhh','rrhh_mov','cedula'));
}
public function subirArchivo_rrhh(Request $request)
{
        //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
       // $request->file('archivo')->store('public/foto_carnet');
       // dd($request);

        if($request->hasfile('archivo')):
            $imagen         = $request->file('archivo');
            $nombreimagen   = $imagen.".".$imagen->guessExtension();
            $ruta           = $request->file('archivo')->store('public/documentos_rrhh/'.$request->tipo_documento);
            $imagen->move($ruta,$nombreimagen);  
            
            $id= Auth::user()->id;
            $requisitos =  Imagen_uploads_mov_rrhh::select('*')
            ->where('rrhh_mov_id', '=', $request->rrhh_mov_id)
            ->where('nombre', '=', $request->tipo_documento)
            ->get();
            if(count($requisitos)==0 ){                        
                $datosimagen = new Imagen_uploads_mov_rrhh();
                $datosimagen->rrhh_mov_id = $request->rrhh_mov_id;
                $datosimagen->nombre = $request->tipo_documento;
                $datosimagen->cedula = $request->cedula;
                $datosimagen->ruta = $ruta;
                $datosimagen->registrado_por = Auth::user()->cedula;   
                $datosimagen->actualizado_por = 0;  
                $datosimagen->save();
            }else{
                
                Imagen_uploads_mov_rrhh::where('rrhh_mov_id', $request->rrhh_mov_id)
                ->where('nombre', $request->tipo_documento)
                ->update([                                  
                    'ruta'=>$ruta,
                   'actualizado_por' => Auth::user()->cedula   
                ]);
            }
            
            return  redirect()->back()->with('message', 'Se adjunto el documento con exito!! .');

        endif;
        return  redirect()->back()->with('error', 'No se adjunto el documento correctamente.');
     
}
    public function planillarrhh()
    {
      /*se instalo composer require barryvdh/laravel-dompdf 
        * se coloco en 'providers' este codigo  Barryvdh\DomPDF\ServiceProvider::class,
        * y en 'aliases' se coloco esto 'PDF' => Barryvdh\DomPDF\Facade::class,
        */
        /*$cedula_usuario=Auth::user()->cedula;
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*','persona.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula_usuario)->get();
        $funcionario_id=null;
        $laboral=null;
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
            $edad=Carbon::parse($funcionario->edad)->age;
        }
        $datos_funcionario= Funcionario::select('funcionario.id as funcionario_id',
        'funcionario.*','persona.*','funcionario.cargo as cargo','funcionario.id_oficina_administrativa as adscripcion'     ,
        'estado_civil.descripcion as est_civil','entidad.descripcion as estado_nac',
        'tipo_trabajador.descripcion as trabajador','ubic_administrativa.descripcion as administrativa',
        'ent.descripcion as ent_domi','municipio.nombre as muni_domi','parroquia.nombre as parr_domi') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')    
        ->join('estado_civil','estado_civil.id','=','persona.id_estado_civil')  
        ->join('entidad','entidad.id','=','persona.estado_nac') 
        ->JOIN('tipo_trabajador','tipo_trabajador.id','funcionario.id_tipo_funcionario')      
        ->JOIN('ubic_administrativa','ubic_administrativa.id','funcionario.id_oficina_administrativa')          
        ->join('entidad as ent','ent.id','=','funcionario.estado_domicilio') 
        ->join('municipio','municipio.id','=','funcionario.municipio_domicilio')     
        ->join('parroquia','parroquia.id','=','funcionario.parroquia_domicilio')             
        ->where('persona.numero_identificacion','=',$cedula_usuario)->get();

      
        $laboral=Laboral::select('*')->where('laboral.funcionario_id','=',$funcionario_id)->paginate(5);
        $educacion= Educacion_funcionarios::where('funcionario_id',$funcionario_id)->get();
        $cursos=Cursos::select('*')->where('cursos.funcionario_id','=',$funcionario_id)->paginate(15);
        $familiar  =   Familiares::select ('*','familiares.id as id_familiar','familiares.persona_id as id_persona', 'nacionalidad.cod as nacionalidad',
        'parentezco.descripcion as parentezco','familiares.ocupacion as ocupacion_fam')
        ->join ('funcionario', 'familiares.funcionario_id','=','funcionario.id')
        ->join ('persona', 'persona.id','=','familiares.persona_id')
        ->join ('nacionalidad', 'nacionalidad.id','=','persona.id_nacionalidad')
        ->join ('parentezco', 'parentezco.id','=','familiares.parentezco_id')
        ->join ('genero', 'persona.id_genero','=','genero.id')
        ->where('familiares.funcionario_id','=',$funcionario_id)->paginate(5);
        $idiomas=Idiomas::select('*')->where('idiomas.funcionario_id','=',$funcionario_id)->paginate(5);
        $cuentas=Cuentas_bancarias::select('*')->where('cuentas_bancarias.funcionario_id','=',$funcionario_id)->paginate(5);
        $id= Auth::user()->id;
        $foto = ImagenUpload::select('*')
       ->where('usuario', '=',$id)
       ->where('nombre', 'foto')
       ->get();
       if($funcionario->count()>0  and $foto->count()>0 ){
        $view = \view('rrhh/funcionario/planillarrhh', compact('foto','edad','datos_funcionario','familiar','cursos','laboral','idiomas','cuentas','educacion'));
       
       $pdf = App::make('dompdf.wrapper');
       $pdf->loadHTML($view)->setPaper('legal');
       return $pdf->download('planillarrhh'.'.pdf');
     }else{
        return redirect('rrhh/funcionario/datosedit')->with('advertencia', ' Debe completar al menos los datos personales, dirección de domicilio y el requisito de la foto tipo carnet para imprimir la PLANILLA DE ACTUALIZACION DE DATOS!!.');
     }
       
  
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   /* public function create()
    {
        $nacionalidades= Nacionalidad::All();
        $datos_funcionario=null;
       return view('rrhh/ver_trabajador',compact('nacionalidades','datos_funcionario'));
    }
    public function create_mov(Request $request,$cedula)
    {
      
        $nacionalidades= Nacionalidad::All();
        $tipo_trabajador= Tipo_Trabajador::All();
        $uni_adscripcion= Ubic_Administrativa::All();
        $tipo_mov= TipoMovimientos:: All();
        
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*','persona.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula)->get();
        $funcionario_id=null;
       // dd($request);
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
            $edad=Carbon::parse($funcionario->edad)->age;
        }
        $datos_funcionario= Funcionario::select('funcionario.id as funcionario_id',
        'funcionario.*','persona.*','funcionario.cargo as cargo','funcionario.id_oficina_administrativa'     ,
        'estado_civil.descripcion as est_civil','entidad.descripcion as estado_nac',
        'tipo_trabajador.descripcion as trabajador','ubic_administrativa.descripcion as administrativa',
        'ent.descripcion as ent_domi','municipio.nombre as muni_domi','parroquia.nombre as parr_domi','funcionario.id_tipo_funcionario as tipo_trabajador') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')    
        ->join('estado_civil','estado_civil.id','=','persona.id_estado_civil')  
        ->join('entidad','entidad.id','=','persona.estado_nac') 
        ->JOIN('tipo_trabajador','tipo_trabajador.id','funcionario.id_tipo_funcionario')      
        ->JOIN('ubic_administrativa','ubic_administrativa.id','funcionario.id_oficina_administrativa')          
        ->join('entidad as ent','ent.id','=','funcionario.estado_domicilio') 
        ->join('municipio','municipio.id','=','funcionario.municipio_domicilio')     
        ->join('parroquia','parroquia.id','=','funcionario.parroquia_domicilio')             
        ->where('persona.numero_identificacion','=',$cedula)->get();     
       // var_dump($datos_funcionario) ;
        
       return view('rrhh/registrar_rrhh',compact('cedula','nacionalidades','datos_funcionario','edad','tipo_trabajador','uni_adscripcion','tipo_mov'));
    } 
    public function edit_mov($id)
    {
      
        $nacionalidades= Nacionalidad::All();
        $tipo_trabajador= Tipo_Trabajador::All();
        $uni_adscripcion= Ubic_Administrativa::All();
        $tipo_mov= TipoMovimientos:: All();
        
       
        $rrhh= RrhhMovimientos::Select('*')->where('id','=',$id)->get() ;
       // var_dump($rrhh) ;
        
       return view('rrhh/registrar_rrhhedit',compact('nacionalidades','rrhh','tipo_trabajador','uni_adscripcion','tipo_mov'));
    } 
    public function store_mov(Request $request)
    {
       // dd($request);
        $request->validate([
            
            'funcionario_id' => ['required'],
            'cedula' => ['required'],
            'id_tipo_trabajador'=>['required'],
            'cargo'=>['required', 'string', 'max:100'],
            'id_oficina_administrativa'=>['required'],
            'fechamov'=>['required'],
            'tipo_mov'=>['required'],
            'institucion'=>['required', 'string', 'max:155'],
            
        ]);
        $consulta= RrhhMovimientos::Select('*')->where('id_tipo_mov','=',$request->tipo_mov)
        ->where('id_oficina_administrativa','=',$request->id_oficina_administrativa)->get() ;
        if($consulta->count()==0){
        $rrhh = new RrhhMovimientos();        
        $rrhh->funcionario_id = $request->funcionario_id;
        $rrhh->cedula = $request->cedula;
        $rrhh->id_tipo_funcionario = $request->id_tipo_trabajador;          
        $rrhh->cargo = $request->cargo;    
        $rrhh->id_oficina_administrativa = $request->id_oficina_administrativa;  
        $rrhh->fechamov = $request->fechamov;  
        $rrhh->id_tipo_mov = $request->tipo_mov;  
        $rrhh->institucion = $request->institucion;        
        $rrhh->registrado_por = Auth::user()->cedula;   
        $rrhh->usuario_id_create = Auth::user()->id;   
        $rrhh->save();

        $funcionario=Funcionario::where('id', $request->funcionario_id)
        ->update([            
            'id_tipo_funcionario'=> $request->id_tipo_trabajador,
            'id_oficina_administrativa' => $request->id_oficina_administrativa,
            'cargo' =>$request->cargo                             
        ]);
        return    redirect()->back()->with('message', ' El movimiento del Trabajador(a) fue agregado con éxito!!.');
        }else{
            return    redirect()->back()->with('error', ' El tipo de movimiento se encuentra registrado');
        }
        
        
    }
    public function update_mov(Request $request)
    {
        //dd($request);
        $request->validate([           
            
            'id_tipo_trabajador'=>['required'],
            'cargo'=>['required', 'string', 'max:100'],
            'id_oficina_administrativa'=>['required'],
            'fechamov'=>['required'],
            'tipo_mov'=>['required'],
            'institucion'=>['required', 'string', 'max:155'],            
        ]);
        $consulta= RrhhMovimientos::Select('*')->where('id_tipo_mov', '=', $request->tipo_mov)
        ->where('id_oficina_administrativa', '=', $request->id_oficina_administrativa)
        ->where('id', '!=', $request->id_rrhh_mov)
        ->where('fechamov', '=', $request->fechamov)->get();
      
        if($consulta->count()==0){
            $rrhh_mov=RrhhMovimientos::where('id', $request->id_rrhh_mov)
            ->update([            
                'id_tipo_funcionario'=> $request->id_tipo_trabajador,
                'id_oficina_administrativa' => $request->id_oficina_administrativa,
                'cargo' =>$request->cargo ,
                'fechamov' =>  $request->fechamov,  
                'id_tipo_mov'    =>  $request->tipo_mov,            
                'actualizado_por'=>Auth::user()->cedula,
                'usuario_id_update'=> Auth::user()->id, 
            ]);
            return redirect()->back()->with('message', ' El movimiento del Trabajador(a) fue actualizado con éxito!!.');
        }else{
            return redirect()->back()->with('error', ' El tipo de movimiento se encuentra registrado');
        }                
    }
    public function movimientos(Request $request,$cedula)
    {       
        //  dd($cedula);
       $cedula_usuario= $cedula;
    
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*','persona.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula_usuario)->get();
        $funcionario_id=null;
        $laboral=null;
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
            $edad=Carbon::parse($funcionario->edad)->age;
        }
        $datos_funcionario= Funcionario::select('funcionario.id as funcionario_id',
        'funcionario.*','persona.*','funcionario.cargo as cargo','funcionario.id_oficina_administrativa'     ,
        'estado_civil.descripcion as est_civil','entidad.descripcion as estado_nac',
        'tipo_trabajador.descripcion as trabajador','ubic_administrativa.descripcion as administrativa',
        'ent.descripcion as ent_domi','municipio.nombre as muni_domi','parroquia.nombre as parr_domi') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')    
        ->join('estado_civil','estado_civil.id','=','persona.id_estado_civil')  
        ->join('entidad','entidad.id','=','persona.estado_nac') 
        ->JOIN('tipo_trabajador','tipo_trabajador.id','funcionario.id_tipo_funcionario')      
        ->JOIN('ubic_administrativa','ubic_administrativa.id','funcionario.id_oficina_administrativa')          
        ->join('entidad as ent','ent.id','=','funcionario.estado_domicilio') 
        ->join('municipio','municipio.id','=','funcionario.municipio_domicilio')     
        ->join('parroquia','parroquia.id','=','funcionario.parroquia_domicilio')             
        ->where('persona.numero_identificacion','=',$cedula_usuario)->get();      
       $nacionalidades= Nacionalidad::All();
       $movimiento=RrhhMovimientos::Select('*','rrhh_movimientos.id as id_rrhh_mov','tipo_trabajador.descripcion as tipo_trabajador','ubic_administrativa.descripcion as ubic_administrativa','tipo_movimientos.descripcion as tipo_mov') 
       ->JOIN('tipo_trabajador','tipo_trabajador.id','rrhh_movimientos.id_tipo_funcionario')      
       ->JOIN('ubic_administrativa','ubic_administrativa.id','rrhh_movimientos.id_oficina_administrativa') 
       ->JOIN('tipo_movimientos','tipo_movimientos.id','rrhh_movimientos.id_tipo_mov') 
       ->where('rrhh_movimientos.cedula','=',$cedula_usuario)
       ->orderBy('rrhh_movimientos.created_at','desc')->get();      
       if($datos_funcionario->count()>0){      
           return view('rrhh/movimientos', compact('datos_funcionario','nacionalidades','edad', 'movimiento','cedula_usuario'));
        }else {
            return redirect('rrhh/ver_trabajador') 
             ->with('advertencia', 'No hay resultados que mostrar.');             
        }
    }
    public function search($search)
    {
        //      
        $search = urldecode($search);
        $cedula_usuario= $search;
      //  dd($search);
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*','persona.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula_usuario)->get();
        $funcionario_id=null;
        $laboral=null;
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
            $edad=Carbon::parse($funcionario->edad)->age;
        }
        $datos_funcionario= Funcionario::select('funcionario.id as funcionario_id',
        'funcionario.*','persona.*','funcionario.cargo as cargo','funcionario.id_oficina_administrativa'     ,
        'estado_civil.descripcion as est_civil','entidad.descripcion as estado_nac',
        'tipo_trabajador.descripcion as trabajador','ubic_administrativa.descripcion as administrativa',
        'ent.descripcion as ent_domi','municipio.nombre as muni_domi','parroquia.nombre as parr_domi') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')    
        ->join('estado_civil','estado_civil.id','=','persona.id_estado_civil')  
        ->join('entidad','entidad.id','=','persona.estado_nac') 
        ->JOIN('tipo_trabajador','tipo_trabajador.id','funcionario.id_tipo_funcionario')      
        ->JOIN('ubic_administrativa','ubic_administrativa.id','funcionario.id_oficina_administrativa')          
        ->join('entidad as ent','ent.id','=','funcionario.estado_domicilio') 
        ->join('municipio','municipio.id','=','funcionario.municipio_domicilio')     
        ->join('parroquia','parroquia.id','=','funcionario.parroquia_domicilio')             
        ->where('persona.numero_identificacion','=',$cedula_usuario)->get();      
       $nacionalidades= Nacionalidad::All();
       if($datos_funcionario->count()>0){
      
           return view('rrhh/ver_trabajador', compact('datos_funcionario','nacionalidades','edad'));
        }else {
            return redirect('rrhh/ver_trabajador') 
             ->with('advertencia', 'No hay resultados que mostrar.');             
        }
    }
    public function search_datos( $cedula)
    {
        //      
       
        $cedula_usuario= $cedula;
       // dd($cedula_usuario);
      
      $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*','persona.*') 
      ->join ('persona', 'persona.id','=','funcionario.persona_id')        
      ->where('persona.numero_identificacion','=',$cedula_usuario)->get();
      $funcionario_id=null;
      $laboral=null;
      foreach($funcionario as $funcionario){
          $funcionario_id=$funcionario->funcionario_id;
          $edad=Carbon::parse($funcionario->edad)->age;

      }
      $datos_funcionario= Funcionario::select('funcionario.id as funcionario_id',
      'funcionario.*','persona.*','funcionario.cargo as cargo','funcionario.id_oficina_administrativa'     ,
      'estado_civil.descripcion as est_civil','entidad.descripcion as estado_nac',
      'tipo_trabajador.descripcion as trabajador','ubic_administrativa.descripcion as administrativa',
      'ent.descripcion as ent_domi','municipio.nombre as muni_domi','parroquia.nombre as parr_domi') 
      ->join ('persona', 'persona.id','=','funcionario.persona_id')    
      ->join('estado_civil','estado_civil.id','=','persona.id_estado_civil')  
      ->join('entidad','entidad.id','=','persona.estado_nac') 
      ->JOIN('tipo_trabajador','tipo_trabajador.id','funcionario.id_tipo_funcionario')      
      ->JOIN('ubic_administrativa','ubic_administrativa.id','funcionario.id_oficina_administrativa')          
      ->join('entidad as ent','ent.id','=','funcionario.estado_domicilio') 
      ->join('municipio','municipio.id','=','funcionario.municipio_domicilio')     
      ->join('parroquia','parroquia.id','=','funcionario.parroquia_domicilio')             
      ->where('persona.numero_identificacion','=',$cedula_usuario)->get();

    
      $laboral=Laboral::select('*')->where('laboral.funcionario_id','=',$funcionario_id)->paginate(5);
      $educacion= Educacion_funcionarios::where('funcionario_id',$funcionario_id)->get();
      $cursos=Cursos::select('*')->where('cursos.funcionario_id','=',$funcionario_id)->paginate(15);
      $familiar  =   Familiares::select ('*','familiares.id as id_familiar','familiares.persona_id as id_persona', 'nacionalidad.cod as nacionalidad',
      'parentezco.descripcion as parentezco','familiares.ocupacion as ocupacion_fam')
      ->join ('funcionario', 'familiares.funcionario_id','=','funcionario.id')
      ->join ('persona', 'persona.id','=','familiares.persona_id')
      ->join ('nacionalidad', 'nacionalidad.id','=','persona.id_nacionalidad')
      ->join ('parentezco', 'parentezco.id','=','familiares.parentezco_id')
      ->join ('genero', 'persona.id_genero','=','genero.id')
      ->where('familiares.funcionario_id','=',$funcionario_id)->paginate(5);
      $idiomas=Idiomas::select('*')->where('idiomas.funcionario_id','=',$funcionario_id)->paginate(5);
      $cuentas=Cuentas_bancarias::select('*')->where('cuentas_bancarias.funcionario_id','=',$funcionario_id)->paginate(5);
      $usuario= User::where('cedula','=',$cedula_usuario)
      ->whereIn('id_usuariogrupo',[11,12])->get();
     
      foreach($usuario as  $usuario){
      $foto = ImagenUpload::select('*')      
      ->where('usuario', '=',$usuario->id)
      ->where('nombre', '=','foto')
      ->get();
      }
     
     if($datos_funcionario->count()>0 && $foto->count()>0 ){
      $view = \view('rrhh/funcionario/planillarrhh', compact('foto','edad','datos_funcionario','familiar','cursos','laboral','idiomas','cuentas','educacion'));
     
     $pdf = App::make('dompdf.wrapper');
     $pdf->loadHTML($view)->setPaper('legal');
     return $pdf->download('planillarrhh'.'.pdf');
   }else{
      return redirect('rrhh/ver_trabajador')->with('advertencia', ' Debe completar los datos para imprimir la PLANILLA DE ACTUALIZACION DE DATOS!!.');
   }
     
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function destroy($id)
    {
        //
    }

    */

}