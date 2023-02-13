@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
    @include('layouts.appvacaciones')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
            <div align="center" id="divTituloIndex2" class="text-primary">
               
                <b>FUNCIONARIOS</b>
                </div>
            
                    <table  align="center" border="0" cellpadding="5" cellspacing="2" width="100%" >
                    <tr>
                            <td colspan="4">
                            <div class="col-12 text-center">
                
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{route('funcionario_vacaciones')}}">Solicitudes Realizadas</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link "  href="{{route('vacaciones_pendientes')}}">Lapsos Pendientes de Disfrute</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('vacaciones_pendientes')}}">Lapsos Disfrutados</a>
                                </li>                                
                                </ul>
                                     
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <b>Realizar  <span style="color:gray;">su Solicitud de Vacaciones</span> , haga clic en "Guardar" para actualizar su información <b>
                                    <hr>  
                                    @include('rrhh.funcionario.mensaje')   
                                </div>
                            </td>
                        </tr>
                        </table>
                        
                        @foreach($datos_funcionario as $key=>$funcionario)   
                        <p align="right"><a class='btn btn-info' href="{{URL::route('registrar_solicitud',$funcionario->numero_identificacion)}}">Solicitar Vacaciones</a></p>
            <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%"> 
               <form id="formulario" name="formulario" method="post" action="#">    
                <input id="id_solicitud" type="hidden" name="id_solicitud" value="" >
                @csrf     
                     <tbody>
                    
                     <tr  class="table-secondary">
                     <th   colspan=13 height="22" align="center"   >   DATOS DEL TRABAJADOR    </th>
                     </tr>
                     <tr  class="table-primary">

                     <th colspan="13" align="center"     >    NACIONALIDAD - CEDULA DE IDENTIDAD </th>		

                     </tr>
                     <tr>

                     <td   colspan="7" ><div align="center">  @if($funcionario->id_nacionalidad==1) V 
                     @else E @endif - {{$funcionario->numero_identificacion}}  </div></td>

                     </tr>

                     <tr  class="table-primary">
                     <th  colspan=4 align="center"   >   PRIMER NOMBRE    </th>
                     <th  colspan=3 align="center"   >   SEGUNDO NOMBRE    </th>
                     <th  colspan=3 align="center"   >    PRIMER  APELLIDO    </th>
                     <th  colspan=3 align="center"   >   SEGUNDO APELLIDO    </th>
                     </tr>
                     <tr >
                     <td  colspan=4 align="center"   >   {{$funcionario->nombre}}    </td>
                     <td  colspan=3 align="center"  >  {{$funcionario->nombreseg}}    </td>
                     <td  colspan=3 align="center"   >   {{$funcionario->apellido}}     </td>
                     <td  colspan=3 align="center"   >   {{$funcionario->apellidoseg}}     </td>
                     </tr>
                     <tr  class="table-primary">
                     <th  colspan=6 align="center"   >   SEXO    </th>
                     <th  colspan=7    >   ESTADO CIVIL      </th>

                     </tr>
                     <tr>
                     <td  colspan=7  >   @if($funcionario->id_genero==2) FEMENINO @else MASCULINO @endif    </td>
                     <td  colspan=6   > {{$funcionario->est_civil}}   </td>
          
                     </tr>

                     <tr  class="table-primary">
                     <th  colspan=6  align="center"   >   TIPO DE TRABAJADOR    </th>
                     <th  colspan=3 align="center"   >   CARGO    </th>
                     <th  colspan=4 align="center"   >   UNIDAD DE ADSCRIPCIÓN    </th>
                     </tr>
                     <tr>
                     <td  colspan=6 align="center"   >   {{$funcionario->trabajador}}   </td>
                     <td  colspan=3    >   {{$funcionario->cargo}}   </td>
                     <td  colspan=4    >   {{$funcionario->administrativa}}   </td>
                     </tr>
                     <tr  class="table-primary">
                     <th  colspan=6  align="center"   >   FECHA DE INGRESO ADMINISTRACIÓN PÚBLICA    </th>
                     <th  colspan=3 align="center"   >   FECHA DE INGRESO FENFMP    </th>
                     <th  colspan=4 align="center"   >   FECHA DE INGRESO VACACIONES   </th>
                     </tr>
                     <tr>
                     <td  colspan=6 align="center"   >   {{date('d-m-Y',strtotime($funcionario->fecha_ingreso_adm))}}   </td>
                     <td  colspan=3   >    {{date('d-m-Y',strtotime($funcionario->fecha_ingreso_fund))}}   </td>
                     <td  colspan=4   >    {{date('d-m-Y',strtotime($funcionario->fecha_ingreso_vac))}}   </td>
                     </tr>
                     </tbody>
              
                     @endforeach
                </table>
                <p><hr></p>            

                    <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped" >                        
                        <thead>
                            <tr>
                                <th>Fecha de Solicitud</th>
                                <th>Lapso Disfrute</th>
                                <th>Cargo</th>
                                <th>Unidad Administrativa</th>
                                <th>Fecha de Movimiento</th>                                   
                                @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                    <th>Opciones</th>
                                @endif
                            </tr>
                        </thead>   
                        <tbody>   
                            @if(isset($movimiento)   )
                                @foreach($movimiento as $movimiento)                         
                                    <tr>      
                                    <td>{{$movimiento->tipo_mov}}</td>
                                    <td>{{$movimiento->tipo_trabajador}}</td>
                                    <td>{{$movimiento->cargo}}</td>
                                    <td>{{$movimiento->ubic_administrativa}}</td>
                                    <td>{{$movimiento->fechamov}}</td>
                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                            <td class="text-center">
                                            <a href= "/rrhh/registrar_rrhhedit/{{$movimiento->id_rrhh_mov}}" class="btn btn-info" data-tip="Detalle" title="Actualizar" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
                                            </a>
                                            &nbsp; &nbsp;
                                            @if($movimiento->tipo_mov=='EGRESO')
                                            <a href= "/rrhh/creardocumento_rrhh/{{$tipo_documento='carta_renuncia'}}/{{$movimiento->id_rrhh_mov}}/{{$funcionario->numero_identificacion}}" class="btn btn-info" data-tip="Detalle" title="Contrato" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/carta_ren.ico" class="icon-sm" alt="Listado">
                                            </a>
                                            &nbsp; &nbsp;
                                            <a href= "/rrhh/creardocumento_rrhh/{{$tipo_documento='aprob_renuncia'}}/{{$movimiento->id_rrhh_mov}}/{{$funcionario->numero_identificacion}}" class="btn btn-info" data-tip="Detalle" title="Carta de Renuncia Voluntaria" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/carta_aprob.ico" class="icon-sm" alt="Listado">
                                            </a>
                                            @else
                                            
                                            <a href= "/rrhh/creardocumento_rrhh/{{$tipo_documento='rrhh_mov'}}/{{$movimiento->id_rrhh_mov}}/{{$funcionario->numero_identificacion}}" class="btn btn-info" data-tip="Detalle" title="Aprobación de la Renuncia" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/list.ico" class="icon-sm" alt="Listado">
                                            @endif
                                            </td>
                                        @endif                                                            
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                       
                    </table>

                    </div>
                  
                   
                   </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script src="{{url('js/funciones_generales.js')}}"></script>
@endsection
