@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
    @include('layouts.appbienes')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
            <div align="center" id="divTituloIndex2" class="text-primary">
              
                <b>BIENES NACIONALES DESINCORPORADOS</b>
                </div>
               
                    <table align="center" border="0" cellpadding="2" cellspacing="5" width="100%" >
                    <tr>
                            <td colspan="4">
                            <div class="col-12 text-center">
                                     
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <h4>Movimientos Bienes Nacionales en la FENFMP </h4>
                                  
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                                </div>
                            </td>
                        </tr>   
                        
                </table>
                       
                       <table>
               <form id="formulario" name="formulario" method="post" action="{{route('registrar_mov_bienes')}}">
              
                <input id="id_funcionario" type="hidden" name="id_funcionario" value="" >
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
                                        <th>Estatus del Movimiento</th>
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
                                        <td>{{$bienes->tipo_movimiento}}</td>
                                       
                                        @if(in_array( Auth::user()->id_usuariogrupo, array(13) ))
                                            <td class="text-center">
                                                @if($bienes->status==1)
                                                <img src="/img/icon/button_green.png"width="20" height="20" class="icon-sm" alt="Listado" title="último movimiento registrado">                                            
                                                @else
                                                <img src="/img/icon/button_gray.png"width="20" height="20" class="icon-sm" alt="Listado" >                                            
                                                @endif
                                            
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
                                    <th>Estatus del Movimiento</th>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                   
                </form>
                <div class="frameContenedor" style="margin:5px;" align="right">
                        <a class='btn btn-secondary' href="{{URL::route('desin_bienes')}}">Regresar</a> 
                        </div>
            </div>

        </div>
    </div>
</div>

@endsection