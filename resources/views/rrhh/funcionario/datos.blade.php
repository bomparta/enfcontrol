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

                <tr> 
                            <td>
                                &nbsp;Primer Nombre&nbsp;<span style="color:red;">*</span>&nbsp;<br>
 
                                <input id="primernombre" type="text"  maxlength="25" class="form-control @error('primernombre') is-invalid @enderror" name="primernombre" value="" require  >
                                @error('primernombre')
                                    <div class="invalid-feedback">
                                    <strong><span  style="color:red;">{{ $message }}</span></strong>
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
   
                      <!--  FILA 2 -->
                       <tr>
                            <td>
                                &nbsp;Primer Apellido&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <input id="primerapellido" type="text"  maxlength="25" class="form-control @error('primerapellido') is-invalid @enderror" name="primerapellido" value="" required>
                                @error('primerapellido')
                                    <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </td>
                            <td>
                                &nbsp;Segundo Apellido&nbsp;<br>
                                <input id="segundoapellido" type="text"  maxlength="25" class="form-control @error('segundoapellido') is-invalid @enderror" 
                                name="segundoapellido" value="" >
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
                                &nbsp;Sexo&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select class="form-control"  type="text" name="genero" id="genero" required>
                                    <option value="0">Seleccione...</option>
                                    @foreach ($generos as $generos)
                                    <option value="{{ $generos->id }}">
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
                                <input type="date" name="fechanac" id="fechanac" value=""  maxlength="25" required/>
                            </td>
                                        
                        </tr>
                        <tr>
                             <!-- FILA 4 -->
                        <td>
                                &nbsp;Estado Civil&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select name="estadocivil"  class="form-control" required >
                                <option value="0">Seleccione...</option>
                                    @foreach ($estado_civils as $estado_civil)
                                    <option value="{{ $estado_civil->id }}">
                                       {{ $estado_civil->descripcion }}</option>
                                       
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <!-- FILA 5 -->
                        <tr>
                            <td>
                                &nbsp;Lugar de Nacimiento&nbsp;<br>
                                &nbsp;Estado&nbsp;<span style="color:red;">*</span>&nbsp;                           
                                <select name="estado_nac"  id="estado_nac" class="form-control" required >
                                <option value="0">Seleccione...</option>
                                    @foreach ($entidad as $entidad)
                                        <option value="{{ $entidad->id }}">
                                        {{ $entidad->descripcion }}</option>
                                    @endforeach
                                </select>
                            
                            </td>
                            <td>
                            &nbsp;&nbsp;<br>
                                &nbsp;Ciudad&nbsp;<span style="color:red;">*</span>&nbsp;                             
                                <input id="ciudad_nac" type="text"  maxlength="10" class="form-control @error('ciudad_nac') is-invalid @enderror" name="ciudad_nac" value="" required>
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
                                &nbsp;Tipo de Trabajador&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="id_tipo_funcionario" name="id_tipo_funcionario"  class="form-control" required >
                                <option value="0">Seleccione...</option>
                                    @foreach ($tipo_trabajador as $tipo_trabajador)
                                    <option value="{{ $tipo_trabajador->id }}">
                                 
                                      {{ $tipo_trabajador->descripcion }}</option>
                                    @endforeach
                                </select>
                                
                            </td>
                            <td>
                                &nbsp;Cargo&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <input type= "text" id="cargo" name="cargo" value="" class="form-control" required >                              
                                
                            </td>
                            
                        </tr>
                        <!-- FILA 6 -->
                        <tr>
                            <td>
                                &nbsp;Unidad de Adscripción&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="id_oficina_administrativa" name="id_oficina_administrativa"class="form-control" required >
                                <option value="0">Seleccione...</option>
                                    @foreach ($cod_cels as $cod_cel)
                                        <option value="{{ $cod_cel->id }}">{{ $cod_cel->descripcion }}</option>
                                    @endforeach
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