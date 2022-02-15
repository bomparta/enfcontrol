@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="d-flex" id="wrapper">
        @include('layouts.appcontrol')

        <div id="page-content-wrapper">
            <div class="container pb-4">
                <div class="row align-items-stretch">
                    <div class="col-12">
                        <div class="card mb-4">
                                                        
                            <div class="table-responsive">
                                
                                    <div class="card-header">
                                        <h3 class="card-title">Listado de Periodo</h3>
                                        <p align="right"><a class='btn btn-info' href="{{URL::route('addperiodo')}}">Ingresar Periodo</a></p>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Estatus</th>
                                                    <th>Condicion</th>
                                                    <th>Opciones</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($periodos as $item)
                                                <tr>
                                                  <td>{{ $item->nombre }}</td>
                                                  @if($item->status == 1)<td class="text-success">Activo</td> @else <td class="text-secondary">Inactivo</td> @endif
                                                  @if($item->condicion == 1)<td class="text-success">Abierto</td> @else <td class="text-secondary">Cerrado</td> @endif
                                                  <td><a href="/edit/period/{{ $item->id }}"><img src="/img/icon/modify.ico" class="icon-lg" alt="Listado"></a></td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Estatus</th>
                                                    <th>Condicion</th>
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