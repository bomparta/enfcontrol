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
                        <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top"> &nbsp;Presenta algún tipo de enfermedad crónica o padecimiento:&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <select id="posee_enfermedad" name="posee_enfermedad"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1" @if($item->posee_enfermedad=='1')  selected @endif>SI</option>
                                            <option value="2" @if($item->posee_enfermedad=='2')  selected @endif>NO</option>                                                                 
                                    </select> 
                                   
                        </td>
                        <td colspan="2"> 
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp; Especifíque:&nbsp;</span>               
                           <input type="text" class="form-control"name="tipo_enfermedad" id="tipo_enfermedad" onkeyup="mayusculas(this);" value="{{$item->tipo_enfermedad}}"  maxlength="200" size="50" />        
                              
                        </td>
                       
                    </tr>
                    <tr>
                        <td colspan="2">
                        <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top"> &nbsp;Presenta algún tipo de alergia:&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <select id="es_alergico" name="es_alergico"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1" @if($item->es_alergico=='1')  selected @endif>SI</option>
                                            <option value="2" @if($item->es_alergico=='2')  selected @endif>NO</option>                                                                 
                                    </select> 
                        </td>
                         <td colspan="2">
                         <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> &nbsp; Especifíque:&nbsp;  </span>             
                           <input type="text" class="form-control"name="tipo_alergia" id="tipo_alergia" onkeyup="mayusculas(this);" value="{{$item->tipo_alergia}}"  maxlength="200" size="50" />              
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2"> 
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">  &nbsp;Si está bajo algún tratamiento médico especifíque:&nbsp;&nbsp;</span>
                            <input type="text" class="form-control" name="tratamiento" id="tratamiento" onkeyup="mayusculas(this);" value="{{$item->tratamiento}}"  maxlength="200" size="50" />
                        </td>
                        <td colspan="2"> 
                        <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top"> &nbsp;Grupo Sanguíneo</span><span style="color:red;">*</span>&nbsp;
                            <select id="grupo_sanguineo" name="grupo_sanguineo"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="O RH+" @if($item->grupo_sanguineo=='O RH+')  selected @endif>O RH+</option>
                                            <option value="O RH-" @if($item->grupo_sanguineo=='O RH-')  selected @endif>O RH-</option>
                                            <option value="A RH+" @if($item->grupo_sanguineo=='A RH+')  selected @endif>A RH+</option>
                                            <option value="A RH-" @if($item->grupo_sanguineo=='A RH-')  selected @endif>A RH-</option>
                                            <option value="AB RH+" @if($item->grupo_sanguineo=='A BRH+')  selected @endif>AB RH+</option>
                                            <option value="AB RH-" @if($item->grupo_sanguineo=='A BRH-')  selected @endif>AB RH-</option>                                                       
                                    </select> 
                            
                        </td>
                    </tr>   
                    <tr> 
                    <td class="table-primary"rowspan="4">&nbsp;<b>TALLAS</b> </td>
                    
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Estatura&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="estatura" id="estatura" value="{{$item->estatura}}"  onkeyup="mayusculas(this);" maxlength="25" required/>
                        </td>
                        <td>
                        <span data-tooltip="Permite sólo numéros" sdata-flow="top">&nbsp;Peso&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="text"class="form-control" required name="peso" id="peso" value="{{$item->peso}}" onkeypress="return isNumberKey(event);" maxlength="100" required/>
                        </td>
                        </tr>
                    <tr>
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Pantalón&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"  required name="pantalon" id="pantalon"  maxlength="200" onkeyup="mayusculas(this);" value="{{$item->pantalon}}" required/>
                        </td>                     
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Camisa&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"  required name="camisa" id="camisa"  maxlength="200" onkeyup="mayusculas(this);" value="{{$item->camisa}}" required/>
                        </td> 
                        </tr>
                    <tr>
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Calzado&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"  required name="calzado" id="calzado"  maxlength="200" value="{{$item->calzado}}" onkeyup="mayusculas(this);" required/>
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
    </div>
</div>

@endsection
@section('scripts')
<script src="{{url('js/funciones_generales.js')}}"></script>
@endsection