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
                <b>REGISTRAR VACACIONES COLECTIVAS DEL PERSONAL ACTIVO  DE LA FENFMP</b>
                </div>           
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
                         <tr>
                            <td>
                                <div id="divSubTituloIndex2">
                                   
                                    <hr>
                                    <b> Sumistrar los datos correspondientes a las <span style="color:gray; ">Vacaciones Colectivas del personal activo de la FENFMP </span>, haga clic en "Guardar" para registrar su información.
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                           
                                </div>
                            </td>

                        </tr>
                    </table>
      
                <form id="formulario" name="formulario" method="POST" action="{{route('store_vac_pendientes')}}">    
                        @csrf
                      
                                  
                                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%">
                                    <tr>
                                        <td>
                                        <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">  &nbsp;Unidad(es) de Adscripción&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
                                            <select id="id_oficina_administrativa" name="id_oficina_administrativa"class="form-control" required >
                                            <option value="0"  >TODOS</option>
                                                @foreach ($uni_adscripcion as $uni_adscripcion)
                                                    <option value="{{ $uni_adscripcion->id }}">
                                                    {{ $uni_adscripcion->descripcion }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_oficina_administrativa')
                                                <div class="invalid-feedback">
                                                <span style="color:red;"><strong>{{ $message }}</strong></span>
                                                </div>
                                            @enderror                                        
                                        </td>
                                        <td>
                            <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">  &nbsp;Tipo de Trabajador&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
                                <select id="id_tipo_trabajador" name="id_tipo_trabajador"  class="form-control" required >
                                <option value="0" >TODOS</option>
                                    @foreach ($tipo_trabajador as $tipo_trabajador)
                                    <option value="{{ $tipo_trabajador->id }}" >
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
                                                <span data-tooltip="Permite sólo números"  sdata-flow="top">&nbsp;Días a Descontar </span><span style="color:red;">*</span>&nbsp;<br>
                                                <input type= "text" id="dias_adescontar"  name="dias_adescontar"  value="" class="form-control"  required >                              
                                                @error('dias_adescontar')
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
                                      
                                    </div>  
                </form>  
                                    <hr>
                                    <div class="table-responsive mt-3">
                                        <table id="example1" class="table table-striped table-bordered" style="width:100%">                                
                                            <thead>
                                                    <tr>
                                                    <tr>
                                                        <th>Lapso de Disfrute</th>
                                                        <th>Dias Descontados</th>
                                                        
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
                                                <th>Dias Descontados</th>
                                               
                                                @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                                <th >Opciones</th>
                                                @endif
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