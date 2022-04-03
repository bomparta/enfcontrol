@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
    @include('layouts.appcontrol')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">

                                    @include('layouts.items.card-header', ['titulo' => 'Direccion estudiante ENFMP'])
                                    @if($direccionestudiantes->isNotEmpty())
                                    
                                    @else
                                    <p align="right"><a class='btn btn-info' href="{{URL::route('direccionestudiante')}}">Crear Direccion</a></p>
                                    @endif
                                    <p>Desde aqui puedes listar la direccion del estudiante. Como por ejemplo av principal con av central.</p>
                                    
                                    <div class="table-responsive mt-3">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Estado</th>
                                                    <th>Municipio</th>
                                                    <th>Parroquia</th>
                                                    <th>Ciudad/Urbanizacion</th>
                                                    <th>Calle/Avenidad</th>
                                                    <th>Casa/Edificio</th>
                                                    <th>Pto. Referencia</th>
                                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,1) ))
                                                        <th>Opcion</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                                <tr>
                                                    @if($direccionestudiantes<>NULL)
                                                    @foreach ($direccionestudiantes as $direccionestudiante)
                                                    
                                                    <td>{{ $direccionestudiante->id_estado }}</td>
                                                    <td>{{ $direccionestudiante->id_municipio }}</td>
                                                    <td>{{ $direccionestudiante->id_parroquia }}</td>
                                                    <td>{{ $direccionestudiante->ciudad_urbanizacion }}</td>
                                                    <td>{{ $direccionestudiante->calle_avenida }}</td>
                                                    <td>{{ $direccionestudiante->casa_edificio }}</td>
                                                    <td>{{ $direccionestudiante->pto_referencia }}</td>
                                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,1) ))
                                                    <td class="text-center">
                                                            <a href= "/editestudiantedatos/{{$direccionestudiante->id}}" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
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

@endsection