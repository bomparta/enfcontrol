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
              
                <b>EXPERIENCIA LABORAL</b>
                </div>
               
                    <table align="center" border="0" cellpadding="2" cellspacing="5" width="100%" >
                    <tr>
                            <td colspan="4">
                            <div class="col-12 text-center">
                                     
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <b>Suministre sus datos de su <span style="color:gray;">Experiencia Laboral</span> más reciente, haga clic en "Registrar Exp. Laboral" para registrar su información <b>
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                                </div>
                            </td>
                        </tr>   
                </table>
                       
                       <table>
               <form id="formulario" name="formulario" method="post" action="{{route('laboralregistrar')}}">
               @if(isset($funcionario_id))     
                <input id="id_funcionario" type="hidden" name="id_funcionario" value="{{$funcionario_id}}" >
                @csrf
                      
                    <tr>
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> 
                            &nbsp;Empresa u Organización&nbsp;</span>
                            <span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" name="empresa" id="empresa" onkeyup="mayusculas(this);" value="" maxlength="200" required/>
                        </td>
                   
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> 
                             &nbsp;Cargo de desempeñado&nbsp;</span>
                             <span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" name="cargo" id="cargo"  onkeyup="mayusculas(this);" value=""  maxlength="150" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <span data-tooltip="Indique una fecha del calendario" sdata-flow="top"> &nbsp;Fecha Ingreso&nbsp;</span>
                        <span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" name="fechaingreso" id="fechaingreso" value="" style="width:190px;" maxlength="25" required/>
                        </td>
                   
                        <td>
                        <span data-tooltip="Indique una fecha del calendario" sdata-flow="top"> 
                            &nbsp;Fecha de Egreso&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" name="fechaegreso" id="fechaegreso" value="" style="width:190px;" maxlength="25" required/>
                        </td>
          
                        <td>
                                &nbsp;Telefono Empresa u Organización&nbsp;<br>
                                <div class="input-group">
                                <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top"> 
                                    <select id="cod_telefono" name="cod_telefono" style="width:70px;" required>
                                    @foreach ($todos_cod as $todos_cod)
                                        <option value="{{ $todos_cod->descripcion }}">{{ $todos_cod->descripcion }}</option>
                                    @endforeach
                                    
                                </select>
                                </span>
                                <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">
                                    <input type="text" class="form-control" name="telefono" id="telf_contacto"  onkeypress="return isNumberKey(event);" value="" maxlength="7" />
                                </span>
                                </div>
                            </td>
                        <td></td>
                    </tr>
                    </table>
                    <div class="frameContenedor" style="margin:5px;" align="right">
                    <input class='btn btn-info' type="submit" value="Registrar Exp. Laboral" >
                       
                    </div>
                    </form>
                    <hr>
                    <div class="table-responsive mt-3">
                    <table id="example1" class="table table-striped table-bordered" style="width:100%">                        
                                                         
                            <thead>
                                <tr>
                                    <th>Empresa u Organización</th>
                                    <th>Cargo Desempeñado</th>
                                    <th>Teléfono</th>
                                    <th>Fecha de Ingreso</th>
                                    <th>Fecha de Egreso</th>
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10,11,13,4,6) ))
                                        <th colspan=2>Opcion</th>
                                    @endif
                                    <th>Requisitos</th>
                                </tr>
                            </thead>  
                            @foreach($laboral as $laboral)
                                                    
                                <tr>                                                    
                                        <td>{{$laboral->nombre_empresa}}</td>
                                        <td>{{$laboral->cargo}}</td>
                                        <td>{{$laboral->telefono_empresa}}</td>
                                        <td>{{date('d-m-Y', strtotime($laboral->fecha_ingreso))}}</td>
                                        <td>{{date('d-m-Y', strtotime($laboral->fecha_egreso))}}</td>
                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10,11,13,4,6) ))
                                            <td class="text-center">
                                            <a href= "experiencia_edit/{{$laboral->id}}" class="btn btn-info" data-tip="Detalle" title="Actualizar Exp. Laboral" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
                                            </a>
                                            </td>
                                            <td class="text-center">
                                            <form method="POST" action="{{URL::route('borrarlaboral',$laboral->id)}}">
                                             @csrf
                                                <input type="hidden" name="_method" value="delete">
                                                <button type="submit" class="btn btn-info" data-tip="Detalle" title="Eliminar registro" data-toggle="tooltip" data-original-title="Eliminar"> 
                                                <img src="/img/icon/erase.ico" class="icon-sm" alt="Listado"></button>                                            
                                             </form>
                                            </td>  
                                        @endif  
                                        <td>
                                        <a href= "creardocumento_laboral/{{$tipo_documento='carta_trab'}}/{{$laboral->id}}/{{$ir='laboralfuncionario'}}" class="btn btn-success" data-tip="Detalle" title="Cargar Carta de Trabajo o Antecedentes de Servicios" data-toggle="tooltip" data-original-title="documento">
                                        <img src="/img/icon/constancia.png" class="icon-sm" alt="Listado">
                                        </a>
                                        </td>                                                           
                                    </tr>
                            
                          
                            @endforeach
                            <tfoot>
                                <tr>
                                <th>Empresa u Organización</th>
                                    <th>Cargo Desempeñado</th>
                                    <th>Teléfono</th>
                                    <th>Fecha de Ingreso</th>
                                    <th>Fecha de Egreso</th>
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10,11,13,4,6) ))
                                        <th colspan=2>Opcion</th>
                                    @endif
                                    <th>Requisitos</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
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