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
                                    <a class="nav-link active "  href="{{route('hist_medicofuncionario')}}">Historial Médico</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{route('bancofuncionario')}}">Cuentas Bancarias</a>
                                    </li>
                                   
                                    </ul>
                                    <hr>
                                    <b>Suministre su <span style="color:gray; ">Historial Médico</span>, haga clic en "Guardar" para registrar su información <b>
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                           
                                </div>
                            </td>
                        </tr>
                     
          <form id="formulario" name="formulario" method="POST" action="{{route('updatehist_medico')}}">     
          @if (count($funcionario)>0)   
          @foreach($funcionario as $key=>$item)       
         <input id="id_funcionario" type="hidden" name="id_funcionario" value="{{$item->funcionario_id}}" >
          @csrf
          <tr>
                        <td colspan="2"> 
                            &nbsp;Presenta algún tipo de enfermedad crónica o padecimiento:&nbsp;<span style="color:red;">*</span>&nbsp;
                            <select id="posee_enfermedad" name="posee_enfermedad"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1" @if($item->posee_enfermedad=='1')  selected @endif>SI</option>
                                            <option value="2" @if($item->posee_enfermedad=='2')  selected @endif>NO</option>                                                                 
                                    </select> 
                                   
                        </td>
                        <td colspan="2"> 
                        &nbsp; Especifíque:&nbsp;               
                           <input type="text" class="form-control"name="tipo_enfermedad" id="tipo_enfermedad" value="{{$item->tipo_enfermedad}}"  maxlength="200" size="50" />        
                              
                        </td>
                       
                    </tr>
                    <tr>
                        <td colspan="2">
                    &nbsp;Presenta algún tipo de alergia:&nbsp;<span style="color:red;">*</span>&nbsp;
                            <select id="es_alergico" name="es_alergico"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1" @if($item->es_alergico=='1')  selected @endif>SI</option>
                                            <option value="2" @if($item->es_alergico=='2')  selected @endif>NO</option>                                                                 
                                    </select> 
                        </td>
                         <td colspan="2">
                            &nbsp; Especifíque:&nbsp;               
                           <input type="text" class="form-control"name="tipo_alergia" id="tipo_alergia" value="{{$item->tipo_alergia}}"  maxlength="200" size="50" />              
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2"> 
                            &nbsp;Si está bajo algún tratamiento médico especifíque:&nbsp;&nbsp;
                            <input type="text" class="form-control" name="tratamiento" id="tratamiento" value="{{$item->tratamiento}}"  maxlength="200" size="50" />
                        </td>
                        <td colspan="2"> 
                            &nbsp;Grupo Sanguíneo<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"name="grupo_sanguineo" id="grupo_sanguineo" value="{{$item->grupo_sanguineo}}"  maxlength="200" size="50" required/>
                        </td>
                    </tr>   
                    <tr> 
                    <td class="table-primary"rowspan="4">&nbsp;<b>TALLAS</b> </td>
                    
                        <td>
                            &nbsp;Estatura&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="estatura" id="estatura" value="{{$item->estatura}}"  maxlength="25" required/>
                        </td>
                        <td>
                            &nbsp;Peso&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text"class="form-control" required name="peso" id="peso" value="{{$item->peso}}" maxlength="100" required/>
                        </td>
                        </tr>
                    <tr>
                        <td>
                            &nbsp;Pantalón&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"  required name="pantalon" id="pantalon"  maxlength="200" value="{{$item->pantalon}}" required/>
                        </td>                     
                        <td>
                            &nbsp;Camisa&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"  required name="camisa" id="camisa"  maxlength="200" value="{{$item->camisa}}" required/>
                        </td> 
                        </tr>
                    <tr>
                        <td>
                            &nbsp;Calzado&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"  required name="calzado" id="calzado"  maxlength="200" value="{{$item->calzado}}" required/>
                        </td>
                        </tr>
                    <tr> 
                    </table>
                    @endforeach
                      <div class="frameContenedor" style="margin:5px;" align="right">
                      <input class='btn btn-info' type="submit" value="Guardar" >
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