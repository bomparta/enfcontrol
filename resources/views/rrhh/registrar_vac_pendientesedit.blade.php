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
      
                <form id="formulario" name="formulario" method="POST" action="{{route('update_vac_pendientes')}}">    
                    @csrf
                    @if(isset($vacaciones))            
                    @foreach($vacaciones as $key=>$vac)
                    <input type= "hidden" id="cedula" name="cedula" value="{{$cedula}}" class="form-control"  >    
                    <input type= "hidden" id="funcionario_id" name="funcionario_id" value="{{$funcionario->funcionario_id}}" class="form-control"  >    
                    <input type= "hidden" id="id_vacaciones" name="id_vacaciones" value="{{$vac->id}}" class="form-control"  >   
                    <input type="hidden" id="fecha_ingreso_vac" name="fecha_ingreso_vac" value="{{$funcionario->fecha_ingreso_vac}}"/> 
                    <input type="hidden" id="tipo_trabajador" name="tipo_trabajador" value="{{$funcionario->tipo_funcionario_id}}"/> 

                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%">
                    <tr>                            
                        <td>
                         <span data-tooltip="Permite sólo números" sdata-flow="top">&nbsp;Lapso de Disfrute </span>
                         <span style="color:red;">*</span>&nbsp;<br>
                                <input type= "text" id="lapso_disfrute" name="lapso_disfrute" onkeypress="return isNumberKey(event);"
                                 onkeydown="return dias_disfrute_lapso(this,document.getElementById('fecha_ingreso_vac'),document.getElementById('tipo_trabajador'))"
                                 value="{{$vac->lapso_disfrute}}" class="form-control"  readonly required>                              
                                @error('lapso_disfrute')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                        </td>        
                        <td>
                            <span data-tooltip="Permite sólo números"  sdata-flow="top">&nbsp;Días a Disfrute </span><span style="color:red;">*</span>&nbsp;<br>
                                <input type= "text" id="dias_adisfrutar"  name="dias_adisfrutar" onkeypress="return isNumberKey(event);"  value="{{$vac->dias_adisfrutar}}" class="form-control" readonly required >                              
                                @error('dias_adisfrutar')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                        </td>
                        <td>
                            <span data-tooltip="Permite sólo números" sdata-flow="top">&nbsp;Días Pendientes por disfrutar&nbsp;</span>
                            <span style="color:red;">*</span>&nbsp;<br>
                            <input type= "text" id="dias_pendientes"  name="dias_pendientes" onkeypress="return isNumberKey(event);"  value="{{$vac->dias_pendientes}}" class="form-control" required >                              
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
                                    <input type= "text" id="observaciones" rows="2" name="observaciones" onkeyup="mayusculas(this);"  value="{{$vac->observaciones_rrhh}}" class="form-control"  >                              
                                    @error('observaciones')
                                        <div class="invalid-feedback">
                                        <span style="color:red;"><strong>{{ $message }}</strong></span>
                                        </div>
                                    @enderror
                        </td>
                    </tr>
                    </table>
                    @endforeach
                    @endif 
                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Guardar" >
                        <a class='btn btn-secondary' href="{{ URL::route('ver_trabajador',$cedula) }}">Regresar</a> 
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