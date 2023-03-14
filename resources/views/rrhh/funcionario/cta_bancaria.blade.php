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
                                <b>DATOS PERSONALES</b>
                                </div>
           
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
                   
                                <div id="divSubTituloIndex2">
                                    <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{route('buscarfuncionario')}}">Datos Básicos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{route('direccionfuncionario')}}">Dirección de Domicilio</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link  "  href="{{route('hist_medicofuncionario')}}">Historial Médico</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active " href="{{route('bancofuncionario')}}">Cuentas Bancarias</a>
                                    </li>
                                   
                                    </ul>
                                    <hr>
                                    <b>Suministre sus <span style="color:gray; ">Cuentas Bancarias</span>, haga clic en "Registrar Cuenta" para guardar su información <b>
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                           
                                </div>
                            </td>
                        </tr>
                        </table>
                       
                       <table>          
          <form id="formulario" name="formulario" method="POST" action="{{route('storecuentas')}}">    
            @if(isset($funcionario_id)) 
          <input id="id_funcionario" type="hidden" name="id_funcionario" value="{{$funcionario_id}}" >
          @csrf
          <tr>
                        <td>
                        <span data-tooltip="Permite sólo numéros" sdata-flow="top">&nbsp;Cuenta Bancaria N°&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="num_cuenta" id="num_cuenta" value="" onkeypress="return isNumberKey(event);" style="width:190px;" maxlength="20"/>
                        </td>
                        <td>
                        <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">&nbsp;Tipo de Cuenta&nbsp;</span><span style="color:red;">*</span>&nbsp;                           
                            <select id="tipo_cuenta" name="tipo_cuenta"class="form-control" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1">CORRIENTE</option>
                                            <option value="2">AHORRO</option>                                        
                                    </select>  
                        </td>
                        <td>
                        <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top"> &nbsp;Nombre del Banco&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <select id="nom_banco" name="nom_banco"class="form-control" required >
                            <option value="0">Seleccione...</option>
                            @foreach ($banco as $banco)
                                <option value="{{ $banco->id }}">{{ $banco->nombre }}</option>
                            @endforeach
                        </td>
                        </tr>
                    
                    <tr> 
                    <td >
                   
                    </td>
                   
                    </table>

                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Registrar Cuenta" >
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped" >                        
                            <thead>
                                <tr>
                                    <th>N° Cuenta</th>
                                    <th>Tipo de Cuenta</th>
                                    <th>Nombre del Banco</th>
                                                               
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10,11,13,4,6) ))
                                        <th colspan=2>Opcion</th>
                                    @endif
                                </tr>
                            </thead>    
                            @if(isset($cuentas))
                           
                            <tbody>  
                            @foreach($cuentas as $cuentas)              
                                <tr>                                                    
                                        <td>{{$cuentas->cuenta}}</td>
                                        <td>@if($cuentas->tipo_cuenta==1)Corriente  @elseif ($cuentas->tipo_cuenta==2)Ahorro @endif</td>
                                        <td>{{$cuentas->nombre}}</td>
                                       
                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10,11,13,4,6) ))
                                            <td class="text-center">
                                            <a href= "cta_bancariaedit/{{$cuentas->id}}" class="btn btn-info" data-tip="Detalle" title="Actualizar Cuenta Bancaria" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
                                            </a>
                                            </td>
                                            <td class="text-center">
                                            <form method="POST" action="{{URL::route('borrarcuenta',$cuentas->id)}}">
                                             @csrf
                                                <input type="hidden" name="_method" value="delete">
                                                <button type="submit" class="btn btn-info" data-tip="Detalle" title="Eliminar registro" data-toggle="tooltip" data-original-title="Eliminar"> 
                                                <img src="/img/icon/erase.ico" class="icon-sm" alt="Listado"></button>                                            
                                             </form>
                                            </td>
                                        @endif                                                            
                                    </tr>
                           @endforeach
                           
                            </tbody>
                            @endif  
                            <tfoot>
                                <tr>
                                <th>N° Cuenta</th>
                                    <th>Tipo de Cuenta</th>
                                    <th>Nombre del Banco</th>
                                                                   
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10,11,13,4,6) ))
                                        <th colspan=2>Opcion</th>
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
                   
                </form>
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
},
});
});
</script>


@endsection  