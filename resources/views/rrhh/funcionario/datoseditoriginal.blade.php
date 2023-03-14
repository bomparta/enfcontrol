@extends('layouts.app')
@section ('content')

<div class="container-fluid">
<div class="row justify-content-start">
@include('layouts.apprrhh')  
<div id="page-content-wrapper">
            

            <div class="container pb-4">
                <div class="row align-items-stretch">

                        <div class="col-12">
                            <div class="card mb-4">
            <div align="center" id="divTituloIndex2" class="text-primary">
              
              <b>DATOS PERSONALES</b>
              </div>
           
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
                        <tr>
                            <td colspan="4">
                   
                                <div id="divSubTituloIndex2">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active " href="{{route('buscarfuncionario')}}">Datos Básicos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('direccionfuncionario')}}">Dirección de Domicilio</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link "  href="{{route('hist_medicofuncionario')}}">Historial Médico</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  " href="{{route('bancofuncionario')}}">Cuentas Bancarias</a>
                                    </li>
                                   
                                    </ul>
                                    <hr>
                                    <b>Suministre sus <span style="color:gray; ">Datos Personales</span>, haga clic en "Guardar" para registrar su información <b>
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                           
                                </div>
                            </td>
                        </tr>
          <form id="formulario" name="formulario" method="POST" action="{{route('funcionarioupdate')}}">       
         
          @csrf
            <div>
           
            </div>
                <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >     
                @if (isset($datos_funcionario))   
                @foreach($datos_funcionario as $key=>$item)   
                    <tr><td><strong>Cédula de Identidad: @if ($item->id_nacionalidad==1) V @else E @endif - {{$item->numero_identificacion}}</strong></td></tr>
                    <input id="id_persona" type="hidden" name="id_persona" value="{{$item->persona_id}}" >
                    <input id="id_funcionario" type="hidden" name="id_funcionario" value="{{$item->id_funcionario}}" >
                    <input id="nacionalidad" type="hidden" name="nacionalidad" value="{{$item->id_nacionalidad}}" >
                    <input id="cedula" type="hidden" name="cedula" value="{{$item->numero_identificacion}}" >
                    <tr><td colspan="4"><hr></td></tr>

                <tr> 
                            <td>
                            <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Primer Nombre&nbsp;</span>&nbsp;<span style="color:red;">* </span>
                              
                                <br> 
 
                                <input id="primernombre" type="text"  maxlength="25" onkeyup="mayusculas(this);"  class="form-control @error('primernombre') is-invalid @enderror" name="primernombre" value="{{$item->nombre}}" require  >
                                @error('primernombre')
                                <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>
                        
                            <td>
                            <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> &nbsp;Segundo Nombre&nbsp;</span><br>
                                <input id="segundonombre" type="text"  maxlength="25" onkeyup="mayusculas(this);"  class="form-control @error('segundonombre') is-invalid @enderror" name="segundonombre" value="{{$item->nombreseg}}" >
                                @error('segundonombre')
                                <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>
                        </tr>
   
                      <!--  FILA 2 -->
                       <tr>
                            <td>
                            <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Primer Apellido&nbsp;</span>&nbsp;<span style="color:red;">* </span>
                                <input id="primerapellido" type="text"  maxlength="25" onkeyup="mayusculas(this);"  class="form-control @error('primerapellido') is-invalid @enderror" name="primerapellido" value="{{$item->apellido}}" required>
                                @error('primerapellido')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>
                            <td>
                            <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> &nbsp;Segundo Apellido&nbsp;</span><br>
                                <input id="segundoapellido" type="text"  maxlength="25" onkeyup="mayusculas(this);"  class="form-control @error('segundoapellido') is-invalid @enderror" 
                                name="segundoapellido" value="{{$item->apellidoseg}}" >
                                @error('segundoapellido')
                                <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <!--FILA 3 -->
                        <tr>
                            
                            <td>
                            <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top"> &nbsp;Sexo&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
                                <select class="form-control"  type="text" name="genero" id="genero" required>
                                    <option value="0">Seleccione...</option>
                                    @foreach ($generos as $generos)
                                    <option value="{{ $generos->id }}"
                                    @if($item->id_genero == $generos->id)selected @endif >
                                       {{ $generos->cod }}</option>
                                    @endforeach
                                </select>
                               

                                @error('sexo')
                                <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>
                            <td>
                            <span data-tooltip="Indique una fecha del calendario" sdata-flow="top">&nbsp;Fecha Nacimiento&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;">*</span><br>
                                <input type="date" name="fechanac" id="fechanac" value="{{$item->edad}}"  maxlength="25" required/>
                            </td>
                            @error('fechanac')
                                <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror       
                        </tr>
                        <tr>
                             <!-- FILA 4 -->
                        <td>
                        <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">&nbsp;Estado Civil&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
                                <select name="estadocivil"  class="form-control" required >
                                <option value="0">Seleccione...</option>
                                    @foreach ($estado_civils as $estado_civil)
                                    <option value="{{ $estado_civil->id }}"
                                    @if($item->id_estado_civil == $estado_civil->id)selected @endif >
                                       {{ $estado_civil->descripcion }}</option>
                                       
                                    @endforeach
                                </select>
                                @error('estadocivil')
                                <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror       
                            </td>
                        </tr>
                        <!-- FILA 5 -->
                        <tr>
                            <td>
                                &nbsp;Lugar de Nacimiento&nbsp;<br>
                                <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">&nbsp;Estado&nbsp;</span><span style="color:red;">*</span>&nbsp;                           
                                <select name="estado_nac"  id="estado_nac" class="form-control" required >
                                <option value="0">Seleccione...</option>
                                    @foreach ($entidad as $entidad)
                                        <option value="{{ $entidad->id }}"
                                        @if($item->estado_nac == $entidad->id)selected @endif >
                                        {{ $entidad->descripcion }}</option>
                                    @endforeach
                                </select>
                                @error('estado_nac')
                                <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror   
                            </td>
                            <td>
                            &nbsp;&nbsp;<br>
                            <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Ciudad&nbsp;</span><span style="color:red;">*</span>&nbsp;                             
                                <input id="ciudad_nac" type="text"  maxlength="10" onkeyup="mayusculas(this);" class="form-control @error('ciudad_nac') is-invalid @enderror" name="ciudad_nac" value="{{$item->ciudad_nac}}" required>
                                @error('ciudad_nac')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>                           
                        </tr>
                        <!-- FILA 5 -->
                        <tr>
                            <td>
                            <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">&nbsp;Tipo de Trabajador&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
                                <select id="id_tipo_trabajador" name="id_tipo_trabajador"  class="form-control" required >
                                <option value="0">Seleccione...</option>
                                    @foreach ($tipo_trabajador as $tipo_trabajador)
                                    <option value="{{ $tipo_trabajador->id }}"
                                    @if($item->id_tipo_trabajador == $tipo_trabajador->id)selected @endif >
                                      {{ $tipo_trabajador->descripcion }}</option>
                                    @endforeach
                                </select>
                                @error('id_tipo_trabajador')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>
                            <td>
                            <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> &nbsp;Cargo&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
                                <input type= "text" id="cargo" name="cargo" onkeyup="mayusculas(this);"  value="{{$item->cargo_func}}" class="form-control" required >                              
                                @error('cargo')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>
                            
                        </tr>
                        <!-- FILA 6 -->
                        <tr>
                            <td>
                            <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top"> &nbsp;Unidad de Adscripción&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
                                <select id="id_oficina_administrativa" name="id_oficina_administrativa"class="form-control" required >
                                <option value="0">Seleccione...</option>
                                    @foreach ($uni_adscripcion as $uni_adscripcion)
                                        <option value="{{ $uni_adscripcion->id }}"
                                        @if($item->id_oficina_administrativa == $uni_adscripcion->id)selected @endif >
                                        {{ $uni_adscripcion->descripcion }}</option>
                                    @endforeach
                                </select>
                                @error('id_oficina_administrativa')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                               
                            </td>
                            <td>
                            <span data-tooltip="Debe registar un correo electrónico." sdata-flow="top">&nbsp;Correo&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <input id="correo" type="email"  placeholder="Ej. micorreo@dominio.com" maxlength="250" onkeyup="mayusculas(this);"  class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{$item->email}}" required>
                                @error('correo')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>
                            
                        </tr>
                        @endforeach

                    @endif
                    </table>
                    
                    <div class="frameContenedor" style="margin:5px;" align="right">
                 @if($datos_funcionario->count()>0)
                        <input class='btn btn-info' type="submit" value="Guardar" >
                 @else
                        <a class='btn btn-info' href="{{URL::route('datosfuncionario')}}">Cargar Datos Personales</a>
                  @endif
                    </div>
                </form>
            </div>
        </div>

                
                </div>
            </div>
        </div> <!-- page-content-wrapper -->
    </div> <!-- wrapper -->
@endsection
@section('scripts')
<script src="{{url('js/funciones_generales.js')}}"></script>

@endsection