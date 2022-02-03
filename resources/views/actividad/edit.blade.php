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
                                @include('layouts.items.card-header', ['titulo' => 'Edit Actividad'])

                                <form method="POST" action="/actividad/update/{{$actividad->codigo }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input id="codigo_original" type="hidden" class="form-control rounded-pill border-primary" name="codigo_original" value="{{ $actividad->codigo }}" >
                                            <input id="fecha" type="hidden" class="form-control rounded-pill border-primary" name="fecha" value="{{ $actividad->anio }}" >
                                            <div class="form-group">
                                                <label for="codigo">Codigo  </label>
                                                <input disabled='false' id="codigo" type="text" class="form-control rounded-pill border-primary @error('codigo') is-invalid @enderror" name="codigo" value="{{ $actividad->codigo }}-{{ $actividad->anio}}" required>
                                                @error('codigo')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="tipo_estudio">Tipo de Estudio  </label>
                                                <select class="form-control"  type="text" name="tipo_estudio" >
                                                    <option selected disabled>Seleccione...</option>
                                                    @foreach ($tipo_estudios as $tipo_estudio)
                                                        <option value="{{ $tipo_estudio->id }}"
                                                            @if($tipo_estudio->id == $actividad->id_tipo_actividad) selected @endif>
                                                            {{ $tipo_estudio->descripcion }}
                                                        </option>>
                                                    @endforeach
                                                </select>
                                                @error('tipo_estudio')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre">Nombre de la Actividad  </label>
                                                <input id="nombre" type="text" class="form-control rounded-pill border-primary @error('nombre') is-invalid @enderror" name="nombre" value="{{ $actividad->nombre }}" required>
                                                @error('nombre')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="clasificacion">Clasificacion  </label>
                                                <select class="form-control"  type="text" name="clasificacion" >
                                                    <option selected disabled>Seleccione...</option>
                                                    @foreach ($clasificacions as $clasificacion)
                                                        <option value="{{ $clasificacion->id }}"
                                                            @if($clasificacion->id == $actividad->id_clasificacion) selected @endif>
                                                            {{ $clasificacion->descripcion }}
                                                        </option>>
                                                    @endforeach
                                                </select>
                                                @error('clasificacion')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="tematica">Tematica  </label>
                                                <select class="form-control"  type="text" name="tematica" >
                                                    <option selected disabled>Seleccione...</option>
                                                    @foreach ($tematicas as $tematica)
                                                        <option value="{{ $tematica->id }}"
                                                            @if($tematica->id == $actividad->id_tematica) selected @endif>
                                                            {{ $tematica->descripcion }}
                                                        </option>>
                                                    @endforeach
                                                </select>
                                                @error('tematica')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="alcance">Alcance  </label>
                                                <select class="form-control"  type="text" name="alcance" >

                                                    <option selected disabled>Seleccione...</option>
                                                    @foreach ($alcances as $alcance)
                                                        <option value="{{ $alcance->id }}"
                                                            @if($alcance->id == $actividad->id_alcance) selected @endif>
                                                            {{ $alcance->descripcion }}
                                                        </option>>
                                                    @endforeach
                                                </select>
                                                @error('alcance')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>

                                            
                                        </div>
                                    </div>
                                    <div align="center">
                                        <input type="submit" value=" Actualizar " class="btn btn-primary" />
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