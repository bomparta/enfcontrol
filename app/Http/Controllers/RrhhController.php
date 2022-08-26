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
use App\User;

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
    public function create()
    {
        $nacionalidades= Nacionalidad::All();
        $datos_funcionario=null;
       return view('rrhh/ver_trabajador',compact('nacionalidades','datos_funcionario'));
    }
    public function movimientos($cedula)
    {
        //      
      
        $cedula_usuario= $cedula;
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
       $movimiento=null;
       if($datos_funcionario->count()>0){
      
           return view('rrhh/movimientos', compact('datos_funcionario','nacionalidades','edad', 'movimiento'));
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
      //dd($usuario);
      foreach($usuario as  $usuario){
      $foto = ImagenUpload::select('*')      
      ->where('usuario', '=',$usuario->id)
      ->where('nombre', 'foto')
      ->get();
      }
     
     if($datos_funcionario->count()>0 && $educacion->count()>0 && $familiar->count()>0 ){
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
