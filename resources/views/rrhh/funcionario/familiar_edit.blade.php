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
                                       <b> DATOS GRUPO FAMILIAR</b>
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <b>Suministre los datos de su grupo familiar, haga clic en "Guardar" par registrar su información <b>
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  

                                </div>
                            </td>
                        </tr>
                    </table>
                       
                    <table>
                  
                        <form id="formulario" name="formulario" method="POST" action="{{route('actualizarfamiliar')}}">
                            @csrf
                            <tr>
                                
                            @if (isset($familiar))   
                                @foreach($familiar as $key=>$item)       
                            <td>
                                <input id="id_persona" type="hidden" name="id_persona" value="{{$item->id_persona}}" >
                                <input id="id_funcionario" type="hidden" name="id_funcionario" value="{{$item->funcionario_id}}" >
                                <input id="id_familiar" type="hidden" name="id_familiar" value="{{$item->id_familiar}}" >
                            </td>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    &nbsp;Cédula de Identidad&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                    <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">  
                                    <select id="nacionalidad" name="nacionalidad" style="width:70px;" required>
                                        @foreach ($nacionalidades as $nacionalidad)
                                            <option value="{{ $nacionalidad->id  }}">{{ $nacionalidad->cod }}</option>
                                        @endforeach
                                    </select>
                                    </span>
                                    <span data-tooltip="Permite sólo numéros" sdata-flow="top">
                                    <input type="text" name="cedula" id="cedula" onkeypress="return isNumberKey(event);" value="{{$item->numero_identificacion}}"  maxlength="12" disabled/>
                                    </span>
                                    @error('cedula')
                                        <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </td></tr>
                                <tr>
                                <td>
                                <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">
                                    &nbsp;Primer Nombre&nbsp;
                                </span>
                                    <span style="color:red;">*</span>&nbsp;<br>
                                    <input id="primernombre" type="text"  maxlength="25"  onkeyup="mayusculas(this);" class="form-control @error('primernombre') is-invalid @enderror" name="primernombre" value="{{$item->nombre}}" required>
                                    @error('primernombre')
                                        <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </td>
                                <td>
                                <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">
                                     &nbsp;Segundo Nombre&nbsp;<br>
                                </span>   
                                    <input id="segundonombre" type="text"  maxlength="25"  onkeyup="mayusculas(this);"class="form-control @error('segundonombre') is-invalid @enderror" name="segundonombre" value="{{$item->nombreseg}}" >
                                    @error('segundonombre')
                                        <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </td>
                            </tr>
                            <!-- FILA 2 -->
                            <tr>
                                <td>
                                <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">
                                    &nbsp;Primer Apellido&nbsp;</span>
                                    <span style="color:red;">*</span>&nbsp;<br>
                                    <input id="primerapellido" type="text"  maxlength="25"  onkeyup="mayusculas(this);" class="form-control @error('primerapellido') is-invalid @enderror" name="primerapellido" value="{{$item->apellido}}"  required>
                                    @error('primerapellido')
                                        <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </td>
                                <td>
                                <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">
                                    &nbsp;Segundo Apellido&nbsp;<br>
                                </span>
                                    <input id="segundoapellido" type="text"  maxlength="25"  onkeyup="mayusculas(this);" class="form-control @error('segundoapellido') is-invalid @enderror" name="segundoapellido" value="{{$item->apellidoseg}}"  >
                                    @error('segundoapellido')
                                        <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </td>
                            </tr>
                        <!-- FILA 3 -->
                        <tr>
                                
                                <td>
                                <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top"> 
                                    &nbsp;Sexo&nbsp;</span>
                                    <span style="color:red;">*</span>&nbsp;<br>
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
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </td>
                                <td>
                                <span data-tooltip="Indique una fecha del calendario" sdata-flow="top"> 
                                    &nbsp;Fecha Nacimiento&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                    <span style="color:red;">*</span><br>
                                    <input type="date" name="fechanac" id="fechanac"  value="{{$item->edad}}"  maxlength="25" required/>
                                </td>
                                            
                            </tr>
                            <tr>
                                <!-- FILA 4 -->
                            <td>
                            <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">       
                            &nbsp;Parentesco&nbsp;
                            </span>
                            <span style="color:red;">*</span>&nbsp;<br>
                                    <select name="parentezco" id="parentezco"   class="form-control" required >
                                    <option value="0">Seleccione...</option>
                                        @foreach ($parentezco as $parentezco)
                                        <option value="{{ $parentezco->id }}"
                                        @if($item->parentezco_id == $parentezco->id)selected @endif >    
                                           {{ $parentezco->descripcion }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                        
                            <!-- FILA 5 -->
                            <tr>
                                <td>
                                <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">   
                                    &nbsp;Ocupación&nbsp;
                                </span>
                                <span style="color:red;">*</span>&nbsp;<br>
                                    <input id="ocupacion" type="text"name="ocupacion"  onkeyup="mayusculas(this);" class="form-control" value="{{$item->ocupacion}}" required >                         
                                </td>
                                <td>
                                <span data-tooltip="Permite sólo núméros" sdata-flow="top">  
                                &nbsp;Teléfono&nbsp;
                                </span>
                                <span style="color:red;">*</span>&nbsp;<br>
                                    <input id="text" type="text"  maxlength="25" placeholder="Ej. 04121234578 ó 02121234567" onkeypress="return isNumberKey(event);" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{$item->telefono}}" required>
                                    @error('telefono')
                                        <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    
                                </td>
                                
                            </tr>
                            <!-- FILA 6 -->
                            <tr>
                                <td>
                                <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top"> 
                                    &nbsp;Vive con Usted?&nbsp;</span>
                                    <span style="color:red;">*</span>&nbsp;<br>
                                    <select id="vive" name="vive"class="form-control" required >
                                        
                                            <option value="0">Seleccione...</option>
                                            <option value="1"   @if ($item->vive_id==1) echo "selected" @endif >SI</option>
                                            <option value="2"  selected @if ($item->vive_id==1) echo "selected" @endif >NO</option>
                                        
                                    </select>
                                
                                </td>
                                <td>
                                <span data-tooltip="Debe registar un correo electrónico." sdata-flow="top">    
                                &nbsp;Correo&nbsp;
                                </span>
                                <span style="color:red;">*</span>&nbsp;<br>
                                    <input id="correo" type="email"  maxlength="250" onkeyup="mayusculas(this);" class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{$item->email}}" required>
                                    @error('correo')
                                        <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </td>
                                
                            </tr>

                       @endforeach
                        @endif                    
                    </table> 
                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Guardar" >
                        <a class='btn btn-secondary' href="{{URL::route('familiarfuncionario')}}">Regresar</a>
                    </div>
          
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