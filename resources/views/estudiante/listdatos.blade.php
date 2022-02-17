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

                                    <p>Desde aqui puedes listar la informacion personal del estudiante. Como por ejemplo nombre,apellidos,correo,telefono habitacion,telefono celular.</p>
                                    
                                    <div class="table-responsive mt-3">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>id_tipo_identificacion</th>
                                                    <th>id nacionalidad</th>
                                                    <th>nro identificacion</th>
                                                    <th>nombre</th>
                                                    <th>apellido</th>
                                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,1) ))
                                                        <th>Opcion</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($usuarios as $usuario)
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,1) ))
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