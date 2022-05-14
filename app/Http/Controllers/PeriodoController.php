<?php

namespace App\Http\Controllers;

use App\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodos = Periodo::all();
        return view('control.periodo.list', compact('periodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control.periodo.add');
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
            'nombre' => ['required'],
            'estatus' => ['required'],
            'condicion' => ['required']
        ]);

        if ($periodoactivo = Periodo::where('status', 1)->first()){
            return redirect('/listperiodo')->with('danger', 'Periodo no fue creado porque hay uno activo.');
        }
                
        $periodo = new Periodo();
        $periodo->nombre = $request->nombre;
        $periodo->status = $request->estatus;
        $periodo->condicion = $request->condicion;
        $periodo->save();

        return redirect('/listperiodo')->with('success', 'Periodo creado con éxito.');

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
        //$periodos = Periodo::where('id', $id);
        $periodos = Periodo::find($id);
        return view('control.periodo.edit',compact('periodos'));
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
        
        $request->validate([
            'nombre' => 'required',
            'estatus' => 'required',
            'condicion' => 'required',
        ]);

       // return redirect()->route('listaPeriodo')->with('success', 'Periodo fue actualizada con éxito');
        
        Periodo::where('id', $id)
            ->update(['nombre' => $request->nombre, 
                    'status' => $request->estatus, 
                    'condicion' => $request->condicion
                ]);

        return redirect()->route('listaPeriodo')
            ->with('success', 'Periodo fue actualizada con éxito');
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
