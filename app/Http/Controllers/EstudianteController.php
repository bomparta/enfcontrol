<?php

namespace App\Http\Controllers;

use App\DatosEstudiante;
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
       // return view('estudiante/create');
       return view('estudiante/datos');
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

    public function datoslistestudiante($id)
    {
        $datosestudiantes = DatosEstudiante::find($id);
        return view('estudiante.listdatos',compact('datosestudiantes'));
    }
}
