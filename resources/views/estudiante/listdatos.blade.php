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
                                    @if($datosestudiantes==NULL)
                                    <p align="right"><a class='btn btn-info' href="{{URL::route('datosestudiante')}}">Crear Estudiante</a></p>
                                    @endif
                                    <p>Desde aqui puedes listar la informacion personal del estudiante. Como por ejemplo nombre,apellidos,correo,telefono habitacion,telefono celular.</p>
                                    
                                    <div class="table-responsive mt-3">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>id_tipo_identificacion</th>
                                                    <th>id_nacionalidad</th>
                                                    <th>nro identificacion</th>
                                                    <th>nombre</th>
                                                    <th>apellido</th>
                                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,1) ))
                                                        <th>Opcion</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                                <tr>
                                                    @if(!$datosestudiantes==NULL)
                                                    <td>{{ $datosestudiantes->id_tipo_identificacion }}</td>
                                                    <td>{{ $datosestudiantes->id_nacionalidad }}</td>
                                                    <td>{{ $datosestudiantes->numero_identificacion}}</td>
                                                    <td>{{ $datosestudiantes->nombre}}</td>
                                                    <td>{{ $datosestudiantes->apellido }}</td>
                                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,1) ))
                                                    <td class="text-center">
                                                            <a href= "/editestudiantedatos/{{$datosestudiantes->id}}" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                                                <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
                                                            </a>
                                                        </td>
                                                    @endif
                                                    @endif
                                                </tr>
                                                
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