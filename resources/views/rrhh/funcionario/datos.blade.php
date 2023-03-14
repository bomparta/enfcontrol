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

                          
           
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
                        <tr>
                            <td colspan="4">
                                <div align="center" id="divTituloIndex2" class="text-primary">
                                       <b> DATOS PERSONALES</b>
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <b>Suministre sus datos, haga clic en "Guardar" par registrar su información, de lo contrario haga clic en "Cargar Datos Personales" <b>
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                                </div>
                            </td>
                        </tr>
                        
                       
                    </table>
                    <form id="formulario" name="formulario" method="POST" action="{{route('funcionariostore')}}">
                @csrf
                <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >     
                 
               
                 
                <tr>
                            <td colspan="2">
                                &nbsp;Cédula de Identidad&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="nacionalidad" name="nacionalidad" style="width:70px;" required>
                                    @foreach ($nacionalidades as $nacionalidad)
                                        <option value="{{ $nacionalidad->id  }}">{{ $nacionalidad->cod }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="cedula" id="cedula" value="{{$cedula_usuario}}"  maxlength="12"/>
                                @error('cedula')
                                    <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        @foreach($datos_funcionario as $datos_funcionario)
                <tr> 
                            <td>
                            <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Primer Nombre&nbsp;</span>&nbsp;<span style="color:red;">* </span>
 
                                <input id="primernombre" type="text"  maxlength="25" onkeyup="mayusculas(this);" class="form-control @error('primernombre') is-invalid @enderror" name="primernombre" value="{{$datos_funcionario->nombre}}" require  >
                                @error('primernombre')
                                    <div class="invalid-feedback">
                                    <strong><span  style="color:red;">{{ $message }}</span></strong>
                                    </div>
                                @enderror
                            </td>
                        
                            <td>
                            <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> &nbsp;Segundo Nombre&nbsp;</span><br>
                                <input id="segundonombre" type="text"  maxlength="25" class="form-control @error('segundonombre') is-invalid @enderror" name="segundonombre" value="{{$datos_funcionario->nombreseg}}" >
                                @error('segundonombre')
                                    <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </td>
                        </tr>
   
                      <!--  FILA 2 -->
                       <tr>
                            <td>
                            <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Primer Apellido&nbsp;</span>&nbsp;<span style="color:red;">* </span>
                                <input id="primerapellido" type="text"  maxlength="25" onkeyup="mayusculas(this);" class="form-control @error('primerapellido') is-invalid @enderror" name="primerapellido" value="{{$datos_funcionario->apellido}}" required>
                                @error('primerapellido')
                                    <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </td>
                            <td>
                            <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> &nbsp;Segundo Apellido&nbsp;</span><br>
                                <input id="segundoapellido" type="text"  maxlength="25" onkeyup="mayusculas(this);" class="form-control @error('segundoapellido') is-invalid @enderror" 
                                name="segundoapellido" value="{{$datos_funcionario->apellidoseg}}" >
                                @error('segundoapellido')
                                    <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
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
                                    @if($datos_funcionario->id_genero == $generos->id)selected @endif >
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
                            <span data-tooltip="Indique una fecha del calendario" sdata-flow="top">&nbsp;Fecha Nacimiento&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;">*</span><br>
                                <input type="date" name="fechanac" id="fechanac" value="{{$datos_funcionario->edad}}"  maxlength="25" required/>
                            </td>
                                        
                        </tr>
                        <tr>
                             <!-- FILA 4 -->
                        <td>
                        <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">&nbsp;Estado Civil&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
                                <select name="estadocivil"  class="form-control" required >
                                <option value="0">Seleccione...</option>
                                    @foreach ($estado_civils as $estado_civil)
                                    <option value="{{ $estado_civil->id }}"
                                    @if($datos_funcionario->id_estado_civil == $estado_civil->id)selected @endif >
                                       {{ $estado_civil->descripcion }}</option>
                                       
                                    @endforeach
                                </select>
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
                                        @if($datos_funcionario->estado_nac == $entidad->id)selected @endif >
                                        {{ $entidad->descripcion }}</option>
                                    @endforeach
                                </select>
                            
                            </td>
                            <td>
                            &nbsp;&nbsp;<br>
                            <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Ciudad&nbsp;</span><span style="color:red;">*</span>&nbsp;                             
                                <input id="ciudad_nac" type="text"  maxlength="10" onkeyup="mayusculas(this);" class="form-control @error('ciudad_nac') is-invalid @enderror" name="ciudad_nac" value="{{$datos_funcionario->ciudad_nac}}" required>
                                @error('ciudad_nac')
                                    <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </td>                           
                        </tr>
                        <!-- FILA 5 -->
                        <tr>
                            <td>
                            <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">&nbsp;Tipo de Trabajador&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
                                <select id="id_tipo_funcionario" name="id_tipo_funcionario"  class="form-control" required >
                                <option value="0">Seleccione...</option>
                                    @foreach ($tipo_trabajador as $tipo_trabajador)
                                    <option value="{{ $tipo_trabajador->id }}">
                                 
                                      {{ $tipo_trabajador->descripcion }}</option>
                                    @endforeach
                                </select>
                                
                            </td>
                            <td>
                            <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> &nbsp;Cargo&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
                                <input type= "text" id="cargo" name="cargo" value="" class="form-control" required >                              
                                
                            </td>
                            
                        </tr>
                        <!-- FILA 6 -->
                        <tr>
                            <td>
                            <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top"> &nbsp;Unidad de Adscripción&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
                                <select id="id_oficina_administrativa" name="id_oficina_administrativa"class="form-control" required >
                                <option value="0">Seleccione...</option>
                                    @foreach ($uni_adscripcion as $uni_adscripcion)
                                        <option value="{{ $uni_adscripcion->id }}">{{ $uni_adscripcion->descripcion }}</option>
                                    @endforeach
                                </select>
                               
                            </td>
                            <td>
                            <span data-tooltip="Debe registar un correo electrónico." sdata-flow="top">&nbsp;Correo&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <input id="correo" type="email"  placeholder="Ej. micorreo@dominio.com" maxlength="250" onkeyup="mayusculas(this);" class="form-control @error('correo') is-invalid @enderror" name="correo" value="" placeholder ="micorreo@dominio.com"required>
                                @error('correo')
                                    <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </td>
                            
                        </tr>
                    @endforeach

                  
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

@section('scripts')
<script src="{{url('js/funciones_generales.js')}}"></script>
@endsection