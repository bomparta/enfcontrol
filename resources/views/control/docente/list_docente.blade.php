@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
    @include('layouts.appcontrol')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                
                                    @include('layouts.items.card-header', ['titulo' => 'Lista de Docentes ENFMP'])
                                
                                    <p align="right"><a class='btn btn-info' href="{{URL::route('docente_add')}}">Crear Docente</a></p>
                                    
                                    <p>Desde aqui puedes listar la informacion de docentes activos. Como por ejemplo nombre,apellidos,correo,telefono habitacion,telefono celular.</p>
                                    
                                    <div class="table-responsive mt-3">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Cedula</th>
                                                    <th>Rif</th>
                                                    <th>Nombres y Apellidos</th>
                                                    <th>Tel Habitacion</th>
                                                    <th>Correo</th>
                                                    <th>Nivel</th>
                                                    <th>Tel Celular</th>
                                                    @if(in_array( Auth::user()->id_usuariogrupo, array(6,9) ))
                                                        <th>Opcion</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($docentes<>NULL)
                                                    @foreach ($docentes as $item)
                                                    <tr>
                                                    
                                                        <td>{{ $item->cedula }}</td>
                                                        <td>{{ $item->rif }}</td>
                                                        <td>{{ $item->primer_nombre }} {{ $item->segundo_nombre }} {{ $item->primer_apellido }} {{ $item->segundo_apellido }}</td>
                                                        <td>{{ $item->telefono_hab }}</td>
                                                        <td>{{ $item->correo }}</td>
                                                        <td>{{ $item->id_nivel_academico }}</td>
                                                        <td>{{ $item->telefono_cel }}</td>
                                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,6) ))
                                                            <td class="text-center">
                                                            <a href= "/editestudiantedatos/{{$item->id}}" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
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


