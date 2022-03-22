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
                                        <h3 class="card-title">Participantes</h3>
                                      
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
<<<<<<< Updated upstream
=======
                                    <form method="POST" action="participantes/store" id="registrar_participante" >
                                     
                                        <div class="row">
                                        
                                            <div class="form-group-sm col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label for="tipo_identificacion" class="control-label">Documento</label>
                                                <select name="tipo_identificacion" id="tipo_identificacion" class="form-control">
                                                <option value='1'>Cédula</option><option value='2'>Pasaporte</option> 
                                                </select>    
                                            </div>
                                            <div class="form-group-sm col-lg-4 col-md-4 col-sm-4 col-xs-12" >
                                                <label for="numero_identificacion" class="control-label">N° Identificación</label>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-btn">
                                                    <select id="nacionalidad" name="nacionalidad" class="form-control"> 
                                                    <option selected disabled>Seleccione...</option>
                                                    <option value='1'>Cédula</option><option value='2'>Pasaporte</option> 
                                                    </select>
                                                   
                                              
                                                    </span>        
                                                    <input type="text" name="numero_identificacion" id="numero_identificacion" class="form-control" required>
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary" type="button" id="get_persona" value="Buscar" onclick="buscar_persona()" >
                                                        <img src="/img/icon/zoom.ico" class="icon-lg" alt="Participantes" title="Buscar Participante(es)">
                                                        </button>
                                                    </span>
                                                </div> 
                                            </div>
                                        </div>   
                                        <hr>
>>>>>>> Stashed changes


                    <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <th>N°</th>
                            <th>Cédula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Género</th>
                            <th>Correo</th>
                            <th>Organismo</th>
                            <th>Tipo de Funcionario</th>
                            <th>Cargo</th>
                            <th>Entidad Federal</th>
                            <th colspan="2"> <div align="center">Acciones</div></th>    
                            
                        </tr>
                            </thead>
                            <tbody>
                              @foreach ($participantes as $key=>$item)
                            <tr>
                            <td>{{$key+1}}</td>  
                            <td>{{$item->nacionalidad}}-{{$item->numero_identificacion}}</td> 
                            <td>{{$item->nombre}} {{$item->nombreseg}}</td> 
                            <td>{{$item->apellido}} {{$item->apellidoseg}}</td>                            
                            <td> {{$item->sexo}} </td>                           
                            <td>{{$item->email}}</td> 
                            <td>{{$item->organismo}}</td> 
                            <td>{{$item->tipo_funcionario}}</td> 
                            <td>{{$item->cargo}}</td>
                            <td>{{$item->entidad}}</td> 
                            <td><a href="/edit/{{$item->id_actuacion_participante}}">Editar</a></td> 
                            <td><a href="/delete/{{$item->id_actuacion_participante}}">Eliminar</a></td> 
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
                            <th>Correo</th>
                            <th>Organismo</th>
                            <th>Tipo de Funcionario</th>
                            <th>Cargo</th>
                            <th>Entidad Federal</th>
                            <th colspan="2"> <div align="center">Acciones</div></th>                               
                        </tr>
                            </tfoot>
                    </table>
                 
                </div>
                <!-- /.card-body -->
                </div>           
                                          <!-- /.card -->
                                <br>
                            <div>
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