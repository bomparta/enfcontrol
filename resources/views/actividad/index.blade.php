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
                                        <h3 class="card-title">Actividades Academica</h3>
                                        <p align="right"><a class='btn btn-info' href="{{URL::route('crearactividad')}}">Crear Actividad</a></p>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                  <th>Codigo</th>
                                                  <th>Nombre</th>
                                                  <th>Clasificacion</th>
                                                  <th>Tematica</th>
                                                  <th>Alcance</th>
                                                  <th>Tipo de Actividad</th>
                                                  <th>Actuacion</th>
                                                  <th>Accion</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                  <td>Trident</td>
                                                  <td>Internet
                                                    Explorer 4.0
                                                  </td>
                                                  <td>Win 95+</td>
                                                  <td> 4</td>
                                                  <td>X</td>
                                                  <td> 4</td>
                                                  <td><a href=""><font color=#FC0A0A>7</a></td>
                                                  <td><a href=""><img src="/img/icon/clipboard.ico" class="icon-lg" alt="Acciones"></a></td>
                                                </tr>
                                                <tr>
                                                    <td>Trident</td>
                                                    <td>Internet
                                                      Explorer 4.0
                                                    </td>
                                                    <td>Win 95+</td>
                                                    <td> 4</td>
                                                    <td>X</td>
                                                    <td> 4</td>
                                                    <td><a href=""><font color=#FC0A0A>2</a></td>
                                                    <td><a href=""><img src="/img/icon/clipboard.ico" class="icon-lg" alt="Acciones"></a></td>
                                                  </tr>
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Codigo</th>
                                                    <th>Nombre</th>
                                                    <th>Clasificacion</th>
                                                    <th>Tematica</th>
                                                    <th>Alcance</th>
                                                    <th>Tipo de Actividad</th>
                                                    <th>Actuacion</th>
                                                    <th>Accion</th>
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