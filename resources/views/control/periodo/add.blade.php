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
                                @include('layouts.items.card-header', ['titulo' => 'Periodo Academico'])

                                <form method="POST" action="{{ route('periodo.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                             
                                            <div class="form-group">
                                                <label for="nombre">Nombre</label>
                                                <input  id="nombre" type="text" class="form-control rounded-pill border-primary @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" >
                                                @error('nombre')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="estatus">Status  :</label>
                                                <input type="radio" name="estatus" value="1" checked> Activo
                                                <input type="radio" name="estatus" value="0"> Inactivo
                                            </div>
                                            <div class="form-group">
                                                <label for="condicion">Condicion  :</label>
                                                <input type="radio" name="condicion" value="1" checked> Abierto
                                                <input type="radio" name="condicion" value="0"> Cerrado
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