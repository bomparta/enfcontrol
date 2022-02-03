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
                                @include('layouts.items.card-header', ['titulo' => 'Nueva Actividad'])

                                <form method="POST" action="/parametros/actividad">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input id="codigo_original" type="hidden" class="form-control rounded-pill border-primary" name="codigo_original" value="{{ $cod_actividad }}" >
                                            <input id="fecha" type="hidden" class="form-control rounded-pill border-primary" name="fecha" value="{{ $fecha }}" >
                                            <div class="form-group">
                                                <label for="codigo">Codigo  </label>
                                                <input disabled='false' id="codigo" type="text" class="form-control rounded-pill border-primary @error('codigo') is-invalid @enderror" name="codigo" value="{{ $cod_actividad }}-{{ $fecha}}" required>
                                                @error('codigo')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="tipo_estudio">Tipo de Estudio  </label>
                                                <select class="form-control"  type="text" name="tipo_estudio" >
                                                    <option value="">Seleccione...</option>
                                                    @foreach ($tipo_estudios as $tipo_estudio)
                                                        <option value="{{ $tipo_estudio->id }}">{{ $tipo_estudio->descripcion }}</option>
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
                                                <input id="nombre" type="text" class="form-control rounded-pill border-primary @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required>
                                                @error('nombre')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="clasificacion">Clasificacion  </label>
                                                <select class="form-control"  type="text" name="clasificacion" >
                                                    <option value="">Selecciones...</option>
                                                    @foreach ($clasificacions as $clasificacion)
                                                        <option value="{{ $clasificacion->id }}">{{ $clasificacion->descripcion }}</option>
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
                                                    <option value="">Seleccione...</option>
                                                    @foreach ($tematicas as $tematica)
                                                        <option value="{{ $tematica->id }}">{{ $tematica->descripcion }}</option>
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
                                                    <option value="">Seleccione...</option>
                                                    @foreach ($alcances as $alcance)
                                                        <option value="{{ $alcance->id }}">{{ $alcance->descripcion }}</option>
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
                                        <input type="submit" value=" Crear " class="btn btn-primary" />
                                        <a class='btn btn-default' type="button"  href="{{URL::route('listadoactividad')}}">Cerrar</a>
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

@section('scripts')
<script type="text/javascript">
	function cerrar(){
		window.close()
	}
</script>
@endsection