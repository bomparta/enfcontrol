@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
    @include('layouts.apprrhh')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
            <div align="center" id="divTituloIndex2" class="text-primary">
               
                <b>INSTRUCCIÓN FORMAL Y COMPLEMENTARIA</b>
                </div>
              
                    <table  align="center" border="0" cellpadding="5" cellspacing="2" width="100%" >
                    <tr>
                            <td colspan="4">
                            <div class="col-12 text-center">
                
                                <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('educacionfuncionario')}}">Nivel de Instrucción</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link "  href="{{route('estudios_actfuncionario')}}">Estudios Actuales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('cursos_funcionario')}}">Cursos Realizados</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{route('idiomas_funcionario')}}">Idiomas</a>
                                </li>
                                </ul>
                                     
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <b>Suministre sus datos de los <span style="color:gray;">Idiomas</span> que domina, haga clic en "Registrar Idioma" para registrar su información <b>
                                    <hr>   
                                </div>
                            </td>
                        </tr>
                        </table>
                       
                       <table>
               <form id="formulario" name="formulario" method="post" action="{{route('idiomasregistrar')}}">
               @if(isset($funcionario_id))     
                <input id="id_funcionario" type="hidden" name="id_funcionario" onkeyup="mayusculas(this);" value="{{$funcionario_id}}" >
                @csrf
               
                    <tr> 
                        
                        <td>
                            &nbsp;Idioma&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="nommbre_idioma" id="nommbre_idioma" onkeyup="mayusculas(this);" value="" maxlength="25"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        &nbsp;Habla&nbsp;<span style="color:red;">*</span>&nbsp;
                            <select id="habla" name="habla"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1">REGULAR</option>
                                            <option value="2">BIEN</option>                                        
                                            <option value="3">MUY BIEN</option>                                        
                                    </select>   
                        </td>
                        <td>
                        &nbsp;Lee&nbsp;<span style="color:red;">*</span>&nbsp;
                            <select id="lee" name="lee"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1">REGULAR</option>
                                            <option value="2">BIEN</option>                                        
                                            <option value="3">MUY BIEN</option>                                        
                                    </select> 
                        </td>
                     
                        <td>
                        &nbsp;Escribe&nbsp;<span style="color:red;">*</span>&nbsp;
                            <select id="escribe" name="escribe"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1">REGULAR</option>
                                            <option value="2">BIEN</option>                                        
                                            <option value="3">MUY BIEN</option>                                        
                                    </select> 
                        </td>
                        
                    </tr>                  
                   
                    </table>

                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Registrar Idioma" >
                    </div>

                    <div class="table-responsive mt-3">
                        <table id="example1" class="table table-striped table-bordered" style="width:100%">                        
                            <thead>
                                <tr>
                                    <th>Idioma</th>
                                    <th>Habla</th>
                                    <th>Lee</th>
                                    <th>Escribe</th>
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                        <th>Opcion</th>
                                    @endif
                                </tr>
                            </thead>   
                            <tbody>      
                                @foreach($idiomas as $idiomas)                         
                                <tr>      
                                <td>{{$idiomas->nommbre_idioma}}</td>                                              
                                <td>@if($idiomas->habla==1)REGULAR @elseif($idiomas->habla==2)BIEN @elseif($idiomas->habla==3)MUY BIEN @endif  </td>
                      
                                <td>@if($idiomas->lee==1)REGULAR @elseif($idiomas->lee==2)BIEN @elseif($idiomas->lee==3)MUY BIEN @endif  </td>
                                <td>@if($idiomas->escribe==1)REGULAR @elseif($idiomas->escribe==2)BIEN @elseif($idiomas->escribe==3)MUY BIEN @endif  </td>
                                      
                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                            <td class="text-center">
                                            <a href= "idiomas_edit/{{$idiomas->id}}" class="btn btn-info" data-tip="Detalle" title="Actualizar Idioma" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
                                            </a>
                                            </td>
                                        @endif                                                            
                                    </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Idioma</th>
                                    <th>Habla</th>
                                    <th>Lee</th>
                                    <th>Escribe</th>
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                        <th>Opcion</th>
                                    @endif
                                    
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    @endif
                </form>

            </div>
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