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
                    <table  align="center" border="0" cellpadding="5" cellspacing="5" width="100%" >
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
                                    <a class="nav-link active"  href="{{route('hist_medicofuncionario')}}">Historial Médico</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{route('bancofuncionario')}}">Cuentas Bancarias</a>
                                    </li>
                                   
                                    </ul>
                                        
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <b>Suministre sus datos de su <span style="color:gray; ">Historial Médico</span>, haga clic en "Guardar" para registrar su información <b>
                                    <hr>   
                                </div>
                            </td>
                        </tr>
                    
                    </tr>
                   
                   
                    <tr>
                        <td colspan="2"> 
                            &nbsp;Presenta algún tipo de alergia, enfermedad crónica o padecimiento especifíque:&nbsp;<span style="color:red;">*</span>&nbsp;
                           <input type="text" class="form-control"name="enfermedad" id="enfermedad" value=""  maxlength="200" size="50" />                 
                        </td>
                        <td colspan="2"> 
                            &nbsp;Grupo Sanguineo<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"name="grupo_sanguineo" id="grupo_sanguineo" value=""  maxlength="200" size="50" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"> 
                            &nbsp;Si está bajo algún tratamiento médico especifíque:&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" name="tratamiento" id="especialidad" value=""  maxlength="200" size="50" />
                        </td>
                       
                    </tr>   
                    <tr> 
                    <td class="table-primary"rowspan="4">&nbsp;<b>TALLAS</b> </td>
                    
                        <td>
                            &nbsp;Estatura&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="estatura" id="estatura" value=""  maxlength="25"/>
                        </td>
                        <td>
                            &nbsp;Peso&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text"class="form-control" required name="peso" id="peso" value="" maxlength="100"/>
                        </td>
                        </tr>
                    <tr>
                        <td>
                            &nbsp;Pantalón&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"  required name="pantalon" id="pantalon"  maxlength="200" value=""/>
                        </td>                     
                        <td>
                            &nbsp;Camisa&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"  required name="pantalon" id="pantalon"  maxlength="200" value=""/>
                        </td> 
                        </tr>
                    <tr>
                        <td>
                            &nbsp;Calzado&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"  required name="pantalon" id="pantalon"  maxlength="200" value=""/>
                        </td>
                        </tr>
                    <tr> 
                    </table>
                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Guardar" >
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection