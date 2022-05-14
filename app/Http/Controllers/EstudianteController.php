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
use App\DatosEstudiante;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function dashboard()
    {
        return view('estudiante/dashboard');
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
        $estados= Entidad::All();
        $municipios= Municipio::All();
       return view('estudiante/direccion',compact('estados','municipios'));
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
            'nacionalidad' => ['required'],
            'cedula' => ['required'],
            'estadocivil' => ['required'],
            'correo' => ['required'],
            'codtele' => ['required'],
            'telfhabitacion' => ['required'],
            'fechanac' => ['required'],
            'codtelecel' => ['required'],
            'telefonoCel' => ['required'],
            'cod_what' => ['required'],
            'telfwhatsapp' => ['required'],
    
           
        ]);
       // dd($request);
        

        $estudiantes = new DatosEstudiante();
        $estudiantes->id_usuario = Auth::user()->id;
        $estudiantes->nacionalidad = $request->cedula;
        $estudiantes->cedula = $request->cedula;
        $estudiantes->nombre_primer = $request->primernombre;
        $estudiantes->nombre_segundo = $request->segundonombre;
        $estudiantes->apellido_primer = $request->primerapellido;
        $estudiantes->apellido_segundo = $request->segundoapellido;
        $estudiantes->id_sexo = $request->genero;
        $estudiantes->fecha_nac = $request->fechanac;
        $estudiantes->id_estado_civil = $request->estadocivil;
        $estudiantes->correo = $request->correo;
        $estudiantes->id_codigo_hab = $request->codtele;
        $estudiantes->tel_habitacion = $request->telfhabitacion;
        $estudiantes->tel_celular = $request->telefonoCel;
        $estudiantes->id_codigo_cel = $request->codtelecel;
        $estudiantes->telefono_whatsapp = $request->telfwhatsapp;
        $estudiantes->id_codigo_cel_whatsapp = $request->cod_what;
        $estudiantes->save();

        return redirect('/estudiantelist/'.$estudiantes->id_usuario)->with('success', 'Actividad creada con éxito.');
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
        $nacionalidades= Nacionalidad::All();
        $generos= Genero::All();
        $estado_civils= Estado_civil::All();
        $cod_habs= Cod_Habitacion::All();
        $cod_cels= Cod_Celular::All();
        $datos = DatosEstudiante::select('*')
       ->where('id', '=',$id)
       ->get();
       //dd($datos);
        return view('estudiante.datos_edit',compact('datos','generos','nacionalidades','estado_civils','cod_habs','cod_cels'));
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
       // $datosestudiantes = DatosEstudiante::find($id);
       $datosestudiantes = DatosEstudiante::select('*')
       ->where('id_usuario', '=',$id)
       ->get();
        //dd($datosestudiantes);
        return view('estudiante.listdatos',compact('datosestudiantes'));
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

    public function indexestatus($id)
    {
       // $estatusproceso = DatosEstudiante::find($id);
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
        return view('estudiante.estatus',compact('adjuntosestudiantes','adjuntoscedula','adjuntoscurriculum','adjuntoscarta','adjuntoscarnetcolegiatura','adjuntosimpre'));
    }
    

    public function datosadjunto($id)
    {
        $adjuntosestudiantes = DatosEstudiante::find($id);
        return view('estudiante.datosadjuntados',compact('adjuntosestudiantes'));
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
