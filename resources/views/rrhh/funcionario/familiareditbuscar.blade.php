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
                                       <b> DATOS GRUPO FAMILIAR</b>
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <b>Suministre los datos de su grupo familiar, haga clic en "Guardar" par registrar su información <b>
                                    <hr>   
                                </div>
                            </td>
                        </tr>
                        <tr>
                        <td colspan="4" >
                            <nav class="navbar bg-light">
                            <div class="container-fluid">
                            <form id="formulario1" class="d-flex" method="get" action=""  >
                            @csrf
                            &nbsp;Buscar N° Cédula a Ingresar como Familiar:&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                            <select id="nacionalidad" name="nacionalidad" style="width:50px;" required>
                                    @foreach ($nacionalidades as $nacionalidad)
                                        <option value="{{ $nacionalidad->id  }}">{{ $nacionalidad->cod }}</option>
                                    @endforeach
                                </select>
                            <input class="form-control me-2" type="search" name="cedula"placeholder="Sólo números Ej. 123456789" aria-label="Search" require>
                            <button class="btn btn-outline-info" type="submit">Buscar</button>
                           
                           </form>
                            </div>
                            </nav>
                            </td>
                        </tr>
                        </table>
                        <hr>
                        @if (isset($datos_persona))
                        @foreach($datos_persona as $key=>$item)   
                        <table>
                       
                        <form id="formulario" name="formulario" method="POST" action="{{route('funcionariostore')}}">
                        @csrf
                        <input id="id_persona" type="hidden" name="id_persona" value="{{$item->persona_id}}" >
                        <input id="id_funcionario" type="hidden" name="id_funcionario" value="{{$item->id_funcionario}}" >
                        <tr><td><strong>Cédula de Identidad: @if ($item->id_nacionalidad==1) V @else E @endif - {{$item->numero_identificacion}}</strong></td></tr>
                        <tr>
                            <td>
                                &nbsp;Primer Nombre&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <input id="primernombre" type="text"  maxlength="25" class="form-control @error('primernombre') is-invalid @enderror" name="primernombre" value="{{$item->nombre}}" required>
                                @error('primernombre')
                                    <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </td>
                            <td>
                                &nbsp;Segundo Nombre&nbsp;<br>
                                <input id="segundonombre" type="text"  maxlength="25" class="form-control @error('segundonombre') is-invalid @enderror" name="segundonombre" value="{{$item->nombresegundo}}" >
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
                                <input id="primerapellido" type="text"  maxlength="25" class="form-control @error('primerapellido') is-invalid @enderror" name="primerapellido" value="{{$item->apellido}}" required>
                                @error('primerapellido')
                                    <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </td>
                            <td>
                                &nbsp;Segundo Apellido&nbsp;<br>
                                <input id="segundoapellido" type="text"  maxlength="25" class="form-control @error('segundoapellido') is-invalid @enderror" name="segundoapellido" value="{{$item->apellidosegundo}}" >
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
                                &nbsp;Fecha Nacimiento&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;">*</span><br>
                                <input type="date" name="fechanac" id="fechanac"  value="{{$item->edad}}" maxlength="25" required/>
                            </td>
                                        
                        </tr>
                        <tr>
                             <!-- FILA 4 -->
                        <td>
                                &nbsp;Parentezco&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select name="parentezco"  class="form-control" required >
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
                                <input id="ocupacion" type="text"name="ocuapacion"  class="form-control" required >
                                   
                                
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
                    </table>
                    @endforeach
                  
                    @endif
                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Registrar Familiar" >
                    </div>
                    
                    <div class="table-responsive mt-3">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Cedula</th>
                                                    <th>Nombre y Apellidos</th>
                                                    <th>Correo</th>
                                                    <th>Telefono</th>
                                                    <th>Sexo</th>
                                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                                        <th>Opcion</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($familiar<>NULL)
                                                    @foreach ($familiar as $familiar)
                                                    <tr>
                                                    
                                                        <td>{{ $familiar->cedula }}</td>
                                                        <td>{{ $familiar->nombre_primer }} {{ $familiar->nombre_segundo }} {{ $familiar->apellido_primer }} {{ $datosestudiante->apellido_segundo }}</td>
                                                        <td>{{ $familiar->correo}}</td>
                                                        <td>{{ $familiar->id_codigo_hab}}-{{ $familiar->tel_habitacion}}</td>
                                                        <td>{{ $familiar->id_sexo }}</td>
                                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                                            <td class="text-center">
                                                            <a href= "/familiar/{{$familiar->id}}" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
                                                            </a>
                                                            </td>
                                                        @endif
                                                            
                                                    </tr>
                                                    @endforeach
                                                @endif
                                                
                                            </tbody>
                                        </table>
                                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection