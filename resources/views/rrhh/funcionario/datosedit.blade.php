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
                                &nbsp;Primer Nombre&nbsp;<span style="color:red;">*</span>&nbsp;<br>
 
                                <input id="primernombre" type="text"  maxlength="25" class="form-control @error('primernombre') is-invalid @enderror" name="primernombre" value="{{$item->nombre}}" require  >
                                @error('primernombre')
                                <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>
                        
                            <td>
                                &nbsp;Segundo Nombre&nbsp;<br>
                                <input id="segundonombre" type="text"  maxlength="25" class="form-control @error('segundonombre') is-invalid @enderror" name="segundonombre" value="{{$item->nombreseg}}" >
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
                                &nbsp;Primer Apellido&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <input id="primerapellido" type="text"  maxlength="25" class="form-control @error('primerapellido') is-invalid @enderror" name="primerapellido" value="{{$item->apellido}}" required>
                                @error('primerapellido')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>
                            <td>
                                &nbsp;Segundo Apellido&nbsp;<br>
                                <input id="segundoapellido" type="text"  maxlength="25" class="form-control @error('segundoapellido') is-invalid @enderror" 
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
                                &nbsp;Sexo&nbsp;<span style="color:red;">*</span>&nbsp;<br>
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
                                &nbsp;Fecha Nacimiento&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;">*</span><br>
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
                                &nbsp;Estado Civil&nbsp;<span style="color:red;">*</span>&nbsp;<br>
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
                                &nbsp;Estado&nbsp;<span style="color:red;">*</span>&nbsp;                           
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
                                &nbsp;Ciudad&nbsp;<span style="color:red;">*</span>&nbsp;                             
                                <input id="ciudad_nac" type="text"  maxlength="10" class="form-control @error('ciudad_nac') is-invalid @enderror" name="ciudad_nac" value="{{$item->ciudad_nac}}" required>
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
                                &nbsp;Tipo de Trabajador&nbsp;<span style="color:red;">*</span>&nbsp;<br>
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
                                &nbsp;Cargo&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <input type= "text" id="cargo" name="cargo" value="{{$item->cargo_func}}" class="form-control" required >                              
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
                                &nbsp;Unidad de Adscripción&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="id_oficina_administrativa" name="id_oficina_administrativa"class="form-control" required >
                                <option value="0">Seleccione...</option>
                                    @foreach ($cod_cels as $cod_cel)
                                        <option value="{{ $cod_cel->id }}"
                                        @if($item->id_oficina_administrativa == $cod_cel->id)selected @endif >
                                        {{ $cod_cel->descripcion }}</option>
                                    @endforeach
                                </select>
                                @error('id_oficina_administrativa')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                               
                            </td>
                            <td>
                                &nbsp;Correo&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <input id="correo" type="email"  maxlength="250" class="form-control @error('correo') is-invalid @enderror" name="correo" value="{{$item->email}}" required>
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

@endsection