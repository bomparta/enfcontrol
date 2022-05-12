@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
    @include('layouts.appcontrol')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                
                                    @include('layouts.items.card-header', ['titulo' => 'Lista de usuarios ENFMP'])
                                    @if($datosestudiantes->isNotEmpty())
                                    
                                    @else
                                    <p align="right"><a class='btn btn-info' href="{{URL::route('datosestudiante')}}">Crear Informacion del Estudiante</a></p>
                                    @endif
                                    <p>Desde aqui puedes listar la informacion personal del estudiante. Como por ejemplo nombre,apellidos,correo,telefono habitacion,telefono celular.</p>
                                    
                                    <div class="table-responsive mt-3">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Cedula</th>
                                                    <th>Nombre y Apellidos</th>
                                                    <th>Correo</th>
                                                    <th>Telefono</th>
                                                    <th>Sexo</th>
                                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,1) ))
                                                        <th>Opcion</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($datosestudiantes<>NULL)
                                                    @foreach ($datosestudiantes as $datosestudiante)
                                                    <tr>
                                                    
                                                        <td>{{ $datosestudiante->cedula }}</td>
                                                        <td>{{ $datosestudiante->nombre_primer }} {{ $datosestudiante->nombre_segundo }} {{ $datosestudiante->apellido_primer }} {{ $datosestudiante->apellido_segundo }}</td>
                                                        <td>{{ $datosestudiante->correo}}</td>
                                                        <td>{{ $datosestudiante->id_codigo_hab}}-{{ $datosestudiante->tel_habitacion}}</td>
                                                        <td>{{ $datosestudiante->id_sexo }}</td>
                                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,1) ))
                                                            <td class="text-center">
                                                            <a href= "/editestudiantedatos/{{$datosestudiante->id}}" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
                                                            </a>
                                                            </td>
                                                        @endif
                                                            
                                                    </tr>
                                                    @endforeach
                                                @endif
                                                
                                            </tbody>
                                        </table>
                                    </div>
    
            </div>
        </div>
    </div>
</div>

@endsection