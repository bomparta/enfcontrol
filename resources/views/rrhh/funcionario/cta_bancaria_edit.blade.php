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
                            &nbsp;Cuenta Bancaria N°&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="num_cuenta" id="num_cuenta" value="{{$item->cuenta}}" style="width:190px;" maxlength="25"/>
                        </td>
                        <td>
                            &nbsp;Tipo de Cuenta&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text"class="form-control" required name="tipo_cuenta" id="tipo_cuenta" value="{{$item->tipo_cuenta}}" style="width:190px;" maxlength="100"/>
                        </td>
                        <td>
                            &nbsp;Nombre del Banco&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"  required name="nom_banco" id="nom_banco" maxlength="200" value="{{$item->nombre_banco}}"/>
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

@endsection
