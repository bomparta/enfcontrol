@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
    @include('layouts.appbienes')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
            <div align="center" id="divTituloIndex2" class="text-primary">
              
                <b>INCORPORACIÓN DE BIENES</b>
                </div>
               
                    <table align="center" border="0" cellpadding="2" cellspacing="5" width="100%" >
                    <tr>
                            <td colspan="4">
                            <div class="col-12 text-center">
                                     
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <h4>Bienes Nacionales Incorporados en la FENFMP </h4>
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                                </div>
                            </td>
                        </tr>   
                        <div class="frameContenedor" style="margin:5px;" align="right">
                   
                   <a class='btn btn-info' href="{{URL::route('crearbienes')}}">Crear Ficha <br>Bien Nacional</a> 
                   </div>
                </table>
                       
                       <table>
               <form id="formulario" name="formulario" method="post" action="{{route('laboralregistrar')}}">
              
                <input id="id_funcionario" type="hidden" name="id_funcionario" value="" >
                @csrf
                      
                    
                <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%"> 
                            <thead>  
                                <tr>
                                    <th>N° Bien</th>
                                    <th>Descripción</th>
                                    <th>Ubicación</th>
                                    <th>Marca</th>
                                    <th>Serial</th>
                                    <th>Modelo</th>
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
                                        <td>{{$bienes->marca}}</td>
                                        <td>{{$bienes->modelo}}</td>
                                        <td>{{$bienes->color}}</td>
                                        @if(in_array( Auth::user()->id_usuariogrupo, array(13) ))
                                            <td class="text-center">
                                            <a href= "bienes_edit/{{$bienes->id_bien}}" class="btn btn-info" data-tip="Detalle" title="Modificar Ficha" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
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
                                    <th>Ubicación</th>
                                    <th>Marca</th>
                                    <th>Serial</th>
                                    <th>Modelo</th>
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(13) ))
                                        <th>Opción</th>
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