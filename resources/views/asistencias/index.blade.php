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
                                    @include('layouts.items.card-header', ['titulo' => 'Registrar Asistencias'])
                                    @foreach ($actuacion as $actuacion) 
                                    <h4 class="card-title"> {{ $actuacion->cod_actividad }}-{{ $actuacion->anio }}-{{ $actuacion->cod_actuacion }} | {{ $actuacion->nombre }}</h4>
                                    @endforeach
                                    </div>
                                    <!-- /.card-header -->
                                
                                    <div class="card-body">
                                    <form method="POST" action="asistencia/store" id="registrar_asistencia" >
                                                        <div align="center">
                                                            
                                                            <input type="submit" value=" Guardar " class="btn btn-primary" />                                   
                                                                                                
                                                            <button type="reset" id="btn_limpiar" class="btn btn-secondary">Limpiar</button>

                                                            <input name="" type="button" value=" Cerrar " onclick="cerrar()" class="btn btn-default" />
                                                        </div>
                                            <hr>
                            
           
            
         
            <br>    
            <div>    
                    <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <th>N°</th>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Género</th>
                            <th colspan="2"><div >Turno<br>
			        				<input type="checkbox" name="fecha" id="fecha-1" title="Marcar o desmarcar todas las asistencias de esta fecha">
			        			  </div><div class="fht-cell"></div>
                            </th>
                            <th  rowspan="2" ><div >
                                Asistencia <br> Mínima</div>
                                <div class="fht-cell"></div>
                            </th>                            
                            </tr>
                            <tr><th title="Mañana"><div class="th-inner ">
			        			M<br><input type="checkbox" name="turno" id="m-1" title="Marcar o desmarcar todas las asistencias de este turno">
			        			  </div><div class="fht-cell"></div></th><th title="Tarde" style="text-align: center; vertical-align: middle; " >
                                <div class="th-inner ">
			        			T<br><input type="checkbox" name="turno" id="t-1" title="Marcar o desmarcar todas las asistencias de este turno">
			        			     </div><div class="fht-cell"></div>
                                    </th>
                            </tr>
                            </thead>
                            <tbody>
                              @foreach ($asistencias as $key=>$item)
                            <tr>
                            <td>{{$key+1}}</td>  
                            <td>{{$item->nacionalidad}}-{{$item->numero_identificacion}}</td> 
                            <td>{{$item->nombre}} {{$item->nombreseg}}</td> 
                            <td>{{$item->apellido}} {{$item->apellidoseg}}</td>                            
                            <td> {{$item->sexo}} </td>                           
                            <td>{{$item->email}}</td> 
                            <td>{{$item->organismo}}</td> 
                            <td>{{$item->tipo_funcionario}}</td>                             
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>                           
                            <tr>
                            <th>N°</th>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Género</th>
                            <th></th>
                            <th></th>
                            <th></th>    
                          
                       
                            </tr>
                            </tfoot>
                    </table>
                    </div>
                   
                </div>
                <!-- /.card-body -->
            </form>   
        </div>           
                                          <!-- /.card -->
                                <br>
                            <div>
                                <a class='btn btn-info' href="{{URL::route('actuacion')}}">Regresar</a>
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