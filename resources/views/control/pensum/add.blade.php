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
                                @include('layouts.items.card-header', ['titulo' => 'Unidad Curricular de Programa tal'])

                                <form method="POST" action="/parametros/actividad">
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
                                                <label for="sigla">Sigla</label>
                                                <input  id="sigla" type="text" class="form-control rounded-pill border-primary @error('sigla') is-invalid @enderror" name="sigla" value="{{ old('sigla') }}" >
                                                @error('sigla')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="trimestre">Trimestre  </label>
                                                <select class="form-control"  type="text" name="trimestre" >
                                                    <option value="">Seleccione...</option>
                                                    
                                                        <option value=""></option>
                                                    
                                                </select>
                                                @error('trimestre')
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