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
                                @include('layouts.items.card-header', ['titulo' => 'Crear nuevo programa de postgrado'])

                                <form method="POST" action="/parametros/actividad">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                             
                                            <div class="form-group">
                                                <label for="codigo">Nombre</label>
                                                <input  id="nombre" type="text" class="form-control rounded-pill border-primary @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" >
                                                @error('nombre')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="siglas">Siglas</label>
                                                <input  id="siglas" type="text" class="form-control rounded-pill border-primary @error('siglas') is-invalid @enderror" name="siglas" value="{{ old('siglas') }}" >
                                                @error('siglas')
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