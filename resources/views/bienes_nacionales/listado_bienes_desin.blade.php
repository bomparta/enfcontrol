@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
    @include('layouts.appbienes')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
            <div align="center" id="divTituloIndex2" class="text-primary">
              
                <b>DESINCORPORACIÖN DE BIENES NACIONALES</b>
                </div>
               
                    <table align="center" border="0" cellpadding="2" cellspacing="5" width="100%" >
                    <tr>
                            <td colspan="4">
                            <div class="col-12 text-center">
                                     
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <h4>Desincorporar Bienes Nacionales en la FENFMP </h4>
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                                </div>
                            </td>
                        </tr>   
                        <div class="frameContenedor" style="margin:5px;" align="right">
                        <a class='btn btn-info' href="{{URL::route('todos_desin_bienes')}}">Ver Todos los <br>Bienes Nacionales <br>Desincorporados</a>  
                        </div>
                </table>
                       
                       <table>
               <form id="formulario" name="formulario" method="post" action="{{route('registrar_mov_bienes')}}">
              
                
                @csrf
                      
                    
                    <div class="table-responsive mt-3">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">                        
                            <thead>
                                <tr>
                                    <th>N° Bien</th>
                                    <th>Descripción</th>
                                    <th>Ubicación Administrativa</th>
                                    <th>Responsable</th>
                                    <th>Tipo de Movimiento</th>
                                    
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(13) ))
                                        <th>Opción</th>
                                    @endif
                                </tr>
                            </thead> 
                            <tbody>   
                            @foreach($bienes as $bienes)   
                            
                                                 
                                <tr>                                                    
                                <td>{{$bienes->num_bien}}</td>
                                        <td>{{$bienes->tipo_bien}}</td>
                                        <td>{{$bienes->ubic_adm}}</td>
                                        <td>{{$bienes->responsable_asignado}}</td>
                                        <td>@if($bienes->tipo_movimiento_id==1) INCORPORACIÖN 
                                            @elseif($bienes->tipo_movimiento_id==2) ASIGNACIÓN 
                                            @elseif($bienes->tipo_movimiento_id==3) TRASLADO 
                                            @elseif($bienes->tipo_movimiento_id==4) ENAJENACIÓN
                                            @elseif($bienes->tipo_movimiento_id==5) PRÉSTAMO 
                                            @elseif($bienes->tipo_movimiento_id==6) DESINCORPORACIÖN @endif
                                        </td>                                      
                                        @if(in_array( Auth::user()->id_usuariogrupo, array(13) ))
                                            <td class="text-center">
                                            <a href= "bienes_desin/{{$bienes->id}}/{{$bienes->bienes_id}}" class="btn btn-info" data-tip="Detalle" title="Registrar Desincorporación" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/add.ico" class="icon-sm" alt="Listado">
                                            </a>
                                            </td>
                                        @endif                                                            
                                    </tr>
                            @endforeach
                            </tbody>    
                            <tfoot>
                            <tr>
                                    <th>N° Bien</th>
                                    <th>Descripción</th>
                                    <th>Ubicación Administrativa</th>
                                    <th>Responsable</th>
                                    <th>Tipo de Movimiento</th>
                                    
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(13) ))
                                        <th>Opcion</th>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                   
                </form>

            </div>

        </div>
    </div>
</div>

@endsection