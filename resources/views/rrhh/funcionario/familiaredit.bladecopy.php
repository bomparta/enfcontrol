@extends('layouts.app')
@section ('content')

<div class="container-fluid">
<div class="row justify-content-start">
@include('layouts.apprrhh')  
       
        
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
          
           
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
                        <tr>
                            <td colspan="4">
                                <div align="center" id="divTituloIndex2" class="text-primary">
                                       <b> DATOS PERSONALES</b>
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <b>Suministre sus datos, haga clic en "Guardar" para registrar su información <b>
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                           
                                </div>
                            </td>
                        </tr>
          <form id="formulario" name="formulario" method="POST" action="{{route('actualizarfamiliar')}}">       
         
          @csrf
            <div>
           
            </div>
                <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >     
                @if (isset($familiar))   
                @foreach($familiar as $key=>$item)   
                    <tr><td><strong>Cédula de Identidad: @if ($item->id_nacionalidad==1) V @else E @endif - {{$item->numero_identificacion}}</strong></td></tr>
                    <input id="id_persona" type="hidden" name="id_persona" value="{{$item->persona_id}}" >
                    <input id="id_funcionario" type="hidden" name="id_funcionario" value="{{$item->id_funcionario}}" >                    
                    <input id="id_familiar" type="hidden" name="id_familiar" value="{{$item->id_familiar}}" >
                    </tr>
                    <tr><td colspan="4"><hr></td></tr>

                        <tr>
                            <td colspan="2">
                                &nbsp;Cédula de Identidad&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="nacionalidad" name="nacionalidad" style="width:70px;" required>
                                    @foreach ($nacionalidades as $nacionalidad)
                                        <option value="{{ $nacionalidad->id  }}">{{ $nacionalidad->cod }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="cedula" id="cedula" value=""  maxlength="12"/>
                                @error('cedula')
                                    <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </td></tr>
                            <tr>
                            <td>
                                &nbsp;Primer Nombre&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <input id="primernombre" type="text"  maxlength="25" class="form-control @error('primernombre') is-invalid @enderror" name="primernombre" value="" required>
                                @error('primernombre')
                                    <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </td>
                            <td>
                                &nbsp;Segundo Nombre&nbsp;<br>
                                <input id="segundonombre" type="text"  maxlength="25" class="form-control @error('segundonombre') is-invalid @enderror" name="segundonombre" value="" >
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
                                &nbsp;Primer Apellido&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <input id="primerapellido" type="text"  maxlength="25" class="form-control @error('primerapellido') is-invalid @enderror" name="primerapellido" value=""  required>
                                @error('primerapellido')
                                    <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </td>
                            <td>
                                &nbsp;Segundo Apellido&nbsp;<br>
                                <input id="segundoapellido" type="text"  maxlength="25" class="form-control @error('segundoapellido') is-invalid @enderror" name="segundoapellido" value=""  >
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
                                &nbsp;Sexo&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select class="form-control"  type="text" name="genero" required>
                                    <option value="0">Seleccione...</option>
                                    @foreach ($generos as $generos)
                                    <option value="{{ $generos->id }}" >
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
                                &nbsp;Fecha Nacimiento&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;">*</span><br>
                                <input type="date" name="fechanac" id="fechanac"  value=""  maxlength="25" required/>
                            </td>
                                        
                        </tr>
                        <tr>
                            <!-- FILA 4 -->
                        <td>
                                &nbsp;Parentezco&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select name="parentezco" id="parentezco"   class="form-control" required >
                                <option value="0">Seleccione...</option>
                                    @foreach ($parentezco as $parentezco)
                                    
                                        <option value="{{ $parentezco->id }}">{{ $parentezco->descripcion }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    
                        <!-- FILA 5 -->
                        <tr>
                            <td>
                                &nbsp;Ocupación&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <input id="ocupacion" type="text"name="ocupacion"  class="form-control" required >
                                
                                
                            </td>
                            <td>
                            &nbsp;Teléfono&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <input id="text" type="text"  maxlength="25" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="" required>
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
                                &nbsp;Vive con Usted?&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="vive" name="vive"class="form-control" required >
                                        <option value="0">Seleccione...</option>
                                        <option value="1">SI</option>
                                        <option value="2">NO</option>
                                    
                                </select>
                            
                            </td>
                            <td>
                                &nbsp;Correo&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <input id="correo" type="email"  maxlength="250" class="form-control @error('correo') is-invalid @enderror" name="correo" value="" required>
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
                          <a class='btn btn-info' href="{{URL::route('familiarfuncionario')}}">Guardar</a>                  
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection