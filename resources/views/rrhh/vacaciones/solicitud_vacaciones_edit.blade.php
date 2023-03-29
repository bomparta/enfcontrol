
@extends('layouts.app')
@section('styles')
@endsection
@section('content')
<div class="d-flex" id="wrapper">
        @include('layouts.appvacaciones')      
    <div id="page-content-wrapper">
        <div class="sidebar-heading text-center">
            <h4 class="text-primary" >VACACIONES</h6>      
            <h6 class="text-dark">Bienvenid@, {{Auth::user()->name}}</h6>
        </div>   
            <div class="container pb-4">
                 <div class="row align-items-stretch">
                        <div class="col-12">
                            <div class="card mb-4">
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
                                    <a class="nav-link" href="{{route('vacaciones_disfrutadas')}}">Lapsos Disfrutados</a>
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
                    <div class="table-responsive mt-3">
                        <table id="example1" class="table table-striped table-bordered" style="width:100%">                     
                        <thead>
                            <tr>
                                <th >Fecha de Solicitud</th>
                                <th>Dias de  Disfrute</th>
                                <th>Fecha de Inicio </th>
                                <th>Fecha de Reintegro </th>
                                 
                                <th>Estatus de la Solicitud</th>                                    
                                <th>Niveles de Aprobación</th>      
                                @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10,11) ))
                                    <th>Opciones</th>
                                @endif
                            </tr>
                        </thead>   
                        <tbody>   
                            @if(isset( $vacaciones_solicitudes)   )
                                @foreach($vacaciones_solicitudes as $vacaciones)                         
                                    <tr>      
                                    <td>{{$vacaciones->fecha_solicitud}}</td>
                                    <td>{{$vacaciones->dias_disfrute}} días</td>
                                    <td>{{$vacaciones->fecha_inicio}}</td> 
                                    <td>{{$vacaciones->fecha_reintegro}}</td>                                  
                                 <td>
                                    <div align="center">
                                            @if($vacaciones->revisado==1)   
                                            <img src="{{url('img/icon/check.png')}}" style="max-width: 40px; max-height: 40px"  alt="Image">  Revisada <br>
                                                @if($vacaciones->tipo_aprobacion_director==1)   
                                                <img src="{{url('img/icon/check.png')}}" style="max-width: 40px; max-height: 40px"  alt="Image">  Aprobada
                                                 @endif
                                                @if($vacaciones->tipo_aprobacion_director==2)
                                                <img src="{{url('img/icon/reloj.png')}}" style="max-width: 40px; max-height: 40px"  alt="Image">  Diferido
                                                @endif
                                                @if($vacaciones->tipo_aprobacion_director==3)
                                                <img src="{{url('img/icon/erase.ico')}}" style="max-width: 40px; max-height: 40px"  alt="Image">  Denegado
                                                @endif
                                                <br>
                                                @if($vacaciones->tipo_aprobacion_presidencia==1)   
                                                <img src="{{url('img/icon/check.png')}}" style="max-width: 40px; max-height: 40px"  alt="Image">  Aprobada
                                                 @endif
                                                @if($vacaciones->tipo_aprobacion_presidencia==2)
                                                <img src="{{url('img/icon/reloj.png')}}" style="max-width: 40px; max-height: 40px"  alt="Image">  Diferido
                                                @endif
                                                @if($vacaciones->tipo_aprobacion_presidencia==3)
                                                <img src="{{url('img/icon/erase.ico')}}" style="max-width: 40px; max-height: 40px"  alt="Image">  Denegado
                                                @endif

                                            @else
                                            <img src="{{url('img/icon/erase.ico')}}" style="max-width: 40px; max-height: 40px"  alt="Image">  Sin Revisar</td>
                                            @endif
                                    </div>
                                </td>    
                                        <td> 
                                       @if($vacaciones->aprobado_coordinador==1)   
                                                <div align="center"><img src="{{url('img/icon/check.png')}}" style="max-width: 40px; max-height: 40px"  alt="Image"> 
                                                    <span class='btn-info badge'><font color=#F2F3F8>Jefe(a) Inmediato o Coordinador(a)</font></span> 
                                                </div>                                           
                                        @else
                                                                           
                                                <div align="center"><img src="{{url('img/icon/erase.ico')}}" style="max-width: 40px; max-height: 40px"  alt="Image"> 
                                                    <span class='btn-info badge'><font color=#F2F3F8>Jefe(a) Inmediato o Coordinador(a)</font></span> 
                                                </div>
                                       
                                        @endif
                                        @if($vacaciones->aprobado_director==1)
                                           
                                                                                 
                                                <div align="center"><img src="{{url('img/icon/check.png')}}" style="max-width: 40px; max-height: 40px"  alt="Image"> 
                                                    <span class='btn-info badge'><font color=#F2F3F8>Director(a)</font></span> 
                                                </div>
                                           
                                        @else
                                                                            
                                                <div align="center"><img src="{{url('img/icon/erase.ico')}}" style="max-width: 40px; max-height: 40px"  alt="Image"> 
                                                    <span class='btn-info badge'><font color=#F2F3F8>Director(a)</font></span> 
                                                </div>
                                       
                                        @endif
                                        @if($vacaciones->aprobado_presidencia==1)
                                                                                                                             
                                                <div align="center"><img src="{{url('img/icon/check.png')}}" style="max-width: 40px; max-height: 40px"  alt="Image"> 
                                                    <span class='btn-info badge'><font color=#F2F3F8>Presidente(a)</font></span> 
                                                </div>
                                          
                                        @else
                                                                           
                                                <div align="center"><img src="{{url('img/icon/erase.ico')}}" style="max-width: 40px; max-height: 40px"  alt="Image"> 
                                                    <span class='btn-info badge'><font color=#F2F3F8>Presidente(a)</font></span> 
                                                </div>
                                       
                                        @endif  
                                        </td>
                                        <td>
                                        @if($vacaciones->revisado==0)                                             
                                                <a href= "#" class="btn btn-info" data-tip="Detalle" title="Actualizar" data-toggle="tooltip" data-original-title="Editar">
                                                <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
                                                </a>  
                                                @else
                                                @if($vacaciones->aprobado_presidencia=="" && $vacaciones->aprobado_director=="" )
                                                    <b>Pendiente por Aprobación<b>  <img src="/img/icon/adv.jpg" class="icon-sm" alt="Listado">
                                                    @elseif($vacaciones->aprobado_presidencia=="" && $vacaciones->aprobado_director==1 && $vacaciones->tipo_aprobacion_director !=1 )
                                                    <b>Rechazada por la Dirección<b>  <img src="/img/icon/no.ico" class="icon-sm" alt="Listado">                                                                                           
                                                 @endif
                                            @endif      
                                        </td>
                                                                                        
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Fecha de Solicitud</th>
                                <th>Dias de  Disfrute</th>
                                <th>Fecha de Inicio </th>
                                <th>Fecha de Reintegro </th>                                
                                <th>Estatus de la Solicitud</th>                                    
                                <th >Niveles de Aprobación</th>    
                                @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10,11) ))
                                    <th>Opciones</th>
                                @endif
                            </tr>
                        </tfoot>   
                       
                    </table>

                    </div>
                  
                   
                   </div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script src="{{url('js/funciones_generales.js')}}"></script><!-- jQuery -->

<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/jszip/jszip.min.js"></script>
<script src="/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js" defer></script>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

  <script>

$(function () {
    $('#example1').DataTable({
"language": {
"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
}
});
});
</script>
@endsection
