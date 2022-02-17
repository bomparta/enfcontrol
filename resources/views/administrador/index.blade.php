@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="d-flex" id="wrapper">
        @include('layouts.appcontrol')

        <div id="page-content-wrapper">
            

            <div class="container pb-4">
                <div class="row align-items-stretch">

                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    @include('layouts.items.card-header', ['titulo' => 'Usuarios por grupo'])

                                    <p>Seleccione el grupo de usuarios que desea consultar</p>

                                <div class="row">
                                    @foreach ($usuario_grupos as $grupo)
                                        <div class="col-md-4 grupo my-3">
                                            <a href="{{ route('usuarios.show', $grupo->id) }}">
                                                <i class="ri-group-line icon-lg icon-up"></i>
                                                <br>
                                                {{ $grupo->nombre }}
                                                <br>
                                                <b>Usuarios:  {{ number_format($grupo->count_usuarios,'0',',','.') }}</b>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>

                                </div>
                            </div> <!-- /.card -->
                        </div>
                
                </div>
            </div>
        </div> <!-- page-content-wrapper -->
    </div> <!-- wrapper -->
@endsection