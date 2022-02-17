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
                                @include('layouts.items.card-header', ['titulo' => 'Actualizar datos del usuario'])

                                <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}" class="mt-3">
                                    @csrf
                                    @method('PUT')
        
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Usename</label>
                                                <input id="username" type="text" class="form-control rounded-pill border-primary @error('username') is-invalid @enderror" name="username" value="{{ $usuario->username }}" required >
        
                                                @error('username')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nombres y Apellidos</label>
                                                <input id="nombre" type="text" class="form-control rounded-pill border-primary @error('nombre') is-invalid @enderror" name="nombre" value="{{ $usuario->name }}" required >
        
                                                @error('nombre')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email </label>
                                                <input id="email" type="text" class="form-control rounded-pill border-primary @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}" required >
        
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Grupo del usuario</label>
                                                <select 
                                                    id="id_usuariogrupo" 
                                                    name="id_usuariogrupo" 
                                                    class="form-control custom-select border-primary @error('id_usuariogrupo') is-invalid @enderror">
                                                    @foreach ($usuario_grupo as $item)
                                                        <option value="{{ $item->id }}"
                                                            @if( $usuario->id_usuariogrupo == $item->id) selected @endif>
                                                            {{ $item->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
        
                                                @error('id_usuariogrupo')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{URL::route('gestor.usuario')}}" class="btn btn-secondary m-3">Volver</a>
                                    
                                        <button type="submit" class="btn btn-primary m-3">Guardar</button>
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