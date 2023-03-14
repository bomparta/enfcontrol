
@extends('layouts.app')
@section('styles')
@endsection
@section('content')
<div class="d-flex" id="wrapper">
        @include('layouts.apprrhh')      
    <div id="page-content-wrapper">
        <div class="sidebar-heading text-center">
            <h4 class="text-primary" >CONTROL DE EXPEDIENTES RRHH</h6>      
            <h6 class="text-dark">Bienvenid@, {{Auth::user()->name}}</h6>
        </div>   
            <div class="container pb-4">
                 <div class="row align-items-stretch">
                        <div class="col-12">
                            <div class="card mb-4">
                                <div align="center" id="divTituloIndex2" class="text-primary">
                                <b>MOVIMIENTOS DE PERSONAL</b>
                                </div>
                                <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
                                <tr>
                                    <td>
                                        <div id="divSubTituloIndex2">
                                            <hr>
                                            <b> <span style="color:gray; ">Movimientos del Trabajador(a)</span> en la FENFMP, para registrar un movimiento para este trabajador(a), hacer clic en "Registrar Movimiento RRHH".
                                            <hr>   
                                            @include('rrhh.funcionario.mensaje')  
                                        </div>
                                    </td>
                                </tr>
                                </table>
                                @if(isset($datos_funcionario))
                                    @foreach($datos_funcionario as $key=>$funcionario)    
                                        <form id="formulario" name="formulario" method="POST" action="#">    
                                            @csrf                                            
                                            <div class="table-responsive mt-3">
                                                <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%">                     
                                                    <tbody>
                                                        <tr>
                                                            <td colspan=13>
                                                                <div class="frameContenedor" style="margin:5px;" align="right">
                                                                    <p align="right"><a class='btn btn-info' href="{{URL::route('registrar_mov_rrhh',$funcionario->numero_identificacion)}}">Registrar Movimiento RRHH</a>
                                                                    <a class='btn btn-secondary' href="{{ URL::route('ver_trabajador',$funcionario->numero_identificacion) }}">Regresar</a> 
                                                                    </p>
                                                                </div>
                                                            </td>
                                                        </tr>    
                                                        <tr  class="table-secondary">
                                                            <th   colspan=13 height="22" align="center"   >   DATOS DEL TRABAJADOR    </th>
                                                        </tr>
                                                        <tr  class="table-primary">
                                                            <th colspan="13" align="center"     >    NACIONALIDAD - CEDULA DE IDENTIDAD </th>	
                                                        </tr>
                                                        <tr>
                                                            <td   colspan="13" ><div align="center">  @if($funcionario->id_nacionalidad==1) V 
                                                            @else E @endif - {{$funcionario->numero_identificacion}}  </div>
                                                        </td>
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
                                                            <th  colspan=3  align="center"   >   SEXO    </th>
                                                            <th  colspan=4 align="center"   >   ESTADO CIVIL      </th>
                                                            <th  colspan=5 align="center"   >    FECHA Y LUGAR  DE NACIMIENTO    </th>
                                                            <th  align="center"   >   EDAD    </th>
                                                        </tr>
                                                        <tr>
                                                            <td  colspan=3  align="center"   >   @if($funcionario->id_genero==2) FEMENINO @else MASCULINO @endif    </td>
                                                            <td  align="center" colspan="4"  > {{$funcionario->est_civil}}   </td>
                                                            <td  align="center"  colspan=5  >   {{date('d-m-Y', strtotime($funcionario->edad))}}   {{$funcionario->ciudad_nac}}  {{$funcionario->estado_nac}}   </td>
                                                            <td  align="center"   >{{$edad}}  AÑOS </td>
                                                        </tr>
                                                        <tr  class="table-primary">
                                                            <th  colspan=6  align="center"   >   TIPO DE TRABAJADOR    </th>
                                                            <th  colspan=3 align="center"   >   CARGO    </th>
                                                            <th  colspan=4 align="center"   >   UNIDAD DE ADSCRIPCIÓN    </th>
                                                        </tr>
                                                        <tr>
                                                            <td  colspan=6 align="center"   >   {{$funcionario->trabajador}}   </td>
                                                            <td  colspan=3 rowspan=2 align="center"   >   {{$funcionario->cargo}}   </td>
                                                            <td  colspan=4 rowspan=2 align="center"   >   {{$funcionario->administrativa}}   </td>
                                                        </tr> 
                                                    </tbody>            
                                                </table>
                                            </div>
                                        </form>
                                    @endforeach 
                                  
                                    <div class="table-responsive mt-3">
                                        <table id="example1" class="table table-striped table-bordered" style="width:100%">                                
                                        <thead>
                                            <tr>
                                                <th>Tipo de Movimiento</th>
                                                <th>Tipo de Trabajador(a)</th>
                                                <th>Cargo</th>
                                                <th>Unidad Administrativa</th>
                                                <th>Fecha de Movimiento</th>    
                                                @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                                    <th >Opciones</th>
                                                @endif
                                            </tr>
                                        </thead>   
                                        <tbody>   
                                        @if(isset($movimiento))
                                            @foreach($movimiento as $movimiento)                         
                                                <tr>      
                                                    <td>{{$movimiento->tipo_mov}}</td>
                                                    <td>{{$movimiento->tipo_trabajador}}</td>
                                                    <td>{{$movimiento->cargo}}</td>
                                                    <td>{{$movimiento->ubic_administrativa}}</td>
                                                    <td>{{$movimiento->fechamov}}</td>
                                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                                        <td >
                                                            <a href= "/rrhh/registrar_rrhhedit/{{$movimiento->id_rrhh_mov}}" class="btn btn-info" data-tip="Detalle" title="Actualizar" data-toggle="tooltip" data-original-title="Editar">
                                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
                                                            </a>                                          
                                                            &nbsp;&nbsp;
                                                            @if($movimiento->tipo_mov=='EGRESO')
                                                            <a href= "/rrhh/creardocumento_rrhh/{{$tipo_documento='carta_renuncia'}}/{{$movimiento->id_rrhh_mov}}/{{$funcionario->numero_identificacion}}" class="btn btn-success" data-tip="Detalle" title="Contrato" data-toggle="tooltip" data-original-title="Editar">
                                                                <img src="/img/icon/carta_ren.ico" class="icon-sm" alt="Listado">
                                                            </a>                                         
                                                            <a href= "/rrhh/creardocumento_rrhh/{{$tipo_documento='aprob_renuncia'}}/{{$movimiento->id_rrhh_mov}}/{{$funcionario->numero_identificacion}}" class="btn btn-warning" data-tip="Detalle" title="Carta de Renuncia Voluntaria" data-toggle="tooltip" data-original-title="Editar">
                                                                <img src="/img/icon/carta_aprob.ico" class="icon-sm" alt="Listado">
                                                            </a>  
                                                                                                 
                                                            &nbsp;&nbsp;&nbsp;
                                                            @else  
                                                            <a href= "/rrhh/creardocumento_rrhh/{{$tipo_documento='rrhh_mov'}}/{{$movimiento->id_rrhh_mov}}/{{$funcionario->numero_identificacion}}" class="btn btn-success" data-tip="Detalle" title="Contrato, Resolución y/u Otro documento" data-toggle="tooltip" data-original-title="Editar">
                                                                <img src="/img/icon/list.ico" class="icon-sm" alt="Listado">
                                                            @endif
                                                            </a>                                          
                                                        </td>
                                                    @endif                                                   
                                                </tr>
                                            @endforeach                          
                                        </tbody>
                                        @endif  
                                        <tfoot>
                                            <tr>
                                                <th>Tipo de Movimiento</th>
                                                <th>Tipo de Trabajador(a)</th>
                                                <th>Cargo</th>
                                                <th>Unidad Administrativa</th>
                                                <th>Fecha de Movimiento</th>                                   
                                                @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                                    <th >Opciones</th>
                                                @endif
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>  
                                @endif                                                          
                            </div>
                        </div>            
                </div>
            </div>                            
    </div>
</div>



@endsection

@section('scripts')
<script src="{{url('js/funciones_generales.js')}}"></script>

<!-- jQuery -->
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