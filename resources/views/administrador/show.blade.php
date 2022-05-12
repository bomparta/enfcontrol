@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="d-flex" id="wrapper">
        @include('layouts.appcontrol')

        <div id="page-content-wrapper">
            

            <div class="container pb-4">
                <div class="row align-items-stretch">

                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    @include('layouts.items.card-header', ['titulo' => 'Lista de usuarios ENFMP'])

                                    <p>Desde aqui se pueden gestionar los usuarios de un determinado rol. Como por ejemplo datos personales, activar/bloquear o cambiar la retención.</p>
                                    
                                    <div class="table-responsive mt-3">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Nombre</th>
                                                    <th>Correo electrónico</th>
            
                                                    @if (Auth::user()->id_usuariogrupo == '4')
                                                        <th>Opcion</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($usuarios as $usuario)
                                                <tr>
                                                    <td>{{ $usuario->username  }}</td>
                                                    <td>{{ $usuario->name }} {{ $usuario->apellidos }}</td>
                                                    <td>{{ $usuario->email  }}</td>
            
                                                    @if (Auth::user()->id_usuariogrupo == 4)
                                                    <td class="text-center">
                                                            <a href="{{ route('usuarios.edit',$usuario->id) }}" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                                                <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
                                                            </a>
                                                        </td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                

                                </div>
                            </div> <!-- /.card -->
                        </div>
                
                </div>
            </div>
        </div> <!-- page-content-wrapper -->
    </div> <!-- wrapper -->
@endsection