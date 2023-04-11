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
                <b>REGISTRAR VACACIONES PENDIENTES DEL TRABAJADOR(A)</b>
                </div>           
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
                         <tr>
                            <td>
                                <div id="divSubTituloIndex2">
                                   
                                    <hr>
                                    <b> Sumistrar los datos correspondientes a las <span style="color:gray; ">Vacaciones Pendientes del trabajador(a) </span>, haga clic en "Guardar" para registrar su información.
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                           
                                </div>
                            </td>

                        </tr>
                    </table>
      
                <form id="formulario" name="formulario" method="POST" action="{{route('store_vac_pendientes')}}">    
                        @csrf
                        @if(isset($datos_funcionario) )
                             @foreach($datos_funcionario as $key=>$funcionario)             
                                    <input type= "hidden" id="funcionario_id" name="funcionario_id" value="{{$funcionario->funcionario_id}}" class="form-control"  >    
                                    <input type= "hidden" id="cedula" name="cedula" value="{{$cedula}}" class="form-control"  >    
                                                                            
                                    <table align="center" border="1" cellpadding="2" cellspacing="2" width="100%">                            
                                    <tbody>                            
                                    <tr  class="table-secondary">
                                    <th   colspan=9 height="22" align="center"   > <b>  DATOS DEL TRABAJADOR  </b>  </th>
                                    </tr>
                                    <tr  class="table-primary">
                                        <th  rowspan=2  align="center"     >    NACIONALIDAD - CEDULA DE IDENTIDAD </th>
                                        
                                    </tr>
                                    <tr>
                                    <td   ><div align="center">  @if($funcionario->id_nacionalidad==1) V 
                                    @else E @endif - {{$funcionario->numero_identificacion}}  </div></td>
                                    

                                    </tr>

                                    <tr  class="table-primary">
                                    <th  align="center"   >   NOMBRE(s)    </th>
                                    <th  align="center"   >   APELLIDO(s)    </th>
                                    <th  align="center"   >   TIPO DE TRABAJADOR    </th>
                                    <th  align="center"   >   CARGO    </th>
                                    </tr>
                                    
                                    <tr  >
                                    <td   >   {{$funcionario->nombre.' '.$funcionario->nombreseg}}   </td>                   
                                    <td  >   {{$funcionario->apellido.' '. $funcionario->apellidoseg}}   </td>                    
                                    <td  >   {{$funcionario->trabajador}} <input type="hidden" id="tipo_trabajador" name="tipo_trabajador" value="{{$funcionario->id_tipo_funcionario}}"/>  </td>
                                    <td     >   {{$funcionario->cargo}}   </td>
                                    </tr  >
                                    <tr class="table-primary">                     
                                        <th  align="center"   colspan="4">   UNIDAD DE ADSCRIPCIÓN    </th>
                                    
                                    </tr>
                                    <tr  >
                                    <td colspan="4" >   {{$funcionario->administrativa}}   </td>
                                    </tr>
                                    <tr class="table-primary">
                                    <th    align="center"   >   FECHA DE INGRESO ADMINISTRACIÓN PÚBLICA <span style="color:red;">*</span>&nbsp;   </th>
                                        <th   align="center"   >   FECHA DE INGRESO FENFMP <span style="color:red;">*</span>&nbsp;  </th>
                                        <th  align="center"   >   FECHA DE INGRESO VACACIONES <span style="color:red;">*</span>&nbsp;  </th>
                                        <th  align="center"   >   TIEMPO DE SERVICIO ADM. PÚB.  </th>
                                    </tr>
                                    
                                    <tr  >
                                    <td  align="center"   > {{$funcionario->fecha_ingreso_adm}}</td>
                                    <td    > {{$funcionario->fecha_ingreso_fund}}</td>
                                    <td   > {{$funcionario->fecha_ingreso_vac}} <input type="hidden" id="fecha_ingreso_vac" name="fecha_ingreso_vac" value="{{$funcionario->fecha_ingreso_vac}}"/></td>
                                    <td   align="center"  >{{$annos}} años {{$meses}} meses {{$dias}} días 
                                        <input type="hidden" id="annos_adm" name="annos_adm" value="{{$annos}}"/> </td>
                                    </tr>                        
                                    </tbody>                            
                                    </table>
                                    <p><p>
                                @if($annos_servicio>=1)
                                  
                                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%">
                                        <tr>                            
                                            <td>
                                                <span data-tooltip="Permite sólo números" sdata-flow="top">&nbsp;Lapso de Disfrute </span>
                                                <span style="color:red;">*</span>&nbsp;<br>
                                                <input type= "text" id="lapso_disfrute"  name="lapso_disfrute" onkeypress="return isNumberKey(event);" 
                                                onkeydown="return dias_disfrute_lapso(this,document.getElementById('fecha_ingreso_vac'),document.getElementById('tipo_trabajador'),document.getElementById('annos_adm'))"  
                                                value="" class="form-control"  required>                              
                                                @error('lapso_disfrute')
                                                <div class="invalid-feedback">
                                                <span style="color:red;"><strong>{{ $message }}</strong></span>
                                                </div>
                                                @enderror
                                            </td>        
                                            <td>
                                                <span data-tooltip="Permite sólo números"  sdata-flow="top">&nbsp;Días a Disfrute </span><span style="color:red;">*</span>&nbsp;<br>
                                                <input type= "text" id="dias_adisfrutar"  name="dias_adisfrutar" onkeypress="return isNumberKey(event);"  value="" class="form-control" readonly required >                              
                                                @error('dias_adisfrutar')
                                                <div class="invalid-feedback">
                                                <span style="color:red;"><strong>{{ $message }}</strong></span>
                                                </div>
                                                @enderror
                                            </td>
                                            <td>
                                                <span data-tooltip="Permite sólo números" sdata-flow="top">&nbsp;Días Pendientes por disfrutar&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
                                                <input type= "text" id="dias_pendientes" name="dias_pendientes" onkeypress="return isNumberKey(event);"  value="0" class="form-control" required >                              
                                                @error('dias_pendientes')
                                                <div class="invalid-feedback">
                                                <span style="color:red;"><strong>{{ $message }}</strong></span>
                                                </div>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Observaciones <br></span>
                                                <input type= "text" id="observaciones" rows="2" name="observaciones" onkeyup="mayusculas(this);"  value="" class="form-control"  >                              
                                                @error('observaciones')
                                                <div class="invalid-feedback">
                                                <span style="color:red;"><strong>{{ $message }}</strong></span>
                                                </div>
                                                @enderror
                                            </td>
                                        </tr>           
                                        </table>
            
                                    <div class="frameContenedor" style="margin:5px;" align="right">
                                        <input class='btn btn-info' type="submit" value="Guardar" >
                                        <a class='btn btn-secondary' href="{{ URL::route('ver_trabajador',$cedula) }}">Regresar</a> 
                                    </div>  
                </form>  
                                    <hr>
                                    <div class="table-responsive mt-3">
                                        <table id="example1" class="table table-striped table-bordered" style="width:100%">                                
                                            <thead>
                                                    <tr>
                                                    <th>Lapso de Disfrute</th>
                                                    <th>Dias a Disfrutar</th>
                                                    <th>Dias Pendientes por disfrutar</th>
                                                    <th>Estatus del Lapso </th>
                                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                                    <th >Opciones</th>
                                                    @endif
                                                </tr>
                                            </thead>    
                                            <tbody>   
                                                @if(isset($vacaciones))      
                                                    @foreach($vacaciones as $vac)                           
                                                        <tr>                                                                                 
                                                            <td>{{$vac->lapso_disfrute}}</td>
                                                            <td>{{$vac->dias_adisfrutar}}</td>
                                                            <td>{{$vac->dias_pendientes}}</td>
                                                            <td>  @if($vac->status== 1) ACTIVO @else INACTIVO @endif    </td>

                                                            @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10)  )&& $vac->status!=0)
                                                                <td  >
                                                                    <a href= "/rrhh/registrar_vac_pendientesedit/{{$vac->id}}/{{$funcionario->numero_identificacion}}" class="btn btn-info" data-tip="Detalle" title="Actualizar Antecedente" data-toggle="tooltip" data-original-title="Editar">
                                                                    <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
                                                                    </a>
                                                               
                                                                <form method="POST" action="{{URL::route('borrar_vac_pendientes',$vac->id)}}">
                                                                 @csrf
                                                                    <input type="hidden" name="_method" value="delete">
                                                                    <button type="submit" class="btn btn-primary" data-tip="Detalle" title="Eliminar registro" data-toggle="tooltip" data-original-title="Eliminar"> 
                                                                    <img src="/img/icon/erase.ico" class="icon-sm" alt="Listado"></button>                                                                                                            
                                                                </form>
                                                                </td>                                                          
                                                            @else
                                                                <td></td>
                                                            @endif                                                           
                                                        </tr>
                                                    @endforeach
                                                @endif 
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                <th>Lapso de Disfrute</th>
                                                <th>Dias a Disfrutar</th>
                                                <th>Dias Pendientes por disfrutar</th>
                                                <th>Estatus del Lapso </th>
                                                @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                                <th >Opciones</th>
                                                @endif
                                                </tr>
                                            </tfoot>
                                    </table>   
                                    </div>
                                @endif                      
                            @endforeach
                        @endif 
                   
                                
                                @if($annos_servicio == 0)
                                            <table>                   
                                                <tr>
                                                    <td  >
                                                    <div class="alert alert-danger" role="alert">
                                                    <h4 class="alert-heading">Vacaciones Pendientes</h4>
                                                    <p>El trabajador(a),no tiene un (1) año o más de servicio para realizar solicitud de vacaciones.</p>
                                                    <hr>
                                                    <p class="mb-0">Por lo que la Coordinación de Recursos Humanos de la ENFMP no podrá cargarle vacaciones pendientes.</p>
                                                    </div>
                                                    </td>
                                                </tr>
                                                <div class="frameContenedor" style="margin:5px;" align="right">                      
                                                <a class='btn btn-secondary' href="{{ URL::route('ver_trabajador',$cedula) }}">Regresar</a> 
                                                </div>
                                @endif
                                @if($annos_servicio==-1)
                                            <table>  
                                                    <tr>
                                                        <td  >
                                                        <div class="alert alert-warning" role="alert">
                                                        <h4 class="alert-heading">Vacaciones Pendientes</h4>
                                                        <p>El trabajador(a),no tiene cargado su fecha de ingreso para efectos de vacaciones .</p>
                                                        <hr>
                                                        <p class="mb-0">Por lo que la Coordinación de Recursos Humanos de la ENFMP debe cargarle dicha información en <b> Antiguedad Administraciń Pública</b> .</p>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    <div class="frameContenedor" style="margin:5px;" align="right">                      
                                                    <a class='btn btn-secondary' href="{{ URL::route('ver_trabajador',$cedula) }}">Regresar</a> 
                                                    </div>
                                @endif
                                            </table>
                                            
                                       
              
              
                 
         
            </div>
        
        </div>
        </div>
        
    </div>
</div>



@endsection

@section('scripts')
<script src="{{url('js/funciones_generales.js')}}"></script>
<script src="{{url('js/funciones_vacaciones.js')}}"></script>

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