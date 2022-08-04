<?php

namespace App\Http\Controllers;

use App\Bienes;
use App\Control_Bienes;
use App\Mov_Bienes;
use App\Entidad;
use App\Ubic_Administrativa;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;


class BienesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        //
        return view('bienes_nacionales/homebienes');
    }

    public function index()
    {
        //
        $bienes=Bienes::select('*','bienes_nacionales.bienes.id as id_bien')
                        ->join('bienes_nacionales.mov_bienes','bienes_nacionales.mov_bienes.bienes_id','=','bienes_nacionales.bienes.id')  
                        ->where('bienes_nacionales.mov_bienes.status','=',1)
                        ->where('bienes_nacionales.bienes.status','=',1)
                        ->where('bienes_nacionales.mov_bienes.tipo_movimiento_id','=',1)->paginate(100);
        return view('bienes_nacionales/listado_bienes', compact('bienes'));
    }
    public function movimientos()
    {
        //
        $bienes=Bienes::select('*','bienes_nacionales.bienes.id as id_bien')
        ->join('bienes_nacionales.mov_bienes','bienes_nacionales.mov_bienes.bienes_id','=','bienes_nacionales.bienes.id')  
        ->where('bienes_nacionales.mov_bienes.status','=',1)
        ->where('bienes_nacionales.bienes.status','=',1)
        ->paginate(100);
        return view('bienes_nacionales/listado_bienes_mov',compact('bienes'));
    }

    
    public function list_desincorporar()
    {
        //
        $bienes=Bienes::select('*','bienes_nacionales.bienes.id as id_bien')
        ->join('bienes_nacionales.mov_bienes','bienes_nacionales.mov_bienes.bienes_id','=','bienes_nacionales.bienes.id')  
        ->where('bienes_nacionales.mov_bienes.status','=',1)
        ->where('bienes_nacionales.bienes.status','=',1)
        ->whereNotIn('bienes_nacionales.mov_bienes.tipo_movimiento_id',[1,6])
        ->paginate(100);
        return view('bienes_nacionales/listado_bienes_desin',compact('bienes'));
    }
    public function desincorporados_todos()
    {
        //
        $bienes=Bienes::select('*','bienes_nacionales.bienes.id as id_bien')
        ->join('bienes_nacionales.mov_bienes','bienes_nacionales.mov_bienes.bienes_id','=','bienes_nacionales.bienes.id')  
        ->where('bienes_nacionales.mov_bienes.status','=',1)
        ->where('bienes_nacionales.bienes.status','=',1)
        ->where('bienes_nacionales.mov_bienes.tipo_movimiento_id','=',6)
        ->paginate(100);
        return view('bienes_nacionales/listado_bienes_desin_todos',compact('bienes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createmov(Bienes $bienes,$id,$id_bien)
    {
        //
        $entidad = Entidad::All();
        $bienes=Bienes::where('id',$id_bien)->get();
      
        return view('bienes_nacionales/bienesmov',compact('bienes','entidad'));
    }
    public function createdesin(Bienes $bienes,$id,$id_bien)
    {
        //
        $entidad = Entidad::All();
       
        $bienes=Bienes::select('*','bienes_nacionales.bienes.id as id_bien')
        ->join('bienes_nacionales.mov_bienes','bienes_nacionales.mov_bienes.bienes_id','=','bienes_nacionales.bienes.id')  
        ->where('bienes_nacionales.bienes.id',$id_bien)
        ->where('bienes_nacionales.mov_bienes.status',1)
        ->get();
        //var_dump($entidad);
        return view('bienes_nacionales/bienes_desin',compact('bienes','entidad'));
    }
    public function create()
    {
        //
       
        $num_bien=Control_Bienes::where('status',1)->get();
        //  var_dump($num_bien);
           return view('bienes_nacionales/bienes',compact('num_bien'));
    }

    
    public function reportes()
    {
        //
       
        return view('bienes_nacionales/homereportes');
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
            
            'num_bien' => ['required'],
            'tipo_bien'=>['required'],
            'tipo_movimiento'=>['required'],
            'forma_adquisicion'=>['required'],
            'num_orden'=>['required'],
            'fecha_orden'=>['required'],
            'marca'=>['required'],
            'modelo'=>['required'],
            'color'=>['required'],
            'serial'=>['required'],
            'recibido_por'=>['required'],
        ]);
      
        $bienes = new Bienes();        
        $bienes->num_bien = $request->num_bien;
        $bienes->num_factura = $request->num_factura;
        $bienes->fecha_factura = $request->fecha_factura;          
        $bienes->fecha_registro = date('Y-m-d');  
        $bienes->num_orden_compra = $request->num_orden;
        $bienes->fecha_compra = $request->fecha_orden;
        $bienes->nombre_proveedor = $request->nom_proveedor;          
        $bienes->rif_proveedor = $request->rif_proveedor;  
        $bienes->correo_proveedor = $request->correo_proveedor;
       // $bienes->rep_legal_proveedor = $request->num_cuenta;
        $bienes->num_cotizacion = $request->num_cotizacion;          
        $bienes->fecha_cotizacion = $request->fecha_cotizacion;          
        $bienes->forma_adquisicion_id = $request->forma_adquisicion;          
        $bienes->tipo_bien_id = $request->tipo_bien;
        $bienes->marca_id = $request->marca;          
        $bienes->modelo = $request->modelo;
        $bienes->color = $request->color;          
        $bienes->serial = $request->serial;
        $bienes->observacion = $request->observaciones;          
        $bienes->registrado_por = Auth::user()->id;
        $bienes->save();
//Carga tabla movimeitno la incorporacion
        $mov_bienes = new Mov_Bienes();        
        $mov_bienes->bienes_id =  $bienes->id;
        $mov_bienes->tipo_movimiento_id = $request->tipo_movimiento;
        $mov_bienes->fecha_registro = date('Y-m-d');          
        $mov_bienes->responsable_asignado = '1';  
        $mov_bienes->ubic_adm_id = '1';
        $mov_bienes->entidad_id ='24';
        $mov_bienes->observaciones ='S/O';
        $mov_bienes->quien_registro = Auth::user()->id;         
        $mov_bienes->save();

        //actualizar tabla control
        $control=Control_Bienes::where('status', '1')
        ->update([ 'ult_num_bien'=>Str::substr($request->num_bien ,3)]);


        return redirect('/bienes_nacionales/listado_bienes')->with('message', ' El bien nacional fue agregado con éxito!!.');
  
    }
    public function storemov(Request $request)
    {
        //
        $request->validate([
            
               
            'id_bien' => ['required'],        
            'tipo_movimiento'=>['required'],
            'responsable_asignado'=>['required'],
            'ubic_adm'=>['required'],
            'ubic_adm'=>['required'],
            
        ]);
      
        $bienes=Mov_Bienes:: where ('bienes_id',$request->id_bien)->where ('status',1)
        ->update([ 'status'=>0 ]);
        
//Carga tabla movimeitno la incorporacion
        $mov_bienes = new Mov_Bienes();        
        $mov_bienes->bienes_id =   $request->id_bien;
        $mov_bienes->tipo_movimiento_id = $request->tipo_movimiento;
        $mov_bienes->fecha_registro = date('Y-m-d');          
        $mov_bienes->responsable_asignado =$request->responsable_asignado;
        $mov_bienes->ubic_adm_id = $request->ubic_adm;
        $mov_bienes->entidad_id =$request->ubic_geo;
        $mov_bienes->observaciones =$request->observaciones;
        $mov_bienes->quien_registro = Auth::user()->id;         
        $mov_bienes->save();
        return redirect('/bienes_nacionales/listado_bienes_mov')->with('message', ' El movimiento del bien nacional fue registrado con éxito!!.');
  
    }
    public function storedesin(Request $request)
    {
        //
        $request->validate([
            
               
            'id_bien' => ['required'],        
            'tipo_movimiento'=>['required'],
            'responsable_asignado'=>['required'],
            'ubic_adm'=>['required'],
            'ubic_adm'=>['required'],
            
        ]);
      
        $bienes=Mov_Bienes:: where ('bienes_id',$request->id_bien)->where ('status',1)
        ->update([ 'status'=>0 ]);
        
//Carga tabla movimeitno la incorporacion
        $mov_bienes = new Mov_Bienes();        
        $mov_bienes->bienes_id =   $request->id_bien;
        $mov_bienes->tipo_movimiento_id = $request->tipo_movimiento;
        $mov_bienes->fecha_registro = date('Y-m-d');          
        $mov_bienes->responsable_asignado =$request->responsable_asignado;
        $mov_bienes->ubic_adm_id = $request->ubic_adm;
        $mov_bienes->entidad_id =$request->ubic_geo;
        $mov_bienes->observaciones =$request->observaciones;
        $mov_bienes->quien_registro = Auth::user()->id;         
        $mov_bienes->save();
        return redirect('/bienes_nacionales/listado_bienes_desin')->with('message', ' La desincorporacióno del bien nacional fue registrado con éxito!!.');
  
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Bienes  $bienes
     * @return \Illuminate\Http\Response
     */
    public function movimientos_todos()
    {
        //
        $bienes=Bienes::select('*','bienes_nacionales.bienes.id as id_bien')
        ->join('bienes_nacionales.mov_bienes','bienes_nacionales.mov_bienes.bienes_id','=','bienes_nacionales.bienes.id')  
       
        ->paginate(100);
        return view('bienes_nacionales/listado_bienes_mov_todos',compact('bienes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bienes  $bienes
     * @return \Illuminate\Http\Response
     */
    public function edit(Bienes $bienes,$id)
    {
        //
        $bienes=Bienes::where('id',$id)->get();
        return view('bienes_nacionales/bienes_edit',compact('bienes'));
    }
    public function editmov(Bienes $bienes,$id)
    {
        //
        $entidad = Entidad::All();
        $bienes=Bienes::select('*')
        ->join('bienes_nacionales.mov_bienes','bienes_nacionales.mov_bienes.bienes_id','=','bienes_nacionales.bienes.id')  
        ->where('bienes_nacionales.mov_bienes.id',$id)->get();
        return view('bienes_nacionales/bienes_mov_edit',compact('bienes','entidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bienes  $bienes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bienes $bienes)
    {
        //
        $request->validate([
            
            'id_bien' => ['required'],            
            'num_bien' => ['required'],
            'tipo_bien'=>['required'],
            'tipo_movimiento'=>['required'],
            'forma_adquisicion'=>['required'],
            'num_orden'=>['required'],
            'fecha_orden'=>['required'],
            'marca'=>['required'],
            'modelo'=>['required'],
            'color'=>['required'],
            'serial'=>['required'],
            'recibido_por'=>['required'],
        ]);
      
         $bienes=Bienes:: where ('id',$request->id_bien)
        ->update([ 'num_factura'=>$request->num_factura,
       'fecha_factura' => $request->fecha_factura,
        'num_orden_compra' => $request->num_orden,
        'fecha_compra' => $request->fecha_orden,
        'nombre_proveedor' => $request->nom_proveedor,
        'rif_proveedor' =>$request->rif_proveedor,
        'correo_proveedor' => $request->correo_proveedor,
       // 'rep_legal_proveedor' => $request->num_cuenta,
        'num_cotizacion' => $request->num_cotizacion,
        'fecha_cotizacion' => $request->fecha_cotizacion,
        'forma_adquisicion_id' => $request->forma_adquisicion,
        'tipo_bien_id' => $request->tipo_bien,
        'marca_id' => $request->marca,          
        'modelo' => $request->modelo,
        'color' => $request->color,          
        'serial' => $request->serial,
        'observacion' => $request->observaciones
    ]);
        
        

        return redirect('/bienes_nacionales/listado_bienes')->with('message', ' El bien nacional fue actualizado con éxito!!.');
  
    }
    public function updatemov(Request $request)
    {
        //
        $request->validate([
            
            'id_mov' => ['required'],           
            'tipo_movimiento'=>['required'],
            'responsable_asignado'=>['required'],
            'ubic_adm'=>['required'],
            'ubic_adm'=>['required'],
            
        ]);
      
        $bienes=Mov_Bienes:: where ('id',$request->id_mov)->where ('status',1)
        ->update(['tipo_movimiento_id' => $request->tipo_movimiento,        
        'responsable_asignado' =>$request->responsable_asignado,
        'ubic_adm_id' => $request->ubic_adm,
        'entidad_id' =>$request->ubic_geo,
        'observaciones' =>$request->observaciones  ]);
        
              
        
        return redirect('/bienes_nacionales/listado_bienes_mov')->with('message', ' El movimiento del bien nacional fue actualizado con éxito!!.');
  
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bienes  $bienes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bienes $bienes)
    {
        //
    }

    ///REPORTES///
    public function ficha()
    {
        //      
        $bienes=Bienes::select('*','bienes_nacionales.bienes.id as id_bien')
        ->join('bienes_nacionales.mov_bienes','bienes_nacionales.mov_bienes.bienes_id','=','bienes_nacionales.bienes.id')  
        ->where('bienes_nacionales.mov_bienes.status','=',1)
        ->where('bienes_nacionales.bienes.status','=',1)
        ->get();
      //  ->paginate(100); 

      
        if($bienes->count()>0){
         $view = \view('bienes_nacionales/reportes/ficha',compact('bienes'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->download('ficha'.'.pdf');       
        }
    }
    public function activos()
    {
        //      
        $bienes=Bienes::select('*','bienes_nacionales.bienes.id as id_bien')
        ->join('bienes_nacionales.mov_bienes','bienes_nacionales.mov_bienes.bienes_id','=','bienes_nacionales.bienes.id')  
        ->where('bienes_nacionales.mov_bienes.status','=',1)
        ->where('bienes_nacionales.bienes.status','=',1)
        ->get();
      //  ->paginate(100); 

      
        if($bienes->count()>0){
         $view = \view('bienes_nacionales/reportes/activos',compact('bienes'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->download('activos'.'.pdf');       
        }
    }
    public function desincorporados()
    {
        //      
        $bienes=Bienes::select('*','bienes_nacionales.bienes.id as id_bien')
        ->join('bienes_nacionales.mov_bienes','bienes_nacionales.mov_bienes.bienes_id','=','bienes_nacionales.bienes.id')  
        ->where('bienes_nacionales.mov_bienes.status','=',1)
        ->where('bienes_nacionales.bienes.status','=',1)
        ->where('bienes_nacionales.mov_bienes.tipo_movimiento_id','=',6)
        ->get();
      //  ->paginate(100); 

      
        if($bienes->count()>0){
         $view = \view('bienes_nacionales/reportes/desincorporados',compact('bienes'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->download('activos'.'.pdf');       
        }
    }
    
    public function search($search)
    {
        //      
        $search = urldecode($search);
        $bienes=Bienes::select('*','bienes_nacionales.bienes.id as id_bien','ubic_administrativa.descripcion as ubic_adm')
        ->join('bienes_nacionales.mov_bienes','bienes_nacionales.mov_bienes.bienes_id','=','bienes_nacionales.bienes.id')  
        ->join('ubic_administrativa','bienes_nacionales.mov_bienes.ubic_adm_id','=','ubic_administrativa.id')  
        ->where('bienes_nacionales.mov_bienes.status','=',1)
        ->where('bienes_nacionales.bienes.status','=',1)
        ->where('bienes_nacionales.mov_bienes.tipo_movimiento_id','=',1)
        ->where('bienes_nacionales.mov_bienes.ubic_adm_id','=',$search)
        ->get();

      $lista_adm=  Ubic_Administrativa::All();
      
        if($bienes->count()>0){
            $view = \view('bienes_nacionales/reportes/adm',compact('bienes'));
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML($view)->setPaper('a4', 'landscape');
            return $pdf->download('inv_ubic_administrativa'.'.pdf');       
        }else {
            return redirect('/bienes_nacionales/reportes/bienes_adm') 
             ->with('advertencia', 'No hay resultados que mostrar.');
             
        }
    }
    public function buscaradm()
    {
        //    
        $lista_adm=  Ubic_Administrativa::All();
        //var_dump($lista_adm);
        return view('bienes_nacionales/bienes_adm',compact('lista_adm'));

      
       
    }
    
}
