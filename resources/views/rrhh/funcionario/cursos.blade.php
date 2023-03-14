@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="d-flex" id="wrapper">
        @include('layouts.apprrhh')
      
        <div id="page-content-wrapper">
        <div class="sidebar-heading text-center">
      <h4 class="text-primary" >CONTROL DE EXPEDIENTES RRHH</h6>   
   
      </a>
      <h6 class="text-dark">Bienvenid@, {{Auth::user()->name}}</h6>
    </div> 

            <div class="container pb-4">
                <div class="row align-items-stretch">

                        <div class="col-12">

                            <div class="card mb-4">
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
                                    <a class="nav-link active" href="{{route('cursos_funcionario')}}">Cursos Realizados</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('idiomas_funcionario')}}">Idiomas</a>
                                </li>
                                </ul>
                                     
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <b>Suministre sus datos de los <span style="color:gray;">Cursos Realizados</span> de adiestramiento,seminarios, entrenamientos especiales, haga clic en "Registrar Cursos" para registrar su información <b>
                                    <hr>  
                                    @include('rrhh.funcionario.mensaje')   
                                </div>
                            </td>
                        </tr>
                        </table>
                       
                       <table>
               <form id="formulario" name="formulario" method="post" action="{{route('cursosregistrar')}}">
               @if(isset($funcionario_id))     
                <input id="id_funcionario" type="hidden" name="id_funcionario" value="{{$funcionario_id}}" >
                @csrf
                    <tr> 
                        
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Nombre del Curso&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="nommbre_curso" id="nommbre_curso" value="" onkeyup="mayusculas(this);" maxlength="255"/>
                        </td>
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Nombre de la Institución&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="text"class="form-control" required name="institucion_curso" id="institucion_curso" onkeyup="mayusculas(this);" value=""  maxlength="100"/>
                        </td>
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Dirección Referencial&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"  required name="dir_ref_curso" id="dir_ref_curso" onkeyup="mayusculas(this);" maxlength="200" value=""/>
                        </td>
                        </tr>
                    <tr> 
                        <td>
                        <span data-tooltip="Indique una fecha del calendario" sdata-flow="top">&nbsp;Fecha de Inicio&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" required name="fechainicio_curso" id="fechainicio_curso" value="" style="width:190px;"/>
                        </td>
                        <td>
                        <span data-tooltip="Indique una fecha del calendario" sdata-flow="top"> &nbsp;Fecha de Culmincación&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" required name="fechaculminacion_curso" id="fechaculminacion_curso" value="" style="width:190px;" />
                        </td>
                    </tr>
                    <tr> 
                    <td >
                   
                    </td>
                   
                    </table>

                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Registrar Curso" >
                    </div>
                    </form>
                    <hr>
                    <div class="table-responsive mt-3">
                        <table id="example1" class="table table-striped table-bordered" style="width:100%">                        
                            <thead>
                                <tr>
                                    <th>Nombre del Curso</th>
                                    <th>Nombre de la Institución</th>
                                    <th>Dirección Referencial</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha de Culminación</th>
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                        <th colspan=2>Opcion</th>
                                    @endif
                                    <th>Requisitos</th>
                                </tr>
                            </thead>    
                            <tbody>   
                            @foreach($cursos as $cursos)                           
                                <tr>                                                    
                                        <td>{{$cursos->nommbre_curso}}</td>
                                        <td>{{$cursos->institucion_curso}}</td>
                                        <td>{{$cursos->dir_ref_curso}}</td>
                                        <td>{{$cursos->fechainicio_curso}}</td>
                                        <td>{{$cursos->fechaculminacion_curso}}</td>
                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                            <td class="text-center">
                                            <a href= "cursos_edit/{{$cursos->id}}" class="btn btn-info" data-tip="Detalle" title="Actualizar Curso" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
                                            </a>
                                            </td>
                                            <td class="text-center">
                                            <form method="POST" action="{{URL::route('borrarcursos',$cursos->id)}}">
                                             @csrf
                                                <input type="hidden" name="_method" value="delete">
                                                <button type="submit" class="btn btn-info" data-tip="Detalle" title="Eliminar registro" data-toggle="tooltip" data-original-title="Eliminar"> 
                                                <img src="/img/icon/erase.ico" class="icon-sm" alt="Listado"></button>                                            
                                             </form>
                                            </td>  
                                        @endif   
                                        <td>
                                        <a href= "creardocumento_curso/{{$tipo_documento='curso'}}/{{$cursos->id}}/{{$ir='cursos_funcionario'}}" class="btn btn-success" data-tip="Detalle" title="Cargar Curso" data-toggle="tooltip" data-original-title="documento">
                                                            <img src="/img/icon/constancia.png" class="icon-sm" alt="Listado">
                                        </a>
                                        </td> 
                                                                                                 
                                    </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nombre del Curso</th>
                                    <th>Nombre de la Institución</th>
                                    <th>Dirección Referencial</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha de Culminación</th>
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                        <th>Opcion</th>
                                    @endif
                                    <th>Requisitos</th>
                                </tr>
                            </tfoot>
                        </table>
                        @else
                 <div class="frameContenedor" style="margin:5px;"align="center">
                           <h2 aling="center"><b>DEBE COMPLETAR LOS DATOS BÁSICOS</b></h2>
                        </div>
                 @endif  
                    </div>
            
                    </div>
</div>
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
    $('#example1').DataTable({
"language": {
"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
}
});
});
</script>
@endsection