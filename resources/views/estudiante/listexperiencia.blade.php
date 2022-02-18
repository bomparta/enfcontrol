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
                                    @include('layouts.items.card-header', ['titulo' => 'Experiencia laboral del estudiante ENFMP'])
                                    {{-- @if(!$experienciaestudiantes->id) --}}
                                    <p align="right"><a class='btn btn-info' href="{{URL::route('experienciaestudiante')}}">Crear Experiencia Laboral</a></p>
                                    {{-- @endif --}}
                                    <p>Desde aqui puedes listar las experiencias laborales del estudiante.</p>
                                    
                                    <div class="table-responsive mt-3">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Lugar de Trabajo</th>
                                                    <th>Cargo que Desempeña</th>
                                                    <th>Telefono</th>
                                                    <th>Jubilado/o ad</th>
                                                    <th>Estado donde inscribio</th>
                                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,1) ))
                                                        <th>Opcion</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                              
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,1) ))
                                                    <td class="text-center">
                                                            <a href= "/editestudiantedatos/{{$experienciaestudiantes->id}}" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                                                <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
                                                            </a>
                                                        </td>
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