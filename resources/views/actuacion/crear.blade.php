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
                                @include('layouts.items.card-header', ['titulo' => 'Nueva Actuación'])

                                <form method="POST" action="#">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nombre">Codigo  </label>
                                                <input disabled='true' id="nombre" type="text" class="form-control rounded-pill border-primary @error('nombre') is-invalid @enderror" name="nombre" value="{{ $cod_actividad }}-{{ $fecha}}" required>
                                                @error('nombre')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre">Tipo de Estudio  </label>
                                                <select class="form-control"  type="text" name="cuentas" >
                                                    <option value="">Seleccione...</option>
                                                    @foreach ($tipo_estudios as $datas3)
                                                        <option value="{{ $datas3->id }}">{{ $datas3->descripcion }}</option>
                                                    @endforeach
                                                </select>
                                                @error('nombre')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre">Nombre de la Actividad  </label>
                                                <input id="nombre" type="text" class="form-control rounded-pill border-primary @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required>
                                                @error('nombre')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre">Clasificacion  </label>
                                                <select class="form-control"  type="text" name="cuentas" >
                                                    <option value="">Selecciones...</option>
                                                    @foreach ($clasificacions as $datas)
                                                        <option value="{{ $datas->id }}">{{ $datas->descripcion }}</option>
                                                    @endforeach
                                                </select>
                                                @error('nombre')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre">Tematica  </label>
                                                <select class="form-control"  type="text" name="cuentas" >
                                                    <option value="">Seleccione...</option>
                                                    @foreach ($tematicas as $datas1)
                                                        <option value="{{ $datas1->id }}">{{ $datas1->descripcion }}</option>
                                                    @endforeach
                                                </select>
                                                @error('nombre')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre">Alcance  </label>
                                                <select class="form-control"  type="text" name="cuentas" >
                                                    <option value="">Seleccione...</option>
                                                    @foreach ($alcances as $datas2)
                                                        <option value="{{ $datas2->id }}">{{ $datas2->descripcion }}</option>
                                                    @endforeach
                                                </select>
                                                @error('nombre')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>

                                            
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="observacion">Observación</label>
                                                <textarea id="observacion" class="form-control border-primary @error('observacion') is-invalid @enderror" name="observacion" value="{{ old('observacion') }}"></textarea>
                                                    @error('observacion')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div align="center">
                                        <input type="submit" value=" Crear " class="btn btn-primary" />
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