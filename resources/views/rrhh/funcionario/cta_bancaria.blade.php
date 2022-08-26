@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
    @include('layouts.apprrhh')
    <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
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
                            &nbsp;Cuenta Bancaria N°&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="num_cuenta" id="num_cuenta" value="" style="width:190px;" maxlength="25"/>
                        </td>
                        <td>
                            &nbsp;Tipo de Cuenta&nbsp;<span style="color:red;">*</span>&nbsp;                           
                            <select id="tipo_cuenta" name="tipo_cuenta"class="form-control" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1">CORRIENTE</option>
                                            <option value="2">AHORRO</option>                                        
                                    </select>  
                        </td>
                        <td>
                            &nbsp;Nombre del Banco&nbsp;<span style="color:red;">*</span>&nbsp;
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

                    <div class="table-responsive mt-3">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">                        
                            <thead>
                                <tr>
                                    <th>N° Cuenta</th>
                                    <th>Tipo de Cuenta</th>
                                    <th>Nombre del Banco</th>
                                                               
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10,11,13,4,6) ))
                                        <th>Opcion</th>
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
                                        <th>Opcion</th>
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

@endsection
