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
                            <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
<tr>
<td colspan="4">
<div align="center" id="divTituloIndex2" class="text-primary">
<b> DATOS GRUPO FAMILIAR</b>
</div>
<div id="divSubTituloIndex2">
<hr>
<b>Suministre los <span style="color:gray;">Datos del Grupo Familiar</span>, haga clic en "Registrar Familiar" para guardar su información <b>
<hr>   
@include('rrhh.funcionario.mensaje')  
</div>
</td>
</tr>
</table>

<table>

<form id="formulario" name="formulario" method="POST" autocomplete="off" action="{{route('registrarfamiliar')}}">
@csrf
@if (isset($funcionario_id))
<tr>

<input id="id_funcionario" type="hidden" name="id_funcionario" value="{{$funcionario_id}}" >
</td>
</tr>
<tr>
<td >

&nbsp;Cédula de Identidad&nbsp;<span style="color:red;">*</span>&nbsp;<br>
<span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">  
<select id="nacionalidad" name="nacionalidad" style="width:70px;" required>
@foreach ($nacionalidades as $nacionalidad)
<option value="{{ $nacionalidad->id  }}">{{ $nacionalidad->cod }}</option>
@endforeach
</select></span>
<span data-tooltip="Permite sólo numéros" sdata-flow="top">
<input type="text" name="cedula" id="cedula" style="width:200px;"  value="" onkeypress="return isNumberKey(event);" maxlength="12"/></span>
@error('cedula')
<div class="invalid-feedback">
<strong>{{ $message }}</strong>
</div>
@enderror

</td>
</tr>
<tr>
<td>
<span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Primer Nombre&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
<input id="primernombre" type="text"  maxlength="25"onkeyup="mayusculas(this);" class="form-control @error('primernombre') is-invalid @enderror" name="primernombre" value="" required>
@error('primernombre')
<div class="invalid-feedback">
<strong>{{ $message }}</strong>
</div>
@enderror
</td>
<td>
<span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Segundo Nombre&nbsp;<br></span>
<input id="segundonombre" type="text"  maxlength="25" onkeyup="mayusculas(this);" class="form-control @error('segundonombre') is-invalid @enderror" name="segundonombre" value="" >
@error('segundonombre')
<div class="invalid-feedback">
<strong>{{ $message }}</strong>
</div>
@enderror
</td>
</tr>
<!-- FILA 2 -->
<tr>
<td>
<span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Primer Apellido&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
<input id="primerapellido" type="text"  maxlength="25" onkeyup="mayusculas(this);" class="form-control @error('primerapellido') is-invalid @enderror" name="primerapellido" value=""  required>
@error('primerapellido')
<div class="invalid-feedback">
<strong>{{ $message }}</strong>
</div>
@enderror
</td>
<td>
<span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> &nbsp;Segundo Apellido&nbsp;<br></span>
<input id="segundoapellido" type="text"  maxlength="25" onkeyup="mayusculas(this);" class="form-control @error('segundoapellido') is-invalid @enderror" name="segundoapellido" value=""  >
@error('segundoapellido')
<div class="invalid-feedback">
<strong>{{ $message }}</strong>
</div>
@enderror
</td>
</tr>
<!-- FILA 3 -->
<tr>

<td>
<span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">  &nbsp;Sexo&nbsp;<span style="color:red;">*</span>&nbsp;<br></span>
<select class="form-control"  type="text" name="genero" required>
<option value="0">Seleccione...</option>
@foreach ($generos as $generos)
<option value="{{ $generos->id }}" >
{{ $generos->cod }}</option>
@endforeach
</select>
@error('sexo')
<div class="invalid-feedback">
<strong>{{ $message }}</strong>
</div>
@enderror
</td>
<td>
<span data-tooltip="Indique una fecha del calendario" sdata-flow="top"> &nbsp;Fecha Nacimiento&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;">*</span><br></span>
<input type="date" name="fechanac" id="fechanac"  value=""  maxlength="25" required/>
</td>

</tr>
<tr>
<!-- FILA 4 -->
<td>
<span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">&nbsp;Parentesco&nbsp;<span style="color:red;">*</span>&nbsp;<br></span>
<select name="parentezco" id="parentezco"   class="form-control" required >
<option value="0">Seleccione...</option>
@foreach ($parentezco as $parentezco)

<option value="{{ $parentezco->id }}">{{ $parentezco->descripcion }}</option>
@endforeach
</select>
</td>
</tr>

<!-- FILA 5 -->
<tr>
<td>
<span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">   &nbsp;Ocupación&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
<input id="ocupacion" type="text"name="ocupacion" onkeyup="mayusculas(this);" class="form-control" required >


</td>
<td>
<span data-tooltip="Permite sólo núméros" sdata-flow="top">  &nbsp;Teléfono&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
<input id="text" type="text"  placeholder="Ej. 04121234578 ó 02121234567"maxlength="25" onkeypress="return isNumberKey(event);" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="" required>
@error('telefono')
<div class="invalid-feedback">
<strong>{{ $message }}</strong>
</div>
@enderror

</td>

</tr>
<!-- FILA 6 -->
<tr>
<td>
<span data-tooltip="Seleccione un valor de la lista" sdata-flow="top"> &nbsp;Vive con Usted?&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
<select id="vive" name="vive"class="form-control" required >
<option value="0">Seleccione...</option>
<option value="1">SI</option>
<option value="2">NO</option>                                        
</select>                                
</td>
<td>
<span data-tooltip="Debe registar un correo electrónico." sdata-flow="top"> &nbsp;Correo&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
<input id="correo" type="email"  maxlength="250"  placeholder="Ej. micorreo@dominio.com" onkeyup="mayusculas(this);" class="form-control @error('correo') is-invalid @enderror" name="correo" value="" required>
@error('correo')
<div class="invalid-feedback">
<strong>{{ $message }}</strong>
</div>
@enderror
</td>                                
</tr>                       
</table>             
<div class="frameContenedor" style="margin:5px;" align="right">
<input class='btn btn-info' type="submit" value="Registrar Familiar" >
</div>  
</form>                  
<div class="table-responsive mt-3">
<table id="example1" class="table table-striped table-bordered" style="width:100%">                        
<thead>
<tr>
<th>Cedula</th>
<th>Nombre y Apellidos</th>
<th>Parentesco</th>
<th>Correo</th>
<th>Telefono</th>
<th>Sexo</th>
@if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10,11,13,4,6) ))
<th colspan=2>Opción</th>
<th>Requisitos</th>
@endif
</tr>
</thead>                                  
@foreach($familiar as $familiar)
<tr>                                                    
<td>{{ $familiar->nacionalidad }}-{{ $familiar->numero_identificacion }}</td>
<td>{{ $familiar->nombre }} {{ $familiar->nombreseg }} {{ $familiar->apellido }} {{ $familiar->apellidoseg }}</td>
<th>{{ $familiar->parentezco }}</th>
<td>{{ $familiar->email}}</td>
<td>{{ $familiar->telefono}}</td>                                                        
<td>{{ $familiar->cod }}</td>
@if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10,11,13,4,6) ))
    <td class="text-center">
    <a href= "familiar_edit/{{$familiar->id_familiar}}" class="btn btn-info" data-tip="Detalle" title="Actualizar familiar" data-toggle="tooltip" data-original-title="Editar">
    <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
    </a>
    </td>
    
    <td class="text-center">
    <form method="POST" action="{{URL::route('borrarfamiliar',$familiar->id_familiar)}}">
    @csrf
        <input type="hidden" name="_method" value="delete">
        <button type="submit" class="btn btn-info" data-tip="Detalle" title="Eliminar registro" data-toggle="tooltip" data-original-title="Eliminar"> 
        <img src="/img/icon/erase.ico" class="icon-sm" alt="Listado"></button>                                            
    </form>
    </td>    
    <td>  
    @if($familiar->parentezco_id==2)
    <a href= "creardocumento_familiar/{{$tipo_documento='partida_nac_familiar'}}/{{$familiar->id_familiar}}/{{$ir='familiarfuncionario'}}" 
    class="btn btn-success" data-tip="Detalle" title="Cargar Partida de Nacimiento" data-toggle="tooltip" data-original-title="documento">
    <img src="/img/icon/constancia.png" class="icon-sm" alt="Listado">
    </a>
    @endif
    <a href= "creardocumento_familiar/{{$tipo_documento='cedula_familiar'}}/{{$familiar->id_familiar}}/{{$ir='familiarfuncionario'}}"
     class="btn btn-warning" data-tip="Detalle" title="Cargar Cédula de Identidad" data-toggle="tooltip" data-original-title="documento">
    <img src="/img/icon/cedula.png" class="icon-sm" alt="Listado">
    
    </a>
    </td>
@endif                                                            
</tr>
@endforeach     
</tbody>
<tfoot>
<tr>
<th>Cédula de Identidad</th>
<th>Nombre y Apellidos</th>
<th>Parentesco</th>
<th>Correo</th>
<th>Telefono</th>
<th>Sexo</th>
@if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10,11,13,4,6) ))
<th colspan=2>Opción</th>
<th>Requisitos</th>
@endif
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
</div>

@endsection
@section('scripts')
<script src="{{url('js/funciones_generales.js')}}"></script>


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