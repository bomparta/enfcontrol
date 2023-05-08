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
use App\TipoMovimientosRRHH;
use App\Administracion_publica;
use App\Vacaciones_pendientes;
use App\Vacaciones_colectivas;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;
use Carbon\Carbon;
class RrhhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rrhh/homerrhh');
    }

    public function reporterrhh()
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
        ->whereIn('id_usuariogrupo',[11,12,10,9])->get();
       
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

        return view('rrhh.requisitos_trab',compact('nombres','apellidos','cedula_usuario','nacionalidad','familiar','rif','carnet','laboral','cursos','foto','cedula','partida','matrimonio','constancia','horario','curriculum','titulo'));
        
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
          
if($tipo_documento!='adm_pub_constancia'){

    $rrhh=RrhhMovimientos::Select('*','rrhh_movimientos.id as id_rrhh_mov','tipo_trabajador.descripcion as tipo_trabajador','ubic_administrativa.descripcion as ubic_administrativa','tipo_movimientos.descripcion as tipo_mov','rrhh_movimientos.cargo as cargo_mov') 
    ->JOIN('tipo_trabajador','tipo_trabajador.id','rrhh_movimientos.id_tipo_funcionario')      
    ->JOIN('ubic_administrativa','ubic_administrativa.id','rrhh_movimientos.id_oficina_administrativa') 
    ->JOIN('tipo_movimientos','tipo_movimientos.id','rrhh_movimientos.id_tipo_mov') 
    ->JOIN('funcionario','funcionario.id','rrhh_movimientos.funcionario_id') 
    ->JOIN('persona','persona.id','funcionario.persona_id') 
    ->where('rrhh_movimientos.id', '=',$id_rrhh_mov)
    ->get();
   }else{
    $rrhh=Administracion_publica::Select('*','administracion_publica.id as adm_id','tipo_trabajador.descripcion as tipo_trabajador') 
    ->JOIN('tipo_trabajador','tipo_trabajador.id','administracion_publica.id_tipo_funcionario')        
    ->JOIN('funcionario','funcionario.id','administracion_publica.funcionario_id')  
    ->JOIN('persona','persona.id','funcionario.persona_id')     
    ->where('administracion_publica.id','=',$id_rrhh_mov)
    ->get();      ;
    return view('rrhh.creardocumento_rrhh',compact('tipo_documento','id_rrhh_mov','rrhh','rrhh_mov','cedula'));
    }

return view('rrhh.creardocumento_rrhh',compact('tipo_documento','id_rrhh_mov','rrhh','rrhh_mov','cedula'));
}
public function subirArchivo_rrhh(Request $request)
{
        //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
       // $request->file('archivo')->store('public/foto_carnet');
       // dd($request);
       if ($request->tipo_documento!='adm_pub_constancia'){
            if($request->hasfile('archivo')){
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
            }
        }else{
            if($request->tipo_documento=='adm_pub_constancia'){ //documento de antecedente de servicio
                if($request->hasfile('archivo')){
                    $imagen         = $request->file('archivo');
                    $nombreimagen   = $imagen.".".$imagen->guessExtension();
                    $ruta           = $request->file('archivo')->store('public/documentos_rrhh/'.$request->tipo_documento);
                    $imagen->move($ruta,$nombreimagen);  
                    //dd($request);

                    $id= Auth::user()->id;
                    Administracion_publica::where ('id',$request->rrhh_mov_id)
                    ->update([                                  
                    'ruta_documento'=>  $ruta,
                    'nombre_documento'=>$request->tipo_documento,
                    'actualizado_por' => Auth::user()->cedula   
                    ]);
                    return  redirect()->back()->with('message', 'Se adjunto la constancia o antecedente de servicio con exito!! .');
                }          
            }
            return  redirect()->back()->with('error', 'No se adjunto el documento correctamente.');
     
        }
      
     
}
    public function planillarrhh()
    {
      /*se instalo composer require barryvdh/laravel-dompdf 
        * se coloco en 'providers' este codigo  Barryvdh\DomPDF\ServiceProvider::class,
        * y en 'aliases' se coloco esto 'PDF' => Barryvdh\DomPDF\Facade::class,
        */
        $cedula_usuario=Auth::user()->cedula;
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
     if(count($foto)>0 && count($datos_funcionario)>0){
        $view = \view('rrhh/funcionario/planillarrhh', compact('foto','edad','datos_funcionario','familiar','cursos','laboral','idiomas','cuentas','educacion'));
       
       $pdf = App::make('dompdf.wrapper');
       $pdf->loadHTML($view)->setPaper('legal');
       return $pdf->download('planillarrhh'.'.pdf');     
     }else{
        return  redirect()->back()->with('error', 'Debe completar los datos y requisitos, para generar la Planilla de Actualización de Datos!! .');
     }
       
  
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $tipo_mov= TipoMovimientosRRHH:: All();
        
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
        ->join('tipo_trabajador','tipo_trabajador.id','funcionario.id_tipo_funcionario')      
        ->join('ubic_administrativa','ubic_administrativa.id','funcionario.id_oficina_administrativa')          
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
        $tipo_mov=  TipoMovimientosRRHH:: All();
        
       
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
    public function antecedentes(Request $request,$cedula)
    {       
        //  dd($cedula);
       $cedula_usuario= $cedula;
    
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*','persona.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula_usuario)->get();
        $funcionario_id=null;
       
        $tipo_trabajador= Tipo_Trabajador::All();
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
       $adm_pub=Administracion_publica::Select('*','administracion_publica.id as adm_id','tipo_trabajador.descripcion as tipo_trabajador') 
       ->JOIN('tipo_trabajador','tipo_trabajador.id','administracion_publica.id_tipo_funcionario')             
       ->where('administracion_publica.funcionario_id','=',$funcionario_id)
       ->orderBy('administracion_publica.fecha_ingreso','asc')->get();    
       $annos=$meses=$dias=0;  
       $annos=Administracion_publica::where('administracion_publica.funcionario_id','=',$funcionario_id)->sum('anno_servicios','meses_servicios','dias_servicios');  
       $meses=Administracion_publica::where('administracion_publica.funcionario_id','=',$funcionario_id)->sum('meses_servicios');  
       $dias=Administracion_publica::where('administracion_publica.funcionario_id','=',$funcionario_id)->sum('dias_servicios');  
       
      if($dias >30)$dias=$dias%30;$meses=$meses+1;
      if($meses >=12)$meses=$meses%12;
      if($meses>0)$annos=$annos+1;
      //dd($annos,$meses,$dias);
 
       if($datos_funcionario->count()>0){      
           return view('rrhh/registrar_adm_publica', compact('annos','meses','dias','datos_funcionario','adm_pub','nacionalidades','tipo_trabajador','edad','cedula'));
        }else {
            return redirect('rrhh/ver_trabajador') 
             ->with('advertencia', 'No hay resultados que mostrar.');             
        }
    }
    public function store_antecedentes(Request $request)
    {
       // dd($request);
        $request->validate([
            
            'funcionario_id' => ['required'],
            'institucion' => ['required','string', 'max:155'],
            'id_tipo_trabajador'=>['required'],
            'ult_cargo'=>['required', 'string', 'max:100'],            
            'fechaingreso'=>['required'],
            'fechaegreso'=>['required'],
            'tipo_documento'=>['required'],
          //  'archivo'=>['required'],    
            
        ]);
    //     dd($request->all());
    
       
        $inicio=$request->fechaingreso;
        $fin=$request->fechaegreso;
        $error=$this->validar($inicio,$fin,$request->funcionario_id,$request->adm_pub_id);   
      $dias=0;$meses=0;$annos=0;
 
        $inicio = Carbon::parse($request->fechaingreso);
        $fin = Carbon::parse($request->fechaegreso);
        
        $dias = $inicio->diffInDays($fin);
        $dias=$dias%30;
        $meses = $inicio->diffInMonths($fin);
        $meses = $meses%12;
        $annos = $inicio->diffInYears($fin);
       
        $dias=$dias%30;
        //dd($dias,$meses,$annos);
        if($error==''){
            $antecedentes = new Administracion_publica();        
            $antecedentes->funcionario_id = $request->funcionario_id;
            $antecedentes->organismo = $request->institucion;
            $antecedentes->id_tipo_funcionario = $request->id_tipo_trabajador;          
            $antecedentes->ult_cargo = $request->ult_cargo;    
            $antecedentes->fecha_ingreso = $request->fechaingreso;              
            $antecedentes->fecha_egreso = $request->fechaegreso;      
            $antecedentes->dias_servicios = $dias;    
            $antecedentes->meses_servicios = $meses;   
            $antecedentes->anno_servicios = $annos;                         
            $antecedentes->registrado_por = Auth::user()->cedula;   
            $antecedentes->usuario_id_create = Auth::user()->id;    
            $antecedentes->observaciones = $request->observaciones;           
         
            $antecedentes->save();

            $funcionario=Funcionario::where('id', $request->funcionario_id)
            ->update([            
                'fecha_ingreso_adm'=> $request->fecha_ingreso_adm,
                'fecha_ingreso_fund' => $request->fecha_ingreso_fund,
                'fecha_ingreso_vac' =>$request->fecha_ingreso_vac ,                            
                
            ]);

            return    redirect()->back()->with('message', ' El Antecedente de servicio del Trabajador(a) en la administración pública fue agregado con éxito!!.');
            
            //}else{
           //     return    redirect()->back()->with('message', ' Problemas para subir el archivo.');
        
       
          
        }else{
            return    redirect()->back()->with('error',$error);
        }
        
        
    }
    public function update_antecedentes(Request $request)
    {
       // dd($request);
        $request->validate([
            
          
            'institucion' => ['required','string', 'max:155'],
            'id_tipo_trabajador'=>['required'],
            'ult_cargo'=>['required', 'string', 'max:100'],            
            'fechaingreso'=>['required'],
            'fechaegreso'=>['required'],
          
        
        ]);
    //     dd($request->all());

        $inicio=$request->fechaingreso;
        $fin=$request->fechaegreso;
        $error=$this->validar($inicio,$fin,$request->funcionario_id,$request->adm_pub_id);    
        $inicio = Carbon::parse($request->fechaingreso);
        $fin = Carbon::parse($request->fechaegreso);
        $dias=0;$meses=0;$annos=0;
        $dias = $inicio->diffInDays($fin);
        $dias=$dias%30;
        $meses = $inicio->diffInMonths($fin);
        $meses = $meses%12;
        $annos = $inicio->diffInYears($fin);
    
        if( $error==''){
            $antecedentes = Administracion_publica::where('id',$request->adm_pub_id)
            ->update([            
                'id_tipo_funcionario'=> $request->id_tipo_trabajador,
                'organismo' => $request->institucion,
                'ult_cargo' => $request->ult_cargo,   
                'fecha_ingreso' => $request->fechaingreso,   
                'fecha_egreso' => $request->fechaegreso,   
               'dias_servicios' => $dias,
                'meses_servicios' => $meses,
                'anno_servicios' => $annos,   
                'observaciones' => $request->observaciones,
                'actualizado_por'=>Auth::user()->cedula,
                'usuario_id_update'=> Auth::user()->id, 
            ]);
           
            return    redirect()->back()->with('message', ' El Antecedente de servicio del Trabajador(a) en la administración pública fue actualizado con éxito!!.');
       
        }else{
            return    redirect()->back()->with('advertencia',$error);
        }
        
        
    }
    public function validar($inicio,$fin,$id_funcionario,$id_adm_pub)
    {
        $error='';
           
       $consulta1= Administracion_publica::Select('*')->where('fecha_ingreso','=', $inicio)
                                                    ->where('administracion_publica.funcionario_id','=',$id_funcionario)
                                                    ->where('administracion_publica.id','<>',$id_adm_pub)
                                                    ->get();
                                                   
        if($consulta1->count()>0){
            $error.= '*-La Fecha de Ingreso ('.$inicio.') que desea cargar ya se encuentra registrada para este trabajador';
        }
        $consulta2= Administracion_publica::Select('*')->where('fecha_egreso','<', $fin)
                                                        ->where('fecha_ingreso','>', $inicio)
                                                    ->where('administracion_publica.funcionario_id','=',$id_funcionario)
                                                    ->where('administracion_publica.id','<>',$id_adm_pub)
                                                    ->get();
        
                                                   
        if($consulta2->count()>0){
            $error.= '*-La Fecha de Ingreso ('.$inicio.')  y la Fecha de Egreso ('.$fin.') ya esta cargada en otro periodo';
        }

        if($fin >=now()){
            $error.='*- Fecha de Egreso ('.$inicio.') es mayor a la fecha actual.';           
          }
        if($inicio==$fin){
          $error.='*- Fecha de Ingreso ('.$inicio.') es Igual a la Fecha de Egreso ('.$fin.').';           
        }
        if($inicio>$fin){
            $error.='*- Fecha de Ingreso ('.$inicio.') es mayor a la Fecha de Egreso ('.$fin.'). ';
        }
        if($fin < $inicio){
            $error.='*- Fecha de Egreso ('.$fin.') es menor a la Fecha de Ingreso ('.$inicio.').';
        }
        return $error;
    }
    public function antecedentes_edit(Request $request,$id,$cedula)
    {       
        //  dd($cedula);
       $cedula_usuario= $cedula;
       $tipo_trabajador= Tipo_Trabajador::All();
       
       $adm_pub=Administracion_publica::Select('*','administracion_publica.id as adm_id','tipo_trabajador.descripcion as tipo_trabajador') 
       ->JOIN('tipo_trabajador','tipo_trabajador.id','administracion_publica.id_tipo_funcionario')             
       ->where('administracion_publica.id','=',$id)
       ->get();      
       if($adm_pub->count()>0){      
           return view('rrhh/registrar_adm_publica_edit', compact('adm_pub','tipo_trabajador','cedula'));
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
      ->whereIn('id_usuariogrupo',[11,12,9,10])->get();
     
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
    public function vac_pendientes_rrhh(Request $request,$cedula)
    {       
        //  dd($cedula);
       $cedula_usuario= $cedula;
    
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*','persona.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula_usuario)->get();
        $funcionario_id=null;
       
        $tipo_trabajador= Tipo_Trabajador::All();
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
            $edad=Carbon::parse($funcionario->edad)->age;
            $fecha_ingreso_vac=$funcionario->fecha_ingreso_vac;
           if($fecha_ingreso_vac!=null){
            $annos_servicio=Carbon::parse($funcionario->fecha_ingreso_vac)->age;
           }else{
            $annos_servicio=-1;
           }
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
       // dd($datos_funcionario);   
       $nacionalidades= Nacionalidad::All();
       $vacaciones=  Vacaciones_pendientes::select('vacaciones.vacaciones_pendientes.*')      
      ->where('vacaciones.vacaciones_pendientes.funcionario_id','=',$funcionario_id)
      ->orderby('vacaciones.vacaciones_pendientes.lapso_disfrute','ASC')->get();  
      $annos=0;$meses=0;$dias=0;      
      $annos=Administracion_publica::where('administracion_publica.funcionario_id','=',$funcionario_id)->sum('anno_servicios','meses_servicios','dias_servicios');  
      $meses=Administracion_publica::where('administracion_publica.funcionario_id','=',$funcionario_id)->sum('meses_servicios');  
      $dias=Administracion_publica::where('administracion_publica.funcionario_id','=',$funcionario_id)->sum('dias_servicios');  
   
     if($dias >30)$dias=$dias%30;$meses=$meses+1;
     if($meses >=12)$meses=$meses%12;
     if($meses>0)$annos=$annos+1;
       if($datos_funcionario->count()>0){    
          
           return view('rrhh/registrar_vac_pendientes', compact('datos_funcionario','annos','meses','dias','annos_servicio','vacaciones','nacionalidades','tipo_trabajador','edad','cedula'));
        }else {
            return redirect('rrhh/ver_trabajador') 
             ->with('advertencia', 'No hay resultados que mostrar.');             
        }
    }
    public function vac_pendientes_rrhh_edit(Request $request,$id,$cedula)
    {       
        //  dd($cedula);
  
    
        $datos_funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*','persona.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula)->get();
      //  dd($funcionario);
        $funcionario_id=null;

        foreach($datos_funcionario as $datos_funcionario){
            $funcionario_id=$datos_funcionario->funcionario_id;
            $edad=Carbon::parse($datos_funcionario->edad)->age;
            $fecha_ingreso_vac=$datos_funcionario->fecha_ingreso_vac;
            $annos_servicio=Carbon::parse($datos_funcionario->fecha_ingreso_vac)->age;
        }

        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.id_tipo_funcionario as tipo_funcionario_id','funcionario.*','persona.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('funcionario.id','=',$funcionario_id)->first();
       // dd($funcionario);
       $vacaciones=  Vacaciones_pendientes::select('vacaciones.vacaciones_pendientes.*')      
      ->where('vacaciones.vacaciones_pendientes.funcionario_id','=',$funcionario_id)
      ->where('vacaciones.vacaciones_pendientes.id','=',$id)
      ->orderby('vacaciones.vacaciones_pendientes.lapso_disfrute','ASC')->get();  

       if($funcionario->count()>0){    
          
           return view('rrhh/registrar_vac_pendientesedit', compact('funcionario','annos_servicio','vacaciones','cedula'));
        }else {
            return redirect('rrhh/ver_trabajador') 
             ->with('advertencia', 'No hay resultados que mostrar.');             
        }
    }
    public function store_vac_pendientes(Request $request)
    {
       // dd($request);
        $request->validate([
            
            'funcionario_id' => ['required'],    
            'fecha_ingreso_vac' => ['required'], 
            'tipo_trabajador' => ['required'],      
            'lapso_disfrute'=>['required'],
            'dias_adisfrutar'=>['required'],            
            'dias_pendientes'=>['required'],       
            
        ]);
        
        $existe_lapso=Vacaciones_pendientes::where('lapso_disfrute','=',$request->lapso_disfrute)
        ->where('funcionario_id',$request->funcionario_id)->get();  
       // dd($existe_lapso);
        if(count($existe_lapso)>0){
            return    redirect()->back()->with('error', ' El Lapso de Disfrute del Trabajador(a) que desea cargar  se encuentra registrado!!.');     
        }else{
            $ingreso= date("Y-d-m",strtotime($request->fecha_ingreso_vac));
            $actual=date("Y-d-m");
            $anno_ingreso=date("Y",strtotime($request->fecha_ingreso_vac));
            $mes_ingreso=date("m",strtotime($request->fecha_ingreso_vac));
            $dia_ingreso=date("d",strtotime($request->fecha_ingreso_vac));
            $anno_actual=date("Y");
         // dd($ingreso,$actual);
        
          // dd($ingreso,$actual,$anno_ingreso,$request->lapso_disfrute);
            if($request->lapso_disfrute <= $anno_ingreso ){
                return    redirect()->back()->with('error', 'El Lapso de Disfrute del Trabajador(a)  no puede ser registrado.Su fecha para el disfrute de vacaciones es apartir del día , mes y año de aniversario en la FENFMP.');
            }else{            
                if( ($actual>=$ingreso && $actual<=$ingreso) || (($request->lapso_disfrute >= $anno_ingreso) && ($anno_ingreso <= $request->lapso_disfrute) && $request->lapso_disfrute<=$anno_actual) ){
                $pendientes = new Vacaciones_pendientes();        
                $pendientes->funcionario_id = $request->funcionario_id;
                $pendientes->lapso_disfrute = $request->lapso_disfrute;
                $pendientes->dias_adisfrutar = $request->dias_adisfrutar;          
                $pendientes->dias_pendientes = $request->dias_pendientes;    
                $pendientes->observaciones_rrhh = $request->observaciones;  
                $pendientes->registrado_por = Auth::user()->cedula; 
                $pendientes->save();
                return    redirect()->back()->with('message', 'El Lapso de Disfrute del Trabajador(a) fue agregado con éxito!!.');
                } else{
                    return    redirect()->back()->with('error', 'El Lapso de Disfrute del Trabajador(a)  que desea registrar no corresponde al intervalo vigente de vacaciones. Su fecha para el disfrute de vacaciones es apartir del día , mes y año de aniversario');
                }
            }
        }
        
        
    }
    public function update_vac_pendientes(Request $request)
    {
       // dd($request);
        $request->validate([
            'funcionario_id' => ['required'],  
            'id_vacaciones' => ['required'],        
            'lapso_disfrute'=>['required'],
            'dias_adisfrutar'=>['required'],            
            'dias_pendientes'=>['required'], 
        ]);
        $existe_lapso=Vacaciones_pendientes::where('lapso_disfrute','!=',$request->lapso_disfrute)
                                            ->where('id',$request->id_vacaciones)->get();
  
        if(count($existe_lapso)>0){
            return    redirect()->back()->with('error', ' El Lapso de Disfrute del Trabajador(a) que desea cargar  se encuentra registrado!!.');     
        }else{
            $pendientes =  Vacaciones_pendientes::where('id',$request->id_vacaciones)
            ->update([     

                'funcionario_id'=> $request->funcionario_id,
                'lapso_disfrute' => $request->lapso_disfrute,
                'dias_adisfrutar' => $request->dias_adisfrutar,   
                'dias_pendientes' => $request->dias_pendientes,   
                'observaciones_rrhh' => $request->observaciones,                 
                'actualizado_por'=>Auth::user()->cedula,
               
            ]);
           
            return    redirect()->back()->with('message', ' El Lapso de Disfrute del Trabajador(a) fue actualizado con éxito!!.');
       
        }
        
        
    } 

  
        public function destroy($id)
        {
            //dd($id);
            $adm_pub = Administracion_publica::findOrFail($id);
            
            $adm_pub->delete();
    
            return    redirect()->back()->with('message', ' El Antecedente de servicio del Trabajador(a) en la administración pública fue eliminado con éxito!!.');
        }
        public function destroy_vac_pendientes($id)
        {
            //dd($id);
            $pendientes = Vacaciones_pendientes::findOrFail($id);
            
            $pendientes->delete();
    
            return    redirect()->back()->with('message', ' El Lapso pendiente de vacaciones del Trabajador(a) fue eliminado con éxito!!.');
        }
        public function vac_colectivas(Request $request)
        {       
            $tipo_trabajador= Tipo_Trabajador::All();
            $uni_adscripcion= Ubic_Administrativa::All();
            $colectivas= Vacaciones_colectivas:: select ('vacaciones.vacaciones_colectivas.*', 
             'tipo_trabajador.descripcion as trabajador','ubic_administrativa.descripcion as ubicacion')
             ->JOIN('tipo_trabajador','tipo_trabajador.id','vacaciones.vacaciones_colectivas.id_tipo_funcionario')      
             ->JOIN('ubic_administrativa','ubic_administrativa.id','vacaciones.vacaciones_colectivas.id_oficina_administrativa')           
            ->get();
          return view('rrhh/registrar_vac_colectivas', compact('tipo_trabajador','uni_adscripcion','colectivas'));
          
        }
        public function store_vac_colectivas(Request $request)
        {
           // dd($request);
            $request->validate([
            
                
                'id_oficina_administrativa' => ['required'],    
                'id_tipo_trabajador' => ['required'], 
            
                'lapso_disfrute'=>['required'],
                'dias_adescontar'=>['required'],            
              
                
            ]);
            
            $existe_lapso=Vacaciones_colectivas::where('lapso_disfrute','=',$request->lapso_disfrute)->get();  
           // dd($existe_lapso);
            if(count($existe_lapso)>0){
                return    redirect()->back()->with('error', ' El Lapso de Disfrute Colectivo que desea cargar  se encuentra registrado!!.');     
            }else{               
                $anno_actual=date("Y");       
                if($request->lapso_disfrute > $anno_actual ){
                    return    redirect()->back()->with('error', 'El Lapso de Disfrute Colectivo no puede ser registrado. Es mayor al año actual.');
                }else{            
                    $colectivas = new Vacaciones_colectivas();        
                    $colectivas->id_oficina_administrativa = $request->id_oficina_administrativa;
                    $colectivas->lapso_disfrute = $request->lapso_disfrute;
                    $colectivas->dias_adescontar = $request->dias_adescontar;          
                    $colectivas->id_tipo_funcionario = $request->id_tipo_trabajador;    
                    $colectivas->observaciones = $request->observaciones;  
                    $colectivas->registrado_por = Auth::user()->cedula; 
                    $colectivas->save();
                    return    redirect()->back()->with('message', 'El Lapso de Disfrute Colectivo fue agregado con éxito!!.');                    
                }
            }
            
            
        }
        public function vac_colectivas_rrhh_edit(Request $request,$id)
        {       
            $tipo_trabajador= Tipo_Trabajador::All();
            $uni_adscripcion= Ubic_Administrativa::All();
           $colectivas=  Vacaciones_colectivas::select('vacaciones.vacaciones_colectivas.*')            
          ->where('vacaciones.vacaciones_colectivas.id','=',$id)
          ->orderby('vacaciones.vacaciones_colectivas.lapso_disfrute','ASC')->get();  
       
              
               return view('rrhh/registrar_vac_colectivasedit', compact('tipo_trabajador','uni_adscripcion','colectivas','id'));
          
        }
        public function update_vac_colectivas(Request $request)
        {
           // dd($request);
            $request->validate([
                'id_oficina_administrativa' => ['required'],    
                'id_tipo_trabajador' => ['required'],             
                'lapso_disfrute'=>['required'],
                'dias_adescontar'=>['required'],           
                'id_colectivas'=>['required'],  
            ]);
            Vacaciones_colectivas::where('id','=',$request->id_colectivas)->update([     
    
                'id_tipo_funcionario'=> $request->id_tipo_trabajador,
                'id_oficina_administrativa' => $request->id_oficina_administrativa,
                'dias_adescontar' => $request->dias_adescontar,                      
                'observaciones' => $request->observaciones,                 
                'actualizado_por'=>Auth::user()->cedula,
               
            ]);   
      
               
                return    redirect()->back()->with('message', ' El Lapso de Vacaciones Colectivas fue actualizado con éxito!!.');
           
        

            
            
        } 
        public function destroy_vac_colectivas($id)
        {
            //dd($id);
            $pendientes = Vacaciones_colectivas::findOrFail($id);
            
            $pendientes->delete();
    
            return    redirect()->back()->with('message', ' El Lapso de vacaciones colectivas fue eliminado con éxito!!.');
        }

}
