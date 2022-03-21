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
                              
                                <div class="card-header">
                                 @include('layouts.items.card-header', ['titulo' => 'Nueva Actuación'])
                                 @foreach ($actividad as $itema)
                                     <h5 class="card-title">Actividad Académica | {{ $itema->codigo }}-{{ $itema->anio }} {{ $itema->nombre }}</h5>                                    
                                @endforeach
                                </div>
                                    <!-- /.card-header -->
                                <form method="POST" action="/parametros/actuacion">
                                    @csrf
                                    <input type="hidden" name="id_actividad" value="{{$itema->id}}" />
                                    <input type="hidden" name="cod_actividad" value="{{$itema->codigo}}" />
                                    <input type="hidden" name="anio" value="{{$itema->anio}}" />
                                    <input type="hidden" name="cod_actuacion" value="{{$codigo}}" />
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                
                                                <label for="nombre"><b>Código Actuación</b> </label>
                                                
                                                <input disabled='true' id="cod_actuacion" type="text" class="form-control rounded-pill border-primary @error('cod_actuacion') is-invalid @enderror" name="cod_actuacion" value="{{$cod_actuacion}}" required>
                                                @error('cod_actuacion')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m_row">
                <div class="m_col-md-12">
                    
                    <div class="m_card">
                        
                        <div class="m_card-header m_text-center m_alert-primary">
                        <h3 class="m_card-title">Valores financieros</h3>
                        </div>
                           
                    </div>
                </div>
                <div class="row">
                    <div class="form-group-sm col-lg-3 col-md-3 col-sm-6 col-xs-12">

                        <label for="ind_financiero">Indicador Financiero</label>
                        <select name="ind_financiero" id="ind_financiero" class="form-control input-sm" required>
                            <option selected disabled>Seleccione...</option>
                            @foreach ($ind_financiero as $ind_financiero)
                                <option value="{{ $ind_financiero->id }}">
                                 
                                    {{ $ind_financiero->descripcion }}
                                </option>>
                            @endforeach
                        </select>
                        @error('ind_financiero')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>                       
                    <div class="form-group-sm col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <label for="tipo_ind_financiero" class="control-label">Tipo Indicador Financiero</label>
                        <select name="tipo_ind_financiero" id="tipo_ind_financiero" class="form-control input-sm" required>
                        <option selected disabled>Seleccione...</option>
                            @foreach ($tip_ind_financiero as $tip_ind_financiero)
                                <option value="{{ $tip_ind_financiero->id }}">
                                 
                                    {{ $tip_ind_financiero->descripcion }}
                                </option>>
                            @endforeach
                        </select>
                        @error('tipo_ind_financiero')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group-sm col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <label for="refrigerios" class="control-label">Refrigerios</label>
                        <select name="refrigerios" id="refrigerios" class="form-control input-sm">
                        <option selected disabled>Seleccione...</option>
                        @foreach ($refrigerio as $refrigerio)
                                <option value="{{ $refrigerio->id }}">
                               
                                    {{ $refrigerio->descripcion }}
                                </option>>
                            @endforeach
                        </select>
                        @error('refrigerios')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror                    
                    </div>
                    <div class="form-group-sm col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <label for="viaticos" class="control-label">Viáticos</label>
                        <select name="viaticos" id="viaticos" class="form-control">
                        <option selected disabled>Seleccione...</option>
                        @foreach ($viatico as $viatico)
                                <option value="{{ $viatico->id }}">
                                
                                    {{ $viatico->descripcion }}
                                </option>>
                            @endforeach
                        </select>
                        @error('viaticos')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror       
                    </div>
                </div>
            </div>
            <div class="m_col-md-12">
                    
                    <div class="m_card">
                        
                        <div class="m_card-header m_text-center m_alert-primary">
                        <h3 class="m_card-title">Valores de Ejecución</h3>
                        </div>
                           
                    </div>
                </div>
                <div class="row">
                    <div class="form-group-sm col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <label for="fecha_inicio" class="control-label">Fecha de Inicio</label>
                        <input data-role="date" type="date"  name="fecha_inicio" id="dtpicker1" class="form-control "
                            value="" />
                    </div>
                    <div class="form-group-sm col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <label for="fecha_fin" class="control-label">Fecha de Cierre</label>
                        <input data-role="date" type="date"  name="fecha_fin" id="dtpicker2" class="form-control " 
                            value="" />
                    </div>
                    <div class="form-group-sm col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <label for="dias_duracion" class="control-label">Días de Duración</label>
                        <input name="duracion" type="number" id="duracion" size="5" min="0" class="form-control required"
                            value="" />
                    </div>
                    <div class="form-group-sm col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <label for="horas_academicas" class="control-label">Horas Académicas</label>
                        <input name="horas" type="number" id="horas" size="5" min="0" class="form-control required"
                            value="" />
                    </div>
                    <div class="form-group-sm col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <label for="entidad" class="control-label">Entidad Federal</label>
                        <select name="entidad" id="entidad" class="form-control" required>
                              <option selected disabled>Seleccione...</option>
                        @foreach ($entidad as $entidad)
                                <option value="{{ $viatico->id }}">
                                 
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
                    
                    <div class="form-group-sm col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <label for="status_actividad" class="control-label">Estatus de la Actividad</label>
                        <select name="status_actividad" id="status_actividad" class="form-control" required>
                        <option selected disabled>Seleccione...</option>
                        @foreach ($estatus as $estatus)
                                <option value="{{ $estatus->id }}">
                                 
                                    {{ $estatus->descripcion }}
                                </option>>
                            @endforeach
                        </select>
                        @error('status_actividad')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror       
                    

                    </div>
                    <div class="form-group-sm col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <label for="lugar" class="control-label">Lugar de Realización</label>
                        <textarea name="lugar" id="lugar" rows="2" maxlength="255" class="form-control">  </textarea>
                        
                    </div>
                    <div class="form-group-sm col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <label for="observacion" class="control-label">Observaciones</label>
                        <textarea name="observacion" id="observacion" cols="25" rows="2" maxlength="1000" class="form-control">Sin Observaciones</textarea>
                    </div>
                    <div class="form-group-sm col-lg-2 col-md-2 col-sm-4 col-xs-12">
                        <label for="fecha_reporte" class="control-label">Fecha de Reporte</label>
                        <input data-role="date" type="date" name="fecha_reporte" id="dtpicker3" class="form-control"
                            value=" " />
                         <input type="checkbox" name="aprobatorio" id="aprobatorio" value="0">&nbsp;&nbsp;Aprobatorio
                    </div>
                </div> 
           
            <div class="m_col-md-12">
                    
                    <div class="m_card">
                        
                        <div class="m_card-header m_text-center m_alert-primary">
                        <h3 class="m_card-title">Asignación | Seguimiento</h3>
                        </div>
                           
                    </div>
                </div>
                <div class="row">
                    <div class="form-group-sm col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <label for="id_planificador" class="control-label">Planificador</label>
                        <select name="id_planificador" id="id_planificador" required class="form-control">
                        <option selected disabled>Seleccione...</option>
                        @foreach ($planificador as $planificador)
                                <option value="{{ $planificador->id }}">
                                 
                                    {{ $planificador->nombre }} {{ $planificador->apellido }}
                                </option>>
                            @endforeach
                        </select>
                        @error('id_planificador')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror   
                    </div>
                    
                    <div class="form-group-sm col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <label for="fecha_limite" class="control-label">Fecha Límite</label>
                        <input data-role="date" type="date" name="fecha_limite" id="dtpicker4" class="form-control"
                            value="" />
                    </div>
                    <div class="form-group-sm col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <label for="hoja_ruta" class="control-label">Hoja de Ruta</label>
                        <input type="number" id="hoja_ruta" name="hoja_ruta" size="18" min="0"  class="form-control"
                            value="" />
                    </div>
                    <div class="form-group-sm col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <label for="num_participantes" class="control-label">Número de Participantes</label>
                        <input type="number" id="num_participantes" name="num_participantes" size="18" min="0"  class="form-control"
                            value="" />
                    </div>
                </div>
            </div>
            <hr>
                                    <div align="center">
                                      
                                        <input type="submit" value=" Guardar " class="btn btn-primary" />
                                      
                                        <input name="" type="button" value=" Cerrar " onclick="cerrar()" class="btn btn-default" />
                                    </div>

                                   <p>
                                </form>
                            </div>
                        </div> <!-- card -->
                    </div>
                </div>
            </div>
        </div> <!-- page-content-wrapper -->
    </div> <!-- wrapper -->
@endsection