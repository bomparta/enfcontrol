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
                                <b>PRESIDENTE(A)</b>
                    </div>
                    <div align="center" id="divTituloIndex2" class="text-primary">
                                <b>VACACIONES PENDIENTES POR APROBAR </b>
                    </div>
                    <table  align="center" border="0" cellpadding="5" cellspacing="2" width="100%" >
                    <tr>
                            <td colspan="4">
                            <div class="col-12 text-center">
                
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{route('vacaciones_pendientes_aprobacion_presidencia')}}">Vacaciones Pendientes por Aprobar</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link "  href="{{route('vacaciones_aprobadas_presidencia')}}">Vacaciones Aprobadas</a>
                                </li>
                              
                                </ul>
                                     
                                </div>
                               
                            </td>
                        </tr>
                        </table>
                        
                        <div class="table-responsive mt-3">
                    <table id="example1" class="table table-striped table-bordered" style="width:100%"> 
                            <thead>
                                <tr>
                                    <th class="text-primary"> Cédula de Identidad </th>                                   
                                    <th class="text-primary"> Nombre(s) y Apellido(s) </th>
                                    <th class="text-primary"> <img src="{{url('/img/vacacion.png')}}" whith="60px" height="60px"/>Días de Disfrute  </th>
                                    <th class="text-primary"> <img src="{{url('/img/icon/calendario.png')}}" whith="60px" height="60px"/>Fecha de Solicitud  </th>
                                    <th class="text-primary"> <img src="{{url('/img/icon/calendario.png')}}" whith="60px" height="60px"/>Fecha de Incio de Vacaciones  </th>
                                    <th class="text-primary"> <img src="{{url('/img/icon/regreso.png')}}" whith="60px" height="60px"/>Fecha de Reintegro de Vacaciones  </th>
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,10,11,12,13) ))
                                        <th class="text-primary" >Opción</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            <div id="divSubTituloIndex2">                                   
                                    @include('rrhh.funcionario.mensaje')  
                                    </div>
                        @foreach($vacaciones_solicitudes as $vacaciones_solicitudes)
                                    
                                    <tr>                                    
                                  
                                       <td>@if($vacaciones_solicitudes->id_nacionalidad==1) V    @else E @endif - {{$vacaciones_solicitudes->numero_identificacion}} </td>
                                       <td>  {{$vacaciones_solicitudes->nombre.' '.$vacaciones_solicitudes->nombreseg}}  {{$vacaciones_solicitudes->apellido.' '. $vacaciones_solicitudes->apellidoseg}}  </td>
                                       <td> {{$vacaciones_solicitudes->dias_disfrute}}</td>
                                       <td>{{$vacaciones_solicitudes->fecha_solicitud}}</td>
                                       <td>{{$vacaciones_solicitudes->fecha_inicio}}</td>
                                       <td>{{$vacaciones_solicitudes->fecha_reintegro}}</td>
                                        <td>
                                       
                                                <img src="{{url('img/imagen/documento.jpg')}}" style="max-width: 50px; max-height: 50px"  alt="Image"> <a href="{{route('vacaciones_aprobacion_presidencia',$vacaciones_solicitudes->id_solicitud)}}" target="_new">
                                                 <span class='btn-info badge'><font color=#F2F3F8>Aprobar Vacaciones</font></span>                                        
                                          

                                        </td>                                                                             
                                    </tr>                     
                               
                                    @endforeach
                                
                            </tbody>
                        </table>
                       
                                    
           
                    
            </div> <!-- card -->
        </div>
    </div> <!-- row -->
</div>

</div> <!-- row -->
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