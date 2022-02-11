@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="d-flex" id="wrapper">
        @include('layouts.appcontrol')

        <div id="page-content-wrapper">

            <div class="container ">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @include('layouts.items.card-header', ['titulo' => 'Nuevo Valor de Unidad de Credito'])

                                <form method="POST" action="/parametros/actividad">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                             
                                            <div class="form-group">
                                                <label for="fecha_inicio">Fecha Inicio</label>
                                                <input  id="fecha_inicio" type="text" class="form-control rounded-pill border-primary @error('fecha_inicio') is-invalid @enderror" name="fecha_inicio" value="{{ old('fecha_inicio') }}" >
                                                @error('fecha_inicio')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="fecha_fin">Fecha Fin</label>
                                                <input  id="fecha_fin" type="text" class="form-control rounded-pill border-primary @error('fecha_fin') is-invalid @enderror" name="fecha_fin" value="{{ old('fecha_fin') }}" >
                                                @error('fecha_fin')
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