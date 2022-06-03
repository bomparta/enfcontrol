@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
        @include('layouts.apprrhh')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
            <div class="card">
                <div class="card-body">
                    <div align="center" id="divTituloIndex2" class="text-primary">
                                <b> REQUISITOS DIGITALIZADOS</b>
                    </div>
                    
                    <div class="table-responsive mt-3">
                        <table class="table datatable">
                            <thead>
                                <tr>                                   
                                    <th>Imagenes Cargada</th>
                                    
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(10,11,12) ))
                                        <th>Opcion</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                
                                    
                                    <tr>
                                    
                                        <td>Foto de perfil</td>
                                        <td>@if(empty($adjuntosestudiantes[0]->ruta) )
                                            <img src="{{url('img/imagen/foto.jpeg')}}" style="max-width: 250px; max-height: 150px"  alt="Image"/>
                                            @else
                                            <img src="{{ Storage::url( $adjuntosestudiantes[0]->ruta) }}" style="max-width: 250px; max-height: 150px"  alt="Image">
                                            @endif
                                        </td>
                                        
                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,1) ))
                                            @if(empty($adjuntosestudiantes[0]->ruta) )
                                            <td class="text-center">
                                            <a href= "/crearfoto/" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Cargar
                                            </a>
                                            </td>
                                            @else
                                            <td class="text-center">
                                                <a href= "/crearfoto/" class="btn btn-success" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                                <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Editar
                                                </a>
                                                </td>
                                            @endif
                                        @endif
                                            
                                    </tr>
                                    <tr>
                                    
                                        <td>Cedula de Identidad</td>
                                        <td>@if(empty($adjuntoscedula[0]->ruta) )
                                                <img src="{{url('img/imagen/cedula.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"/>
                                            @else
                                                <img src="{{ Storage::url( $adjuntoscedula[0]->ruta) }}" style="max-width: 250px; max-height: 150px"  alt="Image">
                                            @endif
                                        </td>
                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,1) ))
                                            @if(empty($adjuntoscedula[0]->ruta) )
                                            <td class="text-center">
                                            <a href= "/crearcedula/" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Cargar
                                            </a>
                                            </td>
                                            @else
                                            <td class="text-center">
                                                <a href= "/crearcedula/" class="btn btn-success" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                                <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Editar
                                                </a>
                                                </td>
                                            @endif
                                        @endif
                                            
                                    </tr>
                                    <tr>
                                    
                                        <td>Curriculum Vitae</td>
                                        <td>
                                        @if(empty($adjuntoscurriculum[0]->ruta) )
                                            <img src="{{url('img/imagen/curriculum.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"/>
                                        @else
                                            <img src="{{url('img/imagen/curriculum_cargado.jpg')}}" style="max-width: 250px; max-height: 150px"  alt="Image">
                                        @endif
                                        </td>

                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,1) ))
                                        @if(empty($adjuntoscurriculum[0]->ruta) )
                                            <td class="text-center">
                                            <a href= "/crearcurriculum/" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Cargar
                                            </a>
                                            </td>
                                            @else
                                            <td class="text-center">
                                                <a href= "/crearcurriculum/" class="btn btn-success" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                                <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Editar
                                                </a>
                                                </td>
                                            @endif
                                        @endif
                                            
                                    </tr>
                                    <tr>
                                    
                                        <td>Carta de Solicitud</td>
                                        <td>
                                        @if(empty($adjuntoscarta[0]->ruta) )
                                            <img src="{{url('img/imagen/carta.jpg')}}" style="max-width: 250px; max-height: 150px"  alt="Image"/>
                                        @else
                                            <img src="{{url('img/imagen/carta_cargada.jpg')}}" style="max-width: 250px; max-height: 150px"  alt="Image">
                                        @endif
                                    </td>
                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,1) ))
                                            @if(empty($adjuntoscarta[0]->ruta) )
                                            <td class="text-center">
                                            <a href= "/crearcarta/" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Cargar
                                            </a>
                                            </td>
                                            @else
                                            <td class="text-center">
                                                <a href= "/crearcarta/" class="btn btn-success" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                                <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Editar
                                                </a>
                                                </td>
                                            @endif
                                        @endif
                                            
                                    </tr>
                                    <tr>
                                    
                                        <td>Carnet del Colegiatura</td>
                                        <td>
                                            @if(empty($adjuntoscarnetcolegiatura[0]->ruta) )
                                                <img src="{{url('img/imagen/foto_carnet.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"/>
                                                @else
                                                <img src="{{ Storage::url( $adjuntoscarnetcolegiatura[0]->ruta) }}" style="max-width: 250px; max-height: 150px"  alt="Image">
                                            @endif
                                        </td>
                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,1) ))
                                            @if(empty($adjuntoscarnetcolegiatura[0]->ruta) )
                                            <td class="text-center">
                                            <a href= "/crearcarnetcolegiatura/" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Cargar
                                            </a>
                                            </td>
                                            @else
                                            <td class="text-center">
                                                <a href= "/crearcarnetcolegiatura/" class="btn btn-success" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                                <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Editar
                                                </a>
                                                </td>
                                            @endif
                                        @endif
                                            
                                    </tr>
                                    <tr>
                                    
                                        <td>Impre del Colegio</td>
                                        <td>
                                            @if(empty($adjuntosimpre[0]->ruta) )
                                                <img src="{{url('img/imagen/foto_carnet.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"/>
                                            @else
                                                <img src="{{ Storage::url( $adjuntosimpre[0]->ruta) }}" style="max-width: 250px; max-height: 150px"  alt="Image">
                                            @endif
                                        </td>
                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,1) ))
                                            @if(empty($adjuntosimpre[0]->ruta) )
                                            <td class="text-center">
                                            <a href= "/crearimpre/" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Cargar
                                            </a>
                                            </td>
                                            @else
                                            <td class="text-center">
                                                <a href= "/crearimpre/" class="btn btn-success" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                                <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Editar
                                                </a>
                                                </td>
                                            @endif
                                        @endif
                                            
                                    </tr>
                                   
                                
                                
                            </tbody>
                        </table>
                    </div>



                </div>
            </div> <!-- card -->
        </div>
    </div> <!-- row -->
</div>

</div> <!-- row -->
</div>
@endsection