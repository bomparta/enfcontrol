@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
    @include('layouts.appcontrol')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                
                                    @include('layouts.items.card-header', ['titulo' => 'Lista de programa ENFMP'])
                                
                                    <p align="right"><a class='btn btn-info' href="{{URL::route('datosestudiante')}}">Crear Informacion del Programa</a></p>
                                    
                                    <p>Desde aqui puedes listar la informacion de programas. Como por ejemplo programa,codigo,status.</p>
                                    
                                    <div class="table-responsive mt-3">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Nro</th>
                                                    <th>Programa</th>
                                                    <th>Siglas</th>
                                                    @if(in_array( Auth::user()->id_usuariogrupo, array(6,9) ))
                                                        <th>Opcion</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($programa<>NULL)
                                                    @foreach ($programa as $item)
                                                    <tr>
                                                    
                                                        <td>{{ $item->id}}</td>
                                                        <td>{{ $item->programa }}</td>
                                                        <td>{{ $item->codigo }}</td>
                                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,6) ))
                                                            <td class="text-center">
                                                            <a href= "/listapensum/{{$item->id}}" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
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