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
use App\Vacaciones_pendientes;
use App\Vacaciones_disfrutadas;
use App\Solicitud_vacaciones;
use App\User;
use App\RrhhMovimientos;
use App\TipoMovimientos;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Collection;
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
         
        $datos_funcionario  =   Funcionario::select('funcionario.id as funcionario_id',
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
   
     $vacaciones_solicitudes= Solicitud_vacaciones::select('vacaciones.solicitud_vacaciones.*')->join ('funcionario', 'funcionario.id','=','vacaciones.solicitud_vacaciones.funcionario_id') 
     ->join ('persona', 'persona.id','=','funcionario.persona_id') 
     ->where('persona.numero_identificacion','=',$cedula_usuario)->get();     

     if(count($datos_funcionario)>0){
      return view('rrhh.vacaciones.solicitud_vacaciones_edit',compact('vacaciones_solicitudes','datos_funcionario'));
    }else{
        return    redirect()->back()->with('error', ' Debe completar los datos básicos, para registrar su Solicitud de Vacaciones.');
      }
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
       // dd($funcionario);
       

        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
            $edad=Carbon::parse($funcionario->edad)->age;
            $fecha_ingreso_vac=$funcionario->fecha_ingreso_vac;
            if(is_null($funcionario->fecha_ingreso_vac)){
                $annos_solicitud='sin_adm';
            }else{
                $annos_solicitud=Carbon::parse($funcionario->fecha_ingreso_vac)->age;
             
            }
        }
     
      //  dd($fecha_ingreso_vac,  $annos_solicitud);
        $lapso= Vacaciones_pendientes::select('vacaciones.vacaciones_pendientes.*') ->where('vacaciones.vacaciones_pendientes.funcionario_id','=',$funcionario_id)
                                        ->where('vacaciones.vacaciones_pendientes.status','=',1)
                                        ->orderby('lapso_disfrute','asc')->get();     

        $datos_funcionario= Funcionario::select('funcionario.id as funcionario_id','tipo_trabajador.id as id_tipo_trabajador',
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
        //var_dump($datos_funcionario) ;
      // dd($fecha_ingreso_vac);
     
      //dd($lapso);
      if(count($datos_funcionario)>0){
       return view('rrhh.vacaciones.registrar_solicitud',compact('cedula','annos_solicitud','nacionalidades','datos_funcionario','edad','tipo_trabajador','uni_adscripcion','lapso'));
      }else{
        return    redirect()->back()->with('error', ' Debe completar los datos básicos, para registrar su Solicitud de Vacaciones.');
      }
    } 
    public function ver_pendientes(Request $request)
    {
      
       $cedula=Auth::user()->cedula;
        
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*','persona.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula)->get();
        $funcionario_id=null;
       // dd($request);
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
            $edad=Carbon::parse($funcionario->edad)->age;
        }
        $pendientes= Vacaciones_pendientes::select('vacaciones.vacaciones_pendientes.*','funcionario.*','persona.*','funcionario.cargo as cargo','funcionario.id_oficina_administrativa'     ,
        'estado_civil.descripcion as est_civil','entidad.descripcion as estado_nac',
        'tipo_trabajador.descripcion as trabajador','ubic_administrativa.descripcion as administrativa',
        'ent.descripcion as ent_domi','municipio.nombre as muni_domi','parroquia.nombre as parr_domi','funcionario.id_tipo_funcionario as tipo_trabajador')     
        ->join ('funcionario', 'funcionario.id','=','vacaciones.vacaciones_pendientes.funcionario_id')   
        ->join ('persona', 'persona.id','=','funcionario.persona_id')    
        ->join('estado_civil','estado_civil.id','=','persona.id_estado_civil')  
        ->join('entidad','entidad.id','=','persona.estado_nac') 
        ->JOIN('tipo_trabajador','tipo_trabajador.id','funcionario.id_tipo_funcionario')      
        ->JOIN('ubic_administrativa','ubic_administrativa.id','funcionario.id_oficina_administrativa')          
        ->join('entidad as ent','ent.id','=','funcionario.estado_domicilio') 
        ->join('municipio','municipio.id','=','funcionario.municipio_domicilio')     
        ->join('parroquia','parroquia.id','=','funcionario.parroquia_domicilio')   
        ->where('vacaciones.vacaciones_pendientes.status','=',1)
       ->where('vacaciones.vacaciones_pendientes.funcionario_id','=',$funcionario_id)
       ->orderby('vacaciones.vacaciones_pendientes.lapso_disfrute','ASC')->get();    
       // var_dump($datos_funcionario) ;
        
       return view('rrhh.vacaciones.vacaciones_pendientes',compact('cedula','pendientes','edad'));
    } 
    public function ver_disfrutadas(Request $request)
    {
      

        $cedula=Auth::user()->cedula;
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*','persona.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula)->get();
        $funcionario_id=null;
       // dd($request);
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
            $edad=Carbon::parse($funcionario->edad)->age;
        }
       $disfrutadas=Vacaciones_disfrutadas::select('vacaciones.solicitud_vacaciones.*','vacaciones.vacaciones_disfrutadas.*','vacaciones.solicitud_vacaciones.id as Id_solicitud','vacaciones.vacaciones_disfrutadas.id as Id_lapso', 'vacaciones.vacaciones_pendientes.*' )     
            ->join ('vacaciones.solicitud_vacaciones', 'vacaciones.solicitud_vacaciones.id','=','vacaciones.vacaciones_disfrutadas.solicitud_vacaciones_id') 
       ->join ('vacaciones.vacaciones_pendientes', 'vacaciones.vacaciones_pendientes.id', '=','vacaciones.vacaciones_disfrutadas.lapso_disfrute')        
       ->where('vacaciones.solicitud_vacaciones.revisado','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_coordinador','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_director','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_presidencia','=',1)  
       ->where('vacaciones.solicitud_vacaciones.tipo_aprobacion_presidencia','=',1)   
       ->where('vacaciones.solicitud_vacaciones.tipo_aprobacion_director','=',1)      
       ->where('vacaciones.vacaciones_disfrutadas.funcionario_id','=',$funcionario_id)
       ->get();  
    //dd($disfrutadas);
       return view('rrhh.vacaciones.vacaciones_disfrutadas',compact('cedula','disfrutadas'));
    } 
    public function ver_aprobadas(Request $request)
    {
      

        $cedula=Auth::user()->cedula;
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*','persona.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula)->get();
        $funcionario_id=null;
       // dd($request);
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
            $edad=Carbon::parse($funcionario->edad)->age;
        }
      
       $vacaciones_solicitudes= Solicitud_vacaciones::select('vacaciones.solicitud_vacaciones.*','persona.*','funcionario.*')
       ->join ('funcionario', 'funcionario.id','=','vacaciones.solicitud_vacaciones.funcionario_id') 
       ->join ('persona', 'persona.id','=','funcionario.persona_id')    
       ->where('vacaciones.solicitud_vacaciones.revisado','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_coordinador','=',1)
     
       ->where('funcionario.id_oficina_administrativa','=',$funcionario->id_oficina_administrativa)
       ->get();     
       return view('rrhh.vacaciones.vacaciones_aprobadas',compact('vacaciones_solicitudes','funcionario'));
    } 
    public function ver_pendientes_aprobar(Request $request)
    {
      
        $nacionalidades= Nacionalidad::All();
        $tipo_trabajador= Tipo_Trabajador::All();
        $uni_adscripcion= Ubic_Administrativa::All();
        $tipo_mov= TipoMovimientos:: All();
        $cedula=Auth::user()->cedula;
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*','persona.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula)->get();
        $funcionario_id=null;
       // dd($request);
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
            $edad=Carbon::parse($funcionario->edad)->age;
        }
       
       // var_dump($datos_funcionario) ;
       $vacaciones_solicitudes= Solicitud_vacaciones::select('vacaciones.solicitud_vacaciones.*','vacaciones.solicitud_vacaciones.id as id_solicitud','persona.*','funcionario.*')
       ->join ('funcionario', 'funcionario.id','=','vacaciones.solicitud_vacaciones.funcionario_id') 
       ->join ('persona', 'persona.id','=','funcionario.persona_id')    
       ->where('vacaciones.solicitud_vacaciones.revisado','=',0)
       ->where('funcionario.id_oficina_administrativa','=',$funcionario->id_oficina_administrativa)->get();
       
       return view('rrhh.vacaciones.vacaciones_pendientes_aprobar',compact('vacaciones_solicitudes','funcionario'));
    } 
   

    
    public function store_vacaciones(Request $request)
    {

        $date = Carbon::now();
        $date=$date->format('Y-m-d');
        if($request->completos==1)$dias_adisfrutar=$request->total_dias_disfrute;
        if($request->completos==2)$dias_adisfrutar=$request->diasadisfrutar;
     // dd($request->lapso_pendientes);
       $collection = $request->lapso_pendientes;
       // $arr_lapsos= Arr::add([$collection]);
      // dd($arr_lapsos);
        $fecha_disfrute= Carbon::parse($request->fechadisfrute);
        if($request->id_tipo_trabajador<>'3'){
            $fecha_disfrute= $fecha_disfrute->addDay($dias_adisfrutar);
      
        }else{
            $fecha_disfrute = $this->calcular_habiles($dias_adisfrutar, $fecha_disfrute);
        }
      // dd($fecha_disfrute);
        if( Carbon::parse($fecha_disfrute)->isWeekend()){        
            $fecha_reintegro= Carbon::parse($fecha_disfrute)->addWeekdays();
        }else{
            $fecha_reintegro= Carbon::parse($fecha_disfrute)->addDay();
        }
       
      //  dd($fecha_reintegro);
      $request->validate([
            
        'funcionario_id' => ['required'],
        'fechadisfrute' => ['required'],
        'lapso_pendientes' => ['required'],
      
    ]);
        $vacaciones = new Solicitud_vacaciones();        
        $vacaciones->funcionario_id = $request->funcionario_id;
        $vacaciones->fecha_solicitud =  $date;
        $vacaciones->fecha_inicio = $request->fechadisfrute;
        $vacaciones->fecha_fin =  $fecha_disfrute;
        $vacaciones->fecha_reintegro = $fecha_reintegro;
        $vacaciones->dias_disfrute = $dias_adisfrutar ;  
        $vacaciones->lapsos_solicitados =    json_encode($request->lapso_pendientes) ;      
        $vacaciones->save();
        $id_solicitud_vacaciones= $vacaciones->id;
        //dd($collection);
        $resta_dias= $dias_adisfrutar;
        //  dd($resta_dias);
  
        foreach($collection as $id_pendiente){
            $lapso_pendiente=Vacaciones_pendientes::where('id', $id_pendiente)->first();
            if(($request->completos==2) && ($request->total_dias_disfrute==$request->diasadisfrutar) ){
                $request->completos=1;               
            }
            if($request->completos==1){

                $request->validate([
            
                    'funcionario_id' => ['required'],
                    'fechadisfrute' => ['required'],
                    'lapso_pendientes' => ['required'],
                    'id_tipo_trabajador' => ['required'],  
                ]);
                $dias_pendiente_lapso= 0;
                $dias_disfrutados_lapso=$lapso_pendiente->dias_adisfrutar;
                $lapso_pendiente=Vacaciones_pendientes::where('id', $id_pendiente)
                ->update([            
                    'status'=> 0,  
                    'dias_pendientes' => 0,            
                ]);      
                
            }else{
                if($request->completos==2){
                    $request->validate([
            
                        'funcionario_id' => ['required'],
                        'fechadisfrute' => ['required'],
                        'lapso_pendientes' => ['required'],
                        'id_tipo_trabajador' => ['required'],
                        'diasadisfrutar' => ['required'],  
                    ]);
                    //dias solicitados menor al disponible en el lapso
                    if($resta_dias < $lapso_pendiente->dias_adisfrutar ){
                        $resta_dias= $lapso_pendiente->dias_adisfrutar -$resta_dias ;
                        $dias_pendiente_lapso= $resta_dias;
                        $dias_disfrutados_lapso=$lapso_pendiente->dias_adisfrutar-$resta_dias;
                        $lapso_pendiente=Vacaciones_pendientes::where('id', $id_pendiente)
                        ->update([            
                            'status'=> 1,  
                            'dias_pendientes' =>$dias_pendiente_lapso,            
                        ]);       
                    }else{
                        if($resta_dias > $lapso_pendiente->dias_adisfrutar and $lapso_pendiente->dias_pendientes==0 ){
                            $resta_dias= $resta_dias - $lapso_pendiente->dias_adisfrutar  ;
                            $dias_pendiente_lapso= 0;
                            $dias_disfrutados_lapso=$lapso_pendiente->dias_adisfrutar;
                            $lapso_pendiente=Vacaciones_pendientes::where('id', $id_pendiente)
                            ->update([            
                                'status'=> 0,  
                                'dias_pendientes' =>0,            
                            ]);       
                        }else{
                            if($resta_dias > $lapso_pendiente->dias_adisfrutar and $lapso_pendiente->dias_pendientes>0 ){
                                $resta_dias= $resta_dias - $lapso_pendiente->dias_pendientes  ;
                                $dias_pendiente_lapso= 0;
                                $dias_disfrutados_lapso=$lapso_pendiente->dias_pendientes;
                                $lapso_pendiente=Vacaciones_pendientes::where('id', $id_pendiente)
                                ->update([            
                                    'status'=> 0,  
                                    'dias_pendientes' =>0,            
                                ]);       
                            }
                        }
                    }

            }

        }
            $vacaciones_difrutados = new Vacaciones_disfrutadas(); 
            $vacaciones_difrutados->funcionario_id = $request->funcionario_id;
            $vacaciones_difrutados->lapso_disfrute = $id_pendiente;
            $vacaciones_difrutados->solicitud_vacaciones_id = $id_solicitud_vacaciones;
            $vacaciones_difrutados->dias_disfrutados=$dias_disfrutados_lapso;
            $vacaciones_difrutados->dias_completos=$request->completos;
            $vacaciones_difrutados->save();
    }


            
    return    redirect()->back()->with('message', ' La solicitud  fue agregada con éxito!!.');
    }
    public function ver_aprobadas_director(Request $request)
    {
        $cedula=Auth::user()->cedula;
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*','persona.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula)->get();
        $funcionario_id=null;
       // dd($request);
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
            $edad=Carbon::parse($funcionario->edad)->age;
        }
      
       $vacaciones_solicitudes= Solicitud_vacaciones::select('vacaciones.solicitud_vacaciones.*','vacaciones.solicitud_vacaciones.id as id_solicitud','persona.*','funcionario.*')
       ->join ('funcionario', 'funcionario.id','=','vacaciones.solicitud_vacaciones.funcionario_id') 
       ->join ('persona', 'persona.id','=','funcionario.persona_id')    
       ->where('vacaciones.solicitud_vacaciones.revisado','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_coordinador','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_director','=',1)
       ->where('funcionario.id_oficina_administrativa','=',$funcionario->id_oficina_administrativa)
       ->get();     
       return view('rrhh.vacaciones.vacaciones_aprobadas_director',compact('vacaciones_solicitudes','funcionario'));
    } 
    public function ver_pendientes_aprobar_director(Request $request)
    {
      
        $nacionalidades= Nacionalidad::All();
        $tipo_trabajador= Tipo_Trabajador::All();
        $uni_adscripcion= Ubic_Administrativa::All();
        $tipo_mov= TipoMovimientos:: All();
        $cedula=Auth::user()->cedula;
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*','persona.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula)->get();
        $funcionario_id=null;
       // dd($request);
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
            $edad=Carbon::parse($funcionario->edad)->age;
        }
       
       // var_dump($datos_funcionario) ;
       $vacaciones_solicitudes= Solicitud_vacaciones::select('vacaciones.solicitud_vacaciones.*','vacaciones.solicitud_vacaciones.id as id_solicitud','persona.*','funcionario.*')
       ->join ('funcionario', 'funcionario.id','=','vacaciones.solicitud_vacaciones.funcionario_id') 
       ->join ('persona', 'persona.id','=','funcionario.persona_id')    
       ->where('vacaciones.solicitud_vacaciones.revisado','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_coordinador','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_director','=',0)
       ->where('funcionario.id_oficina_administrativa','=',$funcionario->id_oficina_administrativa)->get();
       
       return view('rrhh.vacaciones.vacaciones_pendientes_aprobar_director',compact('vacaciones_solicitudes','funcionario'));
    } 
    public function aprobacion(Request $request,$id)
    {
          
        $cedula=Auth::user()->cedula;
        $solicitudes= Solicitud_vacaciones::select('vacaciones.solicitud_vacaciones.*','vacaciones.solicitud_vacaciones.id as id_solicitud',  'funcionario.*','persona.*','funcionario.cargo as cargo','funcionario.id_oficina_administrativa'     ,
        'estado_civil.descripcion as est_civil','entidad.descripcion as estado_nac',
        'tipo_trabajador.descripcion as trabajador','ubic_administrativa.descripcion as administrativa',
        'ent.descripcion as ent_domi','municipio.nombre as muni_domi','parroquia.nombre as parr_domi','funcionario.id_tipo_funcionario as tipo_trabajador')     
        ->join ('funcionario', 'funcionario.id','=','vacaciones.solicitud_vacaciones.funcionario_id')   
        ->join ('persona', 'persona.id','=','funcionario.persona_id')    
        ->join('estado_civil','estado_civil.id','=','persona.id_estado_civil')  
        ->join('entidad','entidad.id','=','persona.estado_nac') 
        ->JOIN('tipo_trabajador','tipo_trabajador.id','funcionario.id_tipo_funcionario')      
        ->JOIN('ubic_administrativa','ubic_administrativa.id','funcionario.id_oficina_administrativa')          
        ->join('entidad as ent','ent.id','=','funcionario.estado_domicilio') 
        ->join('municipio','municipio.id','=','funcionario.municipio_domicilio')     
        ->join('parroquia','parroquia.id','=','funcionario.parroquia_domicilio')       
       ->where('vacaciones.solicitud_vacaciones.revisado','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_coordinador','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_director','=',0)
       ->where('vacaciones.solicitud_vacaciones.id','=',$id)->first();
      
        
       
      //dd($datos_funcionario);

       return view('rrhh.vacaciones.aprobar_solicitud',compact('cedula','solicitudes'));
    } 
    public function ver_aprobadas_presidencia(Request $request)
    {
        $cedula=Auth::user()->cedula;
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*','persona.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula)->get();
        $funcionario_id=null;
       // dd($request);
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
            $edad=Carbon::parse($funcionario->edad)->age;
        }
      
       $vacaciones_solicitudes= Solicitud_vacaciones::select('vacaciones.solicitud_vacaciones.*','persona.*','funcionario.*')
       ->join ('funcionario', 'funcionario.id','=','vacaciones.solicitud_vacaciones.funcionario_id') 
       ->join ('persona', 'persona.id','=','funcionario.persona_id')    
       ->where('vacaciones.solicitud_vacaciones.revisado','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_coordinador','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_director','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_presidencia','=',1)
       ->where('vacaciones.solicitud_vacaciones.tipo_aprobacion_director','=',1)
       ->where('funcionario.id_oficina_administrativa','=',$funcionario->id_oficina_administrativa)
       ->get();     
       return view('rrhh.vacaciones.vacaciones_aprobadas_presidencia',compact('vacaciones_solicitudes','funcionario'));
    } 
    public function ver_pendientes_aprobar_presidencia(Request $request)
    {
      
        $nacionalidades= Nacionalidad::All();
        $tipo_trabajador= Tipo_Trabajador::All();
        $uni_adscripcion= Ubic_Administrativa::All();
        $tipo_mov= TipoMovimientos:: All();
        $cedula=Auth::user()->cedula;
        $funcionario= Funcionario::select('funcionario.id as funcionario_id','funcionario.*','persona.*') 
        ->join ('persona', 'persona.id','=','funcionario.persona_id')        
        ->where('persona.numero_identificacion','=',$cedula)->get();
        $funcionario_id=null;
       // dd($request);
        foreach($funcionario as $funcionario){
            $funcionario_id=$funcionario->funcionario_id;
            $edad=Carbon::parse($funcionario->edad)->age;
        }
       
       // var_dump($datos_funcionario) ;
       $vacaciones_solicitudes= Solicitud_vacaciones::select('vacaciones.solicitud_vacaciones.*','vacaciones.solicitud_vacaciones.id as id_solicitud','persona.*','funcionario.*')
       ->join ('funcionario', 'funcionario.id','=','vacaciones.solicitud_vacaciones.funcionario_id') 
       ->join ('persona', 'persona.id','=','funcionario.persona_id')    
       ->where('vacaciones.solicitud_vacaciones.revisado','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_coordinador','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_director','=',1)
       ->where('vacaciones.solicitud_vacaciones.tipo_aprobacion_director','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_presidencia','=',0)
       ->where('funcionario.id_oficina_administrativa','=',$funcionario->id_oficina_administrativa)->get();
       
       return view('rrhh.vacaciones.vacaciones_pendientes_aprobar_presidencia',compact('vacaciones_solicitudes','funcionario'));
    } 
         public function calcular_habiles($dias_adisfrutar, $fecha_disfrute){
           // dd( $dias_adisfrutar,$fecha_disfrute);

            date_default_timezone_set('America/Caracas');
            
            $fechaInicial = date($fecha_disfrute);
            $fechaEnSegundos = strtotime($fecha_disfrute);

             $diasAumentar = $dias_adisfrutar;
            $dia = 86400;
            
            $contador = 1;
            
            while ($contador <= $diasAumentar) {
                if (date('N',$fechaEnSegundos) == 6 or date('N',$fechaEnSegundos) == 7) {
                    $fechaEnSegundos += $dia;
                }else {
                    $fechaEnSegundos += $dia;
                    $contador +=1;	
                }	
            }
            
            
            $fechaFinal = date('Y-m-d h:i:s' , $fechaEnSegundos);
         // dd( $fechaFinal);
          return $fechaFinal;
            //dd( "La fecha inicial es: " . $fechaInicial . "<br> Se le agregaron: " . $diasAumentar . " dias habiles <br> la fecha final es: " . $fechaFinal);
            

        }
        public function store_revision(Request $request,$id)
    {
      
            $lapso_pendiente=Solicitud_vacaciones::where('id', $id)
            ->update([            
                'revisado'=> 1,
                'aprobado_coordinador' =>1,
                'usuario_coordinador' =>  Auth::user()->id, 
             
            ]);            
      
       return    redirect()->back()->with('message', ' La solicitud  fue aprobada con éxito!!.');
    }
    public function store_aprobacion(Request $request)
    {
        $request->validate([
            
            'funcionario_id' => ['required'],
            'id_solicitud' => ['required'],
            'tipo_aprobacion' => ['required'],
          
                     
        ]);
       
        Solicitud_vacaciones::where('id', $request->id_solicitud)
            ->update([            
                'tipo_aprobacion_director'=> $request->tipo_aprobacion,
                'aprobado_director' =>1,
                'usuario_director' =>  Auth::user()->id, 
                'observacion_director'=> $request->observaciones
            ]);
        if($request->tipo_aprobacion!=1){
          $lapso_revertir=Vacaciones_disfrutadas::where('solicitud_vacaciones_id', $request->id_solicitud)->get();
            foreach( $lapso_revertir as  $lapso_revertir){
                       $dias_pendientes=Vacaciones_pendientes::where('id', $lapso_revertir->lapso_disfrute)->first();
                    if($dias_pendientes->dias_pendientes==$lapso_revertir->dias_disfrutados){
                       $sumar_dias=0;
                    }else{
                        if(($lapso_revertir->dias_disfrutados<= $dias_pendientes->dias_adisfrutar) && $dias_pendientes->dias_pendientes >0 ){
                            $sumar_dias=$dias_pendientes->dias_adisfrutar - ($dias_pendientes->dias_pendientes + $lapso_revertir->dias_disfrutados) ;
                        }else{ 
                            if(($lapso_revertir->dias_disfrutados <= $dias_pendientes->dias_adisfrutar) && $dias_pendientes->dias_pendientes == 0 ){
                                $sumar_dias= $lapso_revertir->dias_disfrutados;
                            }
                        } 
                    }         
                                Vacaciones_pendientes::where('id', $lapso_revertir->lapso_disfrute)
                                    ->update([            
                                    'status'=>  1 ,
                                    'dias_pendientes' => $sumar_dias,            
                                ]);
                              
                                Vacaciones_disfrutadas::where('id', $lapso_revertir->id)
                                ->update([            
                                    'status'=>  0                       
                                ]); 
                        
                 
            }

        }
            
       return  redirect('rrhh/vacaciones/vacaciones_pend_aprobar_director')->with('message', ' La solicitud  fue procesada con éxito!!.');
    }
    public function store_aprobacion_presidencia(Request $request)
    {
        $request->validate([
            
            'funcionario_id' => ['required'],
            'id_solicitud' => ['required'],
            'tipo_aprobacion' => ['required'],
        ]);
       
        Solicitud_vacaciones::where('id', $request->id_solicitud)
            ->update([            
                'tipo_aprobacion_presidencia'=> $request->tipo_aprobacion,
                'aprobado_presidencia' =>1,
                'usuario_presidencia' =>  Auth::user()->id, 
                'observacion_presidencia' => $request->observaciones,
            ]);
            if($request->tipo_aprobacion!=1){
                $lapso_revertir=Vacaciones_disfrutadas::where('solicitud_vacaciones_id', $request->id_solicitud)->get();
                  foreach( $lapso_revertir as  $lapso_revertir){
                             $dias_pendientes=Vacaciones_pendientes::where('id', $lapso_revertir->lapso_disfrute)->first();
                          if($dias_pendientes->dias_pendientes==$lapso_revertir->dias_disfrutados){
                             $sumar_dias=0;
                          }else{
                              if(($lapso_revertir->dias_disfrutados<= $dias_pendientes->dias_adisfrutar) && $dias_pendientes->dias_pendientes >0 ){
                                  $sumar_dias=$dias_pendientes->dias_adisfrutar - ($dias_pendientes->dias_pendientes + $lapso_revertir->dias_disfrutados) ;
                              }else{ 
                                  if(($lapso_revertir->dias_disfrutados <= $dias_pendientes->dias_adisfrutar) && $dias_pendientes->dias_pendientes == 0 ){
                                      $sumar_dias= $lapso_revertir->dias_disfrutados;
                                  }
                              } 
                          }         
                                      Vacaciones_pendientes::where('id', $lapso_revertir->lapso_disfrute)
                                          ->update([            
                                          'status'=>  1 ,
                                          'dias_pendientes' => $sumar_dias,            
                                      ]);
                                    
                                      Vacaciones_disfrutadas::where('id', $lapso_revertir->id)
                                      ->update([            
                                          'status'=>  0                       
                                      ]); 
                              
                       
                  }
            }
            
       return  redirect('rrhh/vacaciones/vacaciones_pend_aprobar_presidencia')->with('message', ' La solicitud  fue procesada con éxito!!.');
    }
    public function aprobacion_presidencia(Request $request,$id)
    {
          
        $cedula=Auth::user()->cedula;
        $solicitudes= Solicitud_vacaciones::select('vacaciones.solicitud_vacaciones.*','vacaciones.solicitud_vacaciones.id as id_solicitud',  'funcionario.*','persona.*','funcionario.cargo as cargo','funcionario.id_oficina_administrativa'     ,
        'estado_civil.descripcion as est_civil','entidad.descripcion as estado_nac',
        'tipo_trabajador.descripcion as trabajador','ubic_administrativa.descripcion as administrativa',
        'ent.descripcion as ent_domi','municipio.nombre as muni_domi','parroquia.nombre as parr_domi','funcionario.id_tipo_funcionario as tipo_trabajador')     
        ->join ('funcionario', 'funcionario.id','=','vacaciones.solicitud_vacaciones.funcionario_id')   
        ->join ('persona', 'persona.id','=','funcionario.persona_id')    
        ->join('estado_civil','estado_civil.id','=','persona.id_estado_civil')  
        ->join('entidad','entidad.id','=','persona.estado_nac') 
        ->JOIN('tipo_trabajador','tipo_trabajador.id','funcionario.id_tipo_funcionario')      
        ->JOIN('ubic_administrativa','ubic_administrativa.id','funcionario.id_oficina_administrativa')          
        ->join('entidad as ent','ent.id','=','funcionario.estado_domicilio') 
        ->join('municipio','municipio.id','=','funcionario.municipio_domicilio')     
        ->join('parroquia','parroquia.id','=','funcionario.parroquia_domicilio')       
       ->where('vacaciones.solicitud_vacaciones.revisado','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_coordinador','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_director','=',1)
       ->where('vacaciones.solicitud_vacaciones.id','=',$id)->first();
      
        
       
      //dd($datos_funcionario);

       return view('rrhh.vacaciones.aprobar_solicitud_presidencia',compact('cedula','solicitudes'));
    }    
    public function planilla_vacaciones($id_solicitud_vacaciones)
    {
        $cedula=Auth::user()->cedula;
        $datos_funcionario= Funcionario::select('funcionario.id as funcionario_id','tipo_trabajador.id as id_tipo_trabajador',
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
        $foto = ImagenUpload::select('*')
        ->where('usuario', '=',Auth::user()->id)
        ->where('nombre', 'foto')
        ->get();
        $solicitud=Solicitud_vacaciones::select('vacaciones.solicitud_vacaciones.*','vacaciones.solicitud_vacaciones.id as Id_solicitud' )          
        ->where('vacaciones.solicitud_vacaciones.revisado','=',1)
        ->where('vacaciones.solicitud_vacaciones.aprobado_coordinador','=',1)
        ->where('vacaciones.solicitud_vacaciones.aprobado_director','=',1)
        ->where('vacaciones.solicitud_vacaciones.aprobado_presidencia','=',1)  
        ->where('vacaciones.solicitud_vacaciones.tipo_aprobacion_presidencia','=',1)   
        ->where('vacaciones.solicitud_vacaciones.tipo_aprobacion_director','=',1)         
        ->where('vacaciones.solicitud_vacaciones.id','=',$id_solicitud_vacaciones)
        ->first();  
        $aprobado_director= Solicitud_vacaciones::select('vacaciones.solicitud_vacaciones.*','users.*')
        ->join('users','users.id','=','vacaciones.solicitud_vacaciones.usuario_director')  
        ->where('vacaciones.solicitud_vacaciones.id','=',$id_solicitud_vacaciones)
        ->first();       
        $aprobado_presidencia= Solicitud_vacaciones::select('vacaciones.solicitud_vacaciones.*','users.*')
        ->join('users','users.id','=','vacaciones.solicitud_vacaciones.usuario_presidencia')  
        ->where('vacaciones.solicitud_vacaciones.id','=',$id_solicitud_vacaciones)
        ->first(); 
        $disfrutadas=Vacaciones_disfrutadas::select('vacaciones.solicitud_vacaciones.*','vacaciones.vacaciones_disfrutadas.*','vacaciones.solicitud_vacaciones.id as Id_solicitud','vacaciones.vacaciones_disfrutadas.id as Id_lapso', 'vacaciones.vacaciones_pendientes.*' )     
            ->join ('vacaciones.solicitud_vacaciones', 'vacaciones.solicitud_vacaciones.id','=','vacaciones.vacaciones_disfrutadas.solicitud_vacaciones_id') 
       ->join ('vacaciones.vacaciones_pendientes', 'vacaciones.vacaciones_pendientes.id', '=','vacaciones.vacaciones_disfrutadas.lapso_disfrute')        
       ->where('vacaciones.solicitud_vacaciones.revisado','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_coordinador','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_director','=',1)
       ->where('vacaciones.solicitud_vacaciones.aprobado_presidencia','=',1)  
       ->where('vacaciones.solicitud_vacaciones.tipo_aprobacion_presidencia','=',1)   
       ->where('vacaciones.solicitud_vacaciones.tipo_aprobacion_director','=',1)         
       ->where('vacaciones.solicitud_vacaciones.id','=',$id_solicitud_vacaciones)
       ->get();  
       $view = \view('rrhh/vacaciones/planilla_vacaciones', compact('datos_funcionario','foto','disfrutadas','solicitud','aprobado_director','aprobado_presidencia'));
       $pdf = App::make('dompdf.wrapper');
       $pdf->loadHTML($view)->setPaper('legal');
       return $pdf->download('planilla_vac'.Auth::user()->cedula.'.pdf');
    }
}
   

