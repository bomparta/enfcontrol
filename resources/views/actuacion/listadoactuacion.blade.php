@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="d-flex" id="wrapper">
        @include('layouts.appevento')

        <div id="page-content-wrapper">
            <div class="container pb-4">
                <div class="row align-items-stretch">
                    <div class="col-12">
                        <div class="card mb-4">
                                                        
                            <div class="table-responsive">
                                
                                    <div class="card-header">
                                    @foreach ($actividad as $itema)
                                     <h3 class="card-title">Actividad Academica | {{ $itema->codigo }}-{{ $itema->anio }} {{ $itema->nombre }}</h3>
                                     <p align="right"><a class='btn btn-info' href="/actuacion/create/{{$itema->id}}">Crear Actuacion</a></p>
                                    @endforeach
                                      
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                      <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                          <th>N°</th>
                                          <th>Código Actuación</th>
                                          <th>Período</th>
                                          <th>Entidad</th>
                                          <th>Horas Académicas</th>
                                          <th>Planificador</th>
                                          <th><img src="/img/icon/grupo.png" class="icon-lg" alt="Participantes" title="Ver Participantes"></th>
                                          <th><img src="/img/icon/asistencia.png" class="icon-lg" alt="Asistencias" title="Ver Asistencia"></th>
                                          <th><img src="/img/icon/facilitadores.png" class="icon-lg" alt="Facilitadores" title="Ver Facilitador(es)"></th>
                                          <th>Estatus</th>
                                          <th>Opciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($actuaciones as  $key=>$item)
                                        <tr>
                                        <td>{{$key+1}}</td>  
                                       <td><a href="/actuacion/edit/{{ $item->id}}"><span class='btn-info badge'><font color=#F2F3F8>{{ $item->cod_actividad }}-{{ $item->anio }}-{{ $item->cod_actuacion }}</font></span></a></td>
                                          <td ><div aling="center">{{ $item->fecha_inicio }} a {{ $item->fecha_fin }}</div></td>
                                          <td>{{ $item->entidad }}</td>
                                          <td>{{ $item->horas }}</td>
                                          <td>{{ $item->nomb_planificador }} {{ $item->ape_planificador }}</td> 

                                          <td> 
                                              
                                              @if($item->cant_participantes=='')
                                              <a href="/participantes/{{ $item->id}}"><img src="/img/icon/add.ico" class="icon-lg" alt="Participantes" title="Agregar Pariticpante(s)"></a></td> 
                                              @else
                                              <a href="/participantes/{{ $item->id}}">
                                                <span class='btn-info badge'>
                                                  <font color=#F2F3F8>
                                                    {{ $item->cant_participantes }}
                                                </font>
                                                </span>
                                              </a>
                                              @endif
                                          </td>
                                          <td>
                                           
                                              @if($item->cant_asistencias=='')
                                              <a href="/asistencias/{{ $item->id}}"><img src="/img/icon/add.ico" class="icon-lg" alt="Asistencias" title="Agregar Asistencia"></a></td> 
                                              @else
                                              <a href="/asistencias/{{ $item->id}}">
                                              <span class='btn-info badge'>
                                                <font color=#F2F3F8>
                                                  {{ $item->cant_asistencias }} 
                                                </font>                                              
                                              </span>
                                            </a>
                                              @endif
                                          </td>
                                          <td>
                                            
                                          @if($item->cant_facilitadores=='')
                                            <a href="/facilitadores/{{ $item->id}}"><img src="/img/icon/add.ico" class="icon-lg" alt="Facilitadores" title="Agregar Facilitador(es)"></a></td> 
                                          @else
                                          <a href="/facilitadores/{{ $item->id}}">
                                            <span class='btn-info badge'>
                                            <font color=#F2F3F8>
                                              {{ $item->cant_facilitadores }}
                                             </font>
                                            </span>
                                            </a>
                                          @endif
                                          </td> 
                                          <td>{{ $item->estatus }}</td>  
                                          <td><a href=""><img src="/img/icon/correo.png" class="icon-lg" alt="Correo" title="Enviar Constancia por Correo">
                                          </a>  <a href=""><img src="/img/icon/imprimir.png" class="icon-lg" alt="Imprimir" title="Imprimir"></a></td>                                                  </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                        <th>N°</th>                                     
                                          <th>Código</th>
                                          <th>Período</th>
                                          <th>Entidad</th>
                                          <th>Horas Académicas</th>
                                          <th>Planificador</th>
                                          <th>Participantes</th>
                                          <th>Asistencias</th>
                                          <th>Facilitadores</th>
                                          <th>Estatus</th>
                                          <th>Opciones</th>
                                        </tr>
                                        </tfoot>
                                </table>
                                    </div>
                                    <!-- /.card-body -->
                                
                                          <!-- /.card -->
                                <br>
                                <a class='btn btn-info' href="{{URL::route('listadoactividad')}}">Regresar</a>
                            </div>
            
                            </div> <!-- /.card -->
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- page-content-wrapper -->
    </div> <!-- wrapper -->

    @endsection

@section('scripts')
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