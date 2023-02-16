@extends('layouts.app')
@section ('content')

<div class="container-fluid">
<div class="row justify-content-start">
@include('layouts.apprrhh')  
       
        
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
            <div align="center" id="divTituloIndex2" class="text-primary">
              
                <b>ANTECEDENTES DE SERVICIO EN LA ADMINISTRACIÓN PÚBLICA</b>
                </div>
           
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
                         <tr>
                            <td>
                                <div id="divSubTituloIndex2">
                                   
                                    <hr>
                                    <b> Sumistrar los datos correspondientes a la <span style="color:gray; ">Antecedentes de la Administración Pública </span> del funcionario.
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                           
                                </div>
                            </td>

                        </tr>
                    </table>
                    @if(isset($adm_pub))
                    @foreach($adm_pub as $key=>$adm_pub)
          <form id="formulario" name="formulario" method="POST" action="{{route('update_antecedentes')}}" accept-charset="UTF-8" enctype="multipart/form-data"> 
          @csrf   
          <input type= "hidden" id="cedula" name="cedula" value="{{$cedula}}" class="form-control"  >    
          <input type="hidden" name="tipo_documento" id="tipo_documento" value="adm_pub_constancia" required>   
          <input type= "text" id="funcionario_id" name="funcionario_id" value="{{$adm_pub->funcionario_id}}" class="form-control"  >       
        
                
                    <input type="hidden" name="adm_pub_id" id="adm_pub_id" value="{{$adm_pub->adm_id}}" required>   
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%">
                    <tr>                            
                    <td>
                                &nbsp;Nombre de la Institución u Organismo <span style="color:red;">*</span>&nbsp;<br>
                                <input type= "text" id="institucion" rows="2" name="institucion" onkeyup="mayusculas(this);"  value="{{$adm_pub->organismo}}" class="form-control"  required>                              
                                @error('institucion')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>        
                            <td>
                                &nbsp;Último Cargo Desempeñado <span style="color:red;">*</span>&nbsp;<br>
                                <input type= "text" id="ult_cargo" rows="2" name="ult_cargo" onkeyup="mayusculas(this);"  value="{{$adm_pub->ult_cargo}}" class="form-control" required >                              
                                @error('observaciones')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>
                            <td>
                                &nbsp;Tipo de Trabajador&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="id_tipo_trabajador" name="id_tipo_trabajador"  class="form-control" required >
                                <option value="0">Seleccione...</option>
                                    @foreach ($tipo_trabajador as $tipo_trabajador)
                                    <option value="{{$tipo_trabajador->id}}"
                                    @if($adm_pub->id_tipo_funcionario == $tipo_trabajador->id) selected @endif >
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
                        &nbsp;Fecha de Ingreso al Organismo&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;">*</span><br>
                                <input type="date" name="fechaingreso" id="fechaingreso" value="{{$adm_pub->fecha_ingreso}}"  required/>
                           
                            @error('fechaingreso')
                                <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror  
                       
                                </td>
                            <td>
                                &nbsp;Fecha de Egreso del Organismo&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;">*</span><br>
                                <input type="date" name="fechaegreso" id="fechaegreso" value="{{$adm_pub->fecha_egreso}}"  required/>
                           
                            @error('fechaegreso')
                                <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror  
                       
                                </td>
                            
                        </tr>
                        <tr><td colspan="2">Años Servicio  en el cargo: {{$adm_pub->anno_servicios}}    años {{$adm_pub->meses_sercicios}}   meses  {{$adm_pub->dias_servicios}}dias</td></tr>
                       
                        <tr>                            
                            <td>
                                &nbsp;Observaciones <br>
                                <input type= "text" id="observaciones" rows="2" name="observaciones" onkeyup="mayusculas(this);"  value="{{$adm_pub->observaciones}}" class="form-control"  >                              
                                @error('observaciones')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>
                        </tr>
                    
                    <tr> 
                    <tr >
                        <td><div align="center">
                        <b> Documento Consignado</b> <br>
                                @if(empty($adm_pub->ruta_documento) )
                                    <img src="{{url('img/imagen/documento.png')}}" style="max-width: 50px; max-height: 50px"  alt="Image"/>
                                    <span class='btn-info badge'><font color='red'>Pendiente</font></span> 
                                @else
                                    <img src="{{url('img/icon/check.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"> <a href= "{{ Storage::url( $adm_pub->ruta_documento) }}" target="_new">
                                    Ver Documento <span class='btn-info badge'><font color=#F2F3F8>Cargado</font></span> 
                                @endif                       
                                @if(empty($adm_pub->ruta_documento) )
                               
                                    <a href= " /rrhh/creardocumento_rrhh/{{$tipo_documento='adm_pub_constancia'}}/{{$adm_pub->adm_id}}/{{$cedula}}" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                    <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Cargar
                                    </a>
                                @else
                                    <a href= " /rrhh/creardocumento_rrhh/{{$tipo_documento='adm_pub_constancia'}}/{{$adm_pub->adm_id}}/{{$cedula}}" class="btn btn-success" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                    <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Editar
                                    </a>
                                @endif  
                             
</div>
                       
                        </td>           
                    </tr> 
                   
                    </table>
                  @endforeach
                    @endif 
  
                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Guardar" >
                        <a class='btn btn-secondary' href="{{URL::route('antecedentes_rrhh',$cedula)}} ">Regresar</a> 
                    </div>
                   
                          
                        </div>
                        </form>
         
            
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
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection
