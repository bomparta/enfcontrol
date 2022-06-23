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
                                    <b>Suministre sus datos, haga clic en "Guardar" par registrar su información <b>
                                    <hr>   
                                </div>
                            </td>
                        </tr>
                        <tr>
                        <td colspan="4">
                            <nav class="navbar bg-light">
                            <div class="container-fluid">
                            <form class="d-flex" role="search">
                         
                            &nbsp;Cédula de Identidad&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                            <select id="nacionalidad" name="nacionalidad" style="width:70px;" required>
                                    @foreach ($nacionalidades as $nacionalidad)
                                        <option value="{{ $nacionalidad->id  }}">{{ $nacionalidad->cod }}</option>
                                    @endforeach
                                </select>
                            <input class="form-control me-2" type="search" name="cedula"placeholder="Sólo números Ej. 123456789" aria-label="Search" require>
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                           
                           </form>
                            </div>
                            </nav>
                            </td>
                        </tr>
                       
                   
          
          <form id="formulario" name="formulario" method="POST" action="{{route('funcionarioupdate')}}">       
         
          @csrf
            <div>
            @include('rrhh.funcionario.mensaje')  
            </div>
                <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >     
                @if (isset($datos_funcionario))   
                @foreach($datos_funcionario as $key=>$item)   
                    <tr><td><strong>Cédula de Identidad: @if ($item->id_nacionalidad==1) V @else E @endif - {{$item->numero_identificacion}}</strong></td></tr>
                    <input id="id_persona" type="text" name="id_persona" value="{{$item->persona_id}}" >
                    <input id="id_funcionario" type="text" name="id_funcionario" value="{{$item->id}}" >
                    <tr><td colspan="4"><hr></td></tr>

                <tr> 
                            <td>
                                &nbsp;Primer Nombre&nbsp;<span style="color:red;">*</span>&nbsp;<br>
 
                                <input id="primernombre" type="text"  maxlength="25" class="form-control @error('primernombre') is-invalid @enderror" name="primernombre" value="{{$item->nombre}}" require  >
                                @error('primernombre')
                                    <div class="invalid-feedback">
                                    <strong><span  style="color:red;">{{ $message }}</span></strong>
                                    </div>
                                @enderror
                            </td>
                        
                            <td>
                                &nbsp;Segundo Nombre&nbsp;<br>
                                <input id="segundonombre" type="text"  maxlength="25" class="form-control @error('segundonombre') is-invalid @enderror" name="segundonombre" value="{{$item->nombreseg}}" >
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
                                <input id="primerapellido" type="text"  maxlength="25" class="form-control @error('primerapellido') is-invalid @enderror" name="primerapellido" value="{{$item->apellido}}" required>
                                @error('primerapellido')
                                    <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </td>
                            <td>
                                &nbsp;Segundo Apellido&nbsp;<br>
                                <input id="segundoapellido" type="text"  maxlength="25" class="form-control @error('segundoapellido') is-invalid @enderror" name="segundoapellido" value="{{$item->apellidoseg}}" >
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
                                    <option value="{{$item->id_genero}}">Seleccione...</option>
                                    @foreach ($generos as $generos)
                                    @if($generos->id == $item->id_genero) selected @endif>
                                        <option value="{{ $generos->id }}">{{ $generos->cod }}</option>
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
                                <input type="date" name="fechanac" id="fechanac" value="{{$item->edad}}"  maxlength="25" required/>
                            </td>
                                        
                        </tr>
                        <tr>
                             <!-- FILA 4 -->
                        <td>
                                &nbsp;Estado Civil&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select name="estadocivil"  class="form-control" required >
                                    @foreach ($estado_civils as $estado_civil)
                                        <option value="{{ $estado_civil->id }}">{{ $estado_civil->descripcion }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <!-- FILA 5 -->
                        <tr>
                            <td>
                                &nbsp;Lugar de Nacimiento&nbsp;<br>
                                &nbsp;Estado&nbsp;<span style="color:red;">*</span>&nbsp;                           
                                <select name="estado_nac"  class="form-control" required >
                                    @foreach ($estado_civils as $estado_civil)
                                        <option value="{{ $estado_civil->id }}">{{ $estado_civil->descripcion }}</option>
                                    @endforeach
                                </select>
                            
                            </td>
                            <td>
                            &nbsp;&nbsp;<br>
                                &nbsp;Ciudad&nbsp;<span style="color:red;">*</span>&nbsp;                             
                                <input id="ciudad_nac" type="text"  maxlength="10" class="form-control @error('ciudad_nac') is-invalid @enderror" name="ciudad_nac" value="" required>
                                @error('primerapellido')
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
                                <select id="codtele" name="codtele"  class="form-control" required >
                                    @foreach ($cod_habs as $cod_hab)
                                        <option value="{{ $cod_hab->descripcion }}">{{ $cod_hab->descripcion }}</option>
                                    @endforeach
                                </select>
                                
                            </td>
                            <td>
                                &nbsp;Cargo&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="codtele" name="codtele"  class="form-control" required >
                                    @foreach ($cod_habs as $cod_hab)
                                        <option value="{{ $cod_hab->descripcion }}">{{ $cod_hab->descripcion }}</option>
                                    @endforeach
                                </select>
                                
                            </td>
                            
                        </tr>
                        <!-- FILA 6 -->
                        <tr>
                            <td>
                                &nbsp;Unidad de Adscripción&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="codtelecel" name="codtelecel"class="form-control" required >
                                    @foreach ($cod_cels as $cod_cel)
                                        <option value="{{ $cod_cel->descripcion }}">{{ $cod_cel->descripcion }}</option>
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
                        @endforeach

                    @endif
                    </table>
                    
                    <div class="frameContenedor" style="margin:5px;" align="right">
                 @if($datos_funcionario->count()>0)
                        <input class='btn btn-info' type="submit" value="Guardar y Continuar" >
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