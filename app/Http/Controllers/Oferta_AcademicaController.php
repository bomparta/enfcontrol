<?php

namespace App\Http\Controllers;

use App\Docente;
use App\Periodo;
use App\Trimestre;
use App\Oferta_academica;
use App\Pensum;
use App\Programa;
use App\Seccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Oferta_AcademicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodo = Periodo::where("status","=",1)->get();

        $oferta_academicas = DB::select("
        SELECT periodo.nombre as id_periodo,programa.programa as id_programa,oferta_academica.codigo as codigo,oferta_academica.unidades_creditos as unidades_creditos,
        oferta_academica.trimestre as trimestre,oferta_academica.horario as horario,docente.primer_nombre as id_docente,docente.primer_apellido as primer_apellido,oferta_academica.id as id
        FROM oferta_academica 
        INNER JOIN programa ON oferta_academica.id_programa = programa.id
        INNER JOIN periodo ON oferta_academica.id_periodo = periodo.id
        INNER JOIN docente ON oferta_academica.id_docente = docente.id
        where oferta_academica.status=1 AND oferta_academica.id_periodo=".$periodo[0]->id);
        /*$oferta_academicas = Oferta_academica::
        join("programa","oferta_academica.id_programa","=","programa.id")->
        join("periodo","oferta_academica.id_periodo","=","periodo.id")->
        join("docente","oferta_academica.id_docente","=","docente.id")->
        where("oferta_academica.status","=",1)->
        where("oferta_academica.id_periodo","=",$periodo[0]->id)->get();
        */
        
        return view('control.oferta_academica.list', compact('oferta_academicas','periodo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profesores = Docente::where("status","=",1)->get();
        $periodos = Periodo::where("status","=",1)->get();
        $trimestres = Trimestre::All();
        $programas = Programa::All();
        $pensums = Pensum::All();
        $seccions = Seccion::All();
        return view('control.oferta_academica.add',compact('profesores','trimestres','programas','periodos','pensums','seccions'));
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
