@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
    @include('layouts.appcontrol')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                
                                    @include('layouts.items.card-header', ['titulo' => 'Lista de Oferta Academica ENFMP'])
                                
                                    <p align="right"><a class='btn btn-info' href="{{URL::route('oferta_add')}}">Crear Ofertas Academica</a></p>
                                    
                                    <p>Desde aqui puedes listar la informacion ofertas academicas del periodo {{ $periodo[0]->nombre }}.</p>
                                    
                                    <div class="table-responsive mt-3">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>periodo</th>
                                                    <th>Programa</th>
                                                    <th>Codigo</th>
                                                    <th>Unidad Curricular</th>
                                                    <th>trimestre</th>
                                                    <th>horario</th>
                                                    <th>Profesor</th>
                                                    @if(in_array( Auth::user()->id_usuariogrupo, array(6,9) ))
                                                        <th>Opcion</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($oferta_academicas<>NULL)
                                                    @foreach ($oferta_academicas as $item)
                                                    <tr>
                                                    
                                                        <td>{{ $item->id_periodo }}</td>
                                                        <td>{{ $item->id_programa }}</td>
                                                        <td>{{ $item->codigo}}</td>
                                                        <td>{{ $item->unidades_creditos }}</td>
                                                        <td>{{ $item->trimestre }}</td>
                                                        <td>{{ $item->horario }}</td>
                                                        <td>{{ $item->id_docente }} {{ $item->primer_apellido }} </td>
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