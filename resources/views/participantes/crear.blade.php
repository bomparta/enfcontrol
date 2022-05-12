@extends('layouts.app')
@section('styles')

@endsection

@section('content')

    <div class="d-flex" id="wrapper">
        @include('layouts.appevento')

        <div id="page-content-wrapper">

            <div class="container pb-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @include('layouts.items.card-header', ['titulo' => 'Agregar Participante a la Actaución ??'])

                                <form method="POST" action="/participantes/storage/{{$id}}">
                                <input type="hidden" name="id_actuacion" value="{{$id}}" />
                                    <input type="hidden" name="id_persona" value="3" />
                                    <input type="hidden" name="id_usuario_creador" value="" />
                                    @csrf
                                    <div class="row">
                                 
                                        <div class="form-group-sm col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <label for="tipo_identificacion" class="control-label">Documento</label>
                                            <select name="tipo_identificacion" id="tipo_identificacion" class="form-control">
                                            @foreach ($tipo_identificacion as $tipo_identificacion)
                                                        <option value="{{ $tipo_identificacion->id }}">
                                                          
                                                            {{ $tipo_identificacion->descripcion }}
                                                        </option>>
                                                    @endforeach
                                                    </select>
                                                    @error('tipo_identificacion')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                        </div>
                                        <div class="form-group-sm col-lg-4 col-md-4 col-sm-8 col-xs-12" >
                                            <label for="numero_identificacion" class="control-label">N° Identificación</label>
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-btn">
                                                <select class="form-control"  type="text" name="nacionalidad" >
                                            
                                                    @foreach ($nacionalidad as $nacionalidad)
                                                        <option value="{{ $nacionalidad->id }}">
                                                          
                                                            {{ $nacionalidad->cod }}
                                                        </option>>
                                                    @endforeach
                                                    </select>
                                                    @error('nacionalidad')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror                          
                                                </span>        
                                                <input type="text" name="numero_identificacion" id="numero_identificacion" class="form-control" value="" required>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-secudary" type="button" id="get_persona" value="Buscar" >
                                                    <img src="/img/icon/zoom.ico" class="icon-lg" >
                                                    </button>
                                                </span>
                                            </div> 
                                    </div>   
                                    

                                    <div class="row">
                                    
                                        <div class="form-group-sm col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <label for="nombres" class="control-label">Primer Nombre</label>
                                            <input type="text" name="nombres" id="nombres" class="form-control"  value=""required>   
                                        </div>
                                        <div class="form-group-sm col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <label for="nombres" class="control-label">Segundo Nombre</label>
                                            <input type="text" name="nombreseg" id="nombreseg" class="form-control"  value="">   
                                        </div>
                                        <div class="form-group-sm col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <label for="apellidos" class="control-label">Primer Apellido</label>
                                            <input type="text" name="apellidos" id="apellidos" class="form-control"  value="" required>   
                                        </div>
                                        <div class="form-group-sm col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <label for="apellidos" class="control-label">Segundo Apellido</label>
                                            <input type="text" name="apellidoseg" id="apellidoseg" class="form-control"  value="" >   
                                        </div>
                                        <div class="form-group-sm col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <label for="genero" class="control-label">Género</label>
                                            <select name="genero" id="genero" class="form-control" required>
                                            <option selected disabled>Seleccione...</option>
                                            @foreach ($sexo as $sexo)
                                                            <option value="{{ $sexo->id }}">                                                             
                                                                {{ $sexo->genero }}
                                                            </option>>
                                                        @endforeach
                                                        </select>
                                                        @error('sexo')
                                                        <div class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        @enderror
                                        </div>
                                        <div class="form-group-sm col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <label for="organismo" class="control-label">Organismo</label>
                                            <select name="organismo" id="organismo" class="form-control" required>
                                            <option selected disabled>Seleccione...</option>
                                            @foreach ($organismo as $organismo)
                                                            <option value="{{ $organismo->id }}">
                                                            
                                                                {{ $organismo->organismo }}
                                                            </option>>
                                                        @endforeach
                                                        </select>
                                                        @error('organismo')
                                                        <div class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        @enderror
                                        </div>  
                                            <div class="form-group-sm col-lg-2 col-md-2 col-sm-4 col-xs-12">
                                            <label for="funcionario" class="control-label">Tipo de Funcionario</label>
                                            <select  name="funcionario" id="funcionario" class="form-control" required>
                                            <option selected disabled>Seleccione...</option>
                                            @foreach ($tipo_funcionario as $tipo_funcionario)
                                                            <option value="{{ $tipo_funcionario->id }}">
                                                              
                                                                {{ $tipo_funcionario->tipo_funcionario }}
                                                            </option>>
                                                        @endforeach
                                                        </select>
                                                        @error('tipo_funcionario')
                                                        <div class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                        @enderror
                                        </div> 
                                    </div>
                                    <div class="row">
                                    
                                            <div class="form-group-sm col-lg-5 col-md-5 col-sm-10 col-xs-12">
                                                <label for="cargo" class="control-label">Cargo</label>
                                                <input type="text" name="cargo" id="cargo" class="form-control" value=""  /> 
                                            </div> 
                                            <div class="form-group-sm col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                <label for="pais" class="control-label">País</label>
                                                <select name="pais" id="pais" class="form-control"  required>
                                                <option value="1"selected> Venezuela</option>
                                                @foreach ($pais as $pais)
                                                        <option value="{{ $pais->id }}">
                                                        
                                                            {{ $pais->nombre_pais }}
                                                        </option>>
                                                    @endforeach
                                                    </select>
                                                    @error('pais')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                                
                                            </div> 
                                            <div class="form-group-sm col-lg-4 col-md-4 col-sm-8 col-xs-12">
                                                <label for="entidad" class="control-label">Entidad Federal</label>
                                                <select name="entidad" id="entidad" class="form-control">
                                                <option selected disabled>Seleccione...</option>
                                                @foreach ($entidad as $entidad)
                                                        <option value="{{ $entidad->id }}">
                                                          
                                                            {{ $entidad->descripcion }}
                                                        </option>>
                                                    @endforeach
                                                    </select>
                                                    @error('entidad')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                    @enderror
                                                
                                            </div>     
                                    
                                        <div class="row">
                                            <div class="form-group-sm col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <label for="correo" class="control-label">Correo Electrónico</label>
                                                <input type="text" name="correo" id="correo" class="form-control" value="" />
                                            </div> 
                                            <div class="form-group-sm col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                <label for="hab" class="control-label">Telf. Habitación</label>
                                                <input type="text" name="hab" id="hab" class="form-control"  value="" />
                                            </div> 
                                            <div class="form-group-sm col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                <label for="cel" class="control-label">Telf. Celular</label>
                                                <input type="text" name="cel" id="cel" class="form-control" value="" />
                                            </div> 
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-sx-12" style="margin-top:10px">
                                            
                                            <div class="col-lg-5 col-md-5 col-sm-4 col-sx-12">
                                                <div id="nota" >
                                                    <div id="txt_registrado" style="display:none;">
                                                        <b>El participante ya esta registrado en esta actuación.</b>
                                                    </div>
                                                    <div id="txt_nuevo" style="display:none;">
                                                        <b>Nuevo participante.</b>
                                                    </div>
                                                </div>                       
                                            </div>
                                        </div>
                                         
                                                            <div align="center">
                                                                <input type="submit" value=" Agregar " class="btn btn-primary" />
                                                                <input name="" type="button" value=" Cerrar " onclick="cerrar()" class="btn btn-default" />
                                                            </div>

                                                        
                                   </form>
                            </div>
                        </div> <!-- card -->
                    </div>
                </div>
            </div>
        </div> <!-- page-content-wrapper -->
    </div> <!-- wrapper -->
@endsection