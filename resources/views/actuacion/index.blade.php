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
                               
                                 <h3 class="card-title">Actuaciones Académicas</h3>
                               
                                  
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                      <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                          <th>N°</th>
                                          <th>Codigo</th>
                                          <th>Actividad</th>
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
                                          @foreach ($actuaciones as $item)
                                        <tr>
                                        <td>1</td>  
                                        <!--<td><a href="{{URL::route('crearactuacion')}}"><font color=#0A0EFC>{{ $item->id_actividad }}-{{ $item->anio }}-{{ $item->cod_actuacion }}</a></td>-->
                                        <td><a href="/actuacion/edit/{{ $item->id}}"><span class='btn-info badge'><font color=#F2F3F8>{{ $item->cod_actividad }}-{{ $item->anio }}-{{ $item->cod_actuacion }}</span></a>
                                        <td>{{ $item->nombre }}</td>
                                          <td ><div aling="center">{{ $item->fecha_inicio }} a {{ $item->fecha_fin }}</div></td>
                                          <td>{{ $item->entidad }}</td>
                                          <td>{{ $item->horas }}</td>
                                          <td>{{ $item->nomb_planificador }} {{ $item->ape_planificador }}</td>                                                                               
                                          <td>{{ $item->cant_participantes }}
                                          @if($item->cant_participantes=='')
                                          <a href=""><img src="/img/icon/add.ico" class="icon-lg" alt="Participantes" title="Agregar Pariticpante(s)"></a></td> 
                                          @endif
                                          <td>{{ $item->cant_asistencias }}
                                          @if($item->cant_asistencias=='')
                                          <a href=""><img src="/img/icon/add.ico" class="icon-lg" alt="Asistencias" title="Agregar Asistencia"></a></td> 
                                          @endif
                                          <td>{{ $item->cant_facilitadores }}
                                          @if($item->cant_facilitadores=='')
                                          <a href=""><img src="/img/icon/add.ico" class="icon-lg" alt="Participantes" title="Agregar Facilitador(es)"></a></td> 
                                          @endif
                                         
                                          <td>{{ $item->estatus }}</td>  
                                          <td><a href=""><img src="/img/icon/correo.png" class="icon-lg" alt="Correo" title="Enviar Constancia por Correo">
                                          </a>  <a href=""><img src="/img/icon/imprimir.png" class="icon-lg" alt="Imprimir" title="Imprimir"></a></td>                                                  </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                        <th>N°</th>                                     
                                          <th>Codigo</th>
                                          <th>Actividad</th>
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
                                <a class='btn btn-info' href="{{URL::route('actividad')}}">Regresar</a>
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