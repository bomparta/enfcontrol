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
                                    <b>Suministre sus <span style="color:gray; ">Cuentas Bancarias</span>, haga clic en "Guardar" para registrar su información <b>
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                           
                                </div>
                            </td>
                        </tr>
           @foreach($cuentas as $key=>$item)      
          <form id="formulario" name="formulario" method="POST" action="{{route('actualizarcuentas')}}">     
          <input id="id_cuenta" type="hidden" name="id_cuenta" value="{{$item->id}}" >
          @csrf
          <tr>
                        <td>
                        <span data-tooltip="Permite sólo numéros" sdata-flow="top">&nbsp;Cuenta Bancaria N°&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="num_cuenta" id="num_cuenta" onkeypress="return isNumberKey(event);" value="{{$item->cuenta}}" style="width:190px;" maxlength="20"/>
                        </td>
                        <td>
                        <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">&nbsp;Tipo de Cuenta&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <select id="tipo_cuenta" name="tipo_cuenta"class="form-control" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1" @if($item->tipo_cuenta=='1') selected @endif >CORRIENTE</option>
                                            <option value="2"@if($item->tipo_cuenta=='2') selected @endif >AHORRO</option>                                        
                                    </select>  
                        </td>
                        <td>
                        <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">&nbsp;Nombre del Banco&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <select id="nom_banco" name="nom_banco"class="form-control" required >
                            <option value="0">Seleccione...</option>
                            @foreach ($banco as $banco)
                                <option value="{{ $banco->id }}"    @if($item->nombre_banco == $banco->id)selected @endif >    {{ $banco->nombre }}</option>
                            @endforeach
                        </td>
                        </tr>
                    
                    <tr> 
                    <td >
                   
                    </td>
                   
                    </table>

                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Guardar" >
                       
                        <a class='btn btn-secondary' href="{{URL::route('bancofuncionario')}}">Regresar</a>
                    </div>
                    @endforeach
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
@endsection