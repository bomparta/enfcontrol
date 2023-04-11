<?php

namespace App\Http\Controllers;

use App\UsuarioGrupo;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;


class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $usuario_grupos = UsuarioGrupo::orderby('nombre')->get();

        foreach ($usuario_grupos as $grupo) {
           $grupo->count_usuarios = User::where('id_usuariogrupo', $grupo->id)->count();
        }

        return view('administrador.index', compact('usuario_grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
       
        $usuario_grupo = UsuarioGrupo::find($id);

        $usuarios = User::where('id_usuariogrupo', $id)
            ->get();
//var_dump($usuarios);
        return view('administrador.show', compact('usuarios', 'usuario_grupo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $usuario = User::find($id);
        $usuario_grupo = UsuarioGrupo::all();

        return view('administrador.edit',compact('usuario', 'usuario_grupo'));
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
            'username' => ['string', 'max:100'],
            'nombre' => ['string', 'max:120'],
            'email' => ['required', 'email', 'max:150'],
            'id_usuariogrupo' => ['required'],
            'cedula'=>['required'],
        ]);

        User::where('users.id', $id)
            ->update([
            'username' => $request->username,
            'name' => $request->nombre,
            'email' => $request->email,
            'id_usuariogrupo' => $request->id_usuariogrupo,
            'email' => $request->cedula,
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado con éxito');
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
