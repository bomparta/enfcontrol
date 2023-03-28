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
                <b>REGISTRAR ANTECEDENTES DE SERVICIO EN LA ADMINISTRACIÓN PÚBLICA</b>
                </div>           
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
                         <tr>
                            <td>
                                <div id="divSubTituloIndex2">
                                   
                                    <hr>
                                    <b> Sumistrar los datos correspondientes a la <span style="color:gray; ">Antecedentes de la Administración Pública </span> del funcionario, haga clic en "Guardar" para registrar su información.
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                           
                                </div>
                            </td>

                        </tr>
                    </table>
      
                <form id="formulario" name="formulario" method="POST" action="{{route('store_antecedentes')}}">    
                @csrf
                @if(isset($datos_funcionario))
                @foreach($datos_funcionario as $key=>$funcionario)
             
                    <input type= "hidden" id="funcionario_id" name="funcionario_id" value="{{$funcionario->funcionario_id}}" class="form-control"  >    
                    <input type= "hidden" id="cedula" name="cedula" value="{{$cedula}}" class="form-control"  >    
                    <input type="hidden" name="tipo_documento" id="tipo_documento" value="adm_pub_constancia" required>                                                    
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
                            <td  >   {{$funcionario->trabajador}}   </td>
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
                            <td  align="center"   > <input type="date" id ="fecha_ingreso_adm" name="fecha_ingreso_adm" value="{{$funcionario->fecha_ingreso_adm}}" class="form-control"  required>   </td>
                            <td    >  <input type="date" id ="fecha_ingreso_fund" name="fecha_ingreso_fund" value="{{$funcionario->fecha_ingreso_fund}}"  class="form-control"  required>    </td>
                            <td   >   <input type="date" id ="fecha_ingreso_vac" name="fecha_ingreso_vac" value="{{$funcionario->fecha_ingreso_vac}}" class="form-control"  required>  </td>
                            <td   align="center"  >{{$annos}} años {{$meses}} meses {{$dias}} días </td>
                            </tr>

                        
                            </tbody>
                            
                            </table>
                            <p><p>
                            <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%">
                            <tr>                            
                            <td>
                            <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Nombre de la Institución u Organismo </span>
                            <span style="color:red;">*</span>&nbsp;<br>
                                        <input type= "text" id="institucion" rows="2" name="institucion" onkeyup="mayusculas(this);"  value="" class="form-control"  required>                              
                                        @error('institucion')
                                            <div class="invalid-feedback">
                                            <span style="color:red;"><strong>{{ $message }}</strong></span>
                                            </div>
                                        @enderror
                                    </td>        
                                    <td>
                                    <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Último Cargo Desempeñado </span><span style="color:red;">*</span>&nbsp;<br>
                                        <input type= "text" id="ult_cargo" rows="2" name="ult_cargo" onkeyup="mayusculas(this);"  value="" class="form-control" required >                              
                                        @error('observaciones')
                                            <div class="invalid-feedback">
                                            <span style="color:red;"><strong>{{ $message }}</strong></span>
                                            </div>
                                        @enderror
                                    </td>
                                    <td>
                                    <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">&nbsp;Tipo de Trabajador&nbsp;</span>
                                    <span style="color:red;">*</span>&nbsp;<br>
                                        <select id="id_tipo_trabajador" name="id_tipo_trabajador"  class="form-control" required >
                                        <option value="0">Seleccione...</option>
                                            @foreach ($tipo_trabajador as $tipo_trabajador)
                                            <option value="{{ $tipo_trabajador->id }}"
                                            @if($funcionario->tipo_trabajador == $tipo_trabajador->id) selected @endif >
                                            {{ $tipo_trabajador->descripcion }} </option>
                                            @endforeach
                                        </select>
                                        @error('id_tipo_trabajador')
                                            <div class="invalid-feedback">
                                            <span style="color:red;"><strong>{{ $message }}</strong></span>
                                            </div>
                                        @enderror
                                    </td>
                            </tr>
                        <tr>
                        <td>
                        <span data-tooltip="Indique una fecha del calendario" sdata-flow="top">&nbsp;Fecha de Ingreso al Organismo&nbsp;</span><span style="color:red;">*</span><br>
                                        <input type="date" name="fechaingreso" id="fechaingreso" value="{{ old('fechaingreso') }}"  required/>
                                
                                    @error('fechaingreso')
                                        <div class="invalid-feedback">
                                            <span style="color:red;"><strong>{{ $message }}</strong></span>
                                            </div>
                                        @enderror  
                            
                                        </td>
                                    <td>
                                    <span data-tooltip="Indique una fecha del calendario" sdata-flow="top">&nbsp;Fecha de Egreso del Organismo&nbsp;</span><span style="color:red;">*</span><br>
                                        <input type="date" name="fechaegreso" id="fechaegreso" value="{{ old('fechaegreso') }}"  required/>
                                
                                    @error('fechaegreso')
                                        <div class="invalid-feedback">
                                            <span style="color:red;"><strong>{{ $message }}</strong></span>
                                            </div>
                                        @enderror  
                            
                                        </td>
                                    
                                </tr>
                            <!--   <tr><td colspan="2">Años Servicio  en el cargo:     años   meses  dias</td></tr>-->
                            
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
                            
                            <tr> 
                        
                        
                            </table>
                          
  
                        <div class="frameContenedor" style="margin:5px;" align="right">
                            <input class='btn btn-info' type="submit" value="Guardar" >
                            <a class='btn btn-secondary' href="{{ URL::route('ver_trabajador',$cedula) }}">Regresar</a> 
                        </div>
                    </form>
                    @endforeach
                    @endif 
                    <hr>
                <div class="table-responsive mt-3">
                    <table id="example1" class="table table-striped table-bordered" style="width:100%">                                
                    <thead>
                        <tr>
                            <th>Nombre Institución u Organismo Público</th>
                            <th>Fecha de Ingreso</th>
                            <th>Fecha de Egreso</th>
                            <th>Tiempo de Servicio</th>
                            @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                <th colspan="2">Opción</th>
                            @endif
                            <th>Requisitos</th>
                        </tr>
                    </thead>    
                    <tbody>   
                    @foreach($adm_pub as $adm)                           
                        <tr>                                                    
                                <td>{{$adm->organismo}}</td>
                                <td>{{$adm->fecha_ingreso}}</td>
                                <td>{{$adm->fecha_egreso}}</td>
                                <td>{{$adm->anno_servicios}} años {{$adm->meses_servicios}} meses {{$adm->dias_servicios}} días </td>
                                
                                @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                <td class="text-center" >
                                    <a href= "/rrhh/registrar_adm_publica_edit/{{$adm->adm_id}}/{{$funcionario->numero_identificacion}}" class="btn btn-info" data-tip="Detalle" title="Actualizar Antecedente" data-toggle="tooltip" data-original-title="Editar">
                                    <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
                                </td>
                                <td>
                                <form method="POST" action="{{URL::route('borrar_adm_pub',$adm->adm_id)}}">
                                @csrf
                                    <input type="hidden" name="_method" value="delete">
                                    <button type="submit" class="btn btn-info" data-tip="Detalle" title="Eliminar registro" data-toggle="tooltip" data-original-title="Eliminar"> 
                                    <img src="/img/icon/erase.ico" class="icon-sm" alt="Listado"></button>
                                    
                                </form>
                                    </td>                                      
                                <td>
                                <a href= "{{ Storage::url( $adm->ruta_documento) }}" target="_new"class="btn btn-info" data-tip="Detalle" title="Constancia o Antecedente de Servicio" data-toggle="tooltip" data-original-title="Editar">                                         
                                <img src="/img/icon/constancia.png" class="icon-sm" alt="Listado">
                                </a>
                                </td>     
                                @endif                                                           
                            </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                            <th>Nombre Institución u Organismo Público</th>
                            <th>Fecha de Ingreso</th>
                            <th>Fecha de Egreso</th>
                            <th>Tiempo de Servicio</th>
                            @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                <th>Opcion</th>
                            @endif
                            <th>Requisitos</th>
                        </tr>
                    </tfoot>
                </table>            
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