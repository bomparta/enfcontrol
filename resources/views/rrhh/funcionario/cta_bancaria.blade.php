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
                <form id="formulario" name="formulario" method="post" action="#">
                    <table  align="center" border="0" cellpadding="5" cellspacing="2" width="100%" >
                    <tr>
                            <td colspan="4">
                            <div class="col-12 text-center">
                
                            <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{route('buscarfuncionario')}}">Datos Básicos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('direccionfuncionario')}}">Dirección de Domicilio</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link "  href="{{route('hist_medicofuncionario')}}">Historial Médico</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active " href="{{route('bancofuncionario')}}">Cuentas Bancarias</a>
                                    </li>
                                   
                                    </ul>
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <b>Suministre sus datos de las <span style="color:gray;">Cuentas Bancarias</span> que posee, haga clic en "Guardar" para registrar su información <b>
                                    <hr>   
                                </div>
                            </td>
                        </tr>
                    
                    <tr> 
                        
                        <td>
                            &nbsp;Cuenta Bancaria N°&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="num_cuenta" id="num_cuenta" value="" style="width:190px;" maxlength="25"/>
                        </td>
                        <td>
                            &nbsp;Tipo de Cuenta&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text"class="form-control" required name="tipo_cuenta" id="tipo_cuenta" value="" style="width:190px;" maxlength="100"/>
                        </td>
                        <td>
                            &nbsp;Nombre del Banco&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"  required name="nom_banco" id="nom_banco" maxlength="200" value=""/>
                        </td>
                        </tr>
                    
                    <tr> 
                    <td >
                   
                    </td>
                   
                    </table>

                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Registrar Curso" >
                    </div>

                    <div class="table-responsive mt-3">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">                        
                            <thead>
                                <tr>
                                    <th>N° Cuenta</th>
                                    <th>Nombre del Banco</th>
                                    <th>Tipo de Cuenta</th>
                                    <th>N° Cuenta</th>                                   
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                        <th>Opcion</th>
                                    @endif
                                </tr>
                            </thead>    
                            <tbody>                              
                                <tr>                                                    
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                            <td class="text-center">
                                            <a href= "#" class="btn btn-info" data-tip="Detalle" title="Actualizar Curso" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
                                            </a>
                                            </td>
                                        @endif                                                            
                                    </tr>
                            
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>N° Cuenta</th>
                                    <th>Nombre del Banco</th>
                                    <th>Tipo de Cuenta</th>
                                    <th>N° Cuenta</th>                                   
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                        <th>Opcion</th>
                                    @endif
                                    
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection