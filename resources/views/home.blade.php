@extends('layouts.app')

@section('content')
<div class="container">
     <div class="col-12 text-center">
        <h1>Bienvenido, {{Auth::user()->name}}</h1>
    </div>
    <div class="card-columns">
        @if(in_array( Auth::user()->id_usuariogrupo, array(1) ))
        <a href="{{route('listadoestudiante')}}" style="color: black;">
            <div class="card text-center">
                <img src="{{url('/img/estudiante.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Estudiante</h1>
                </div>
            </div>
        </a>
        @endif
        @if(in_array( Auth::user()->id_usuariogrupo, array(6) ))
        <a style="color: black;" href="{{route('admincontrol')}}">
            <div class="card text-center">
                <img src="{{url('/img/control_estudio.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Secretaria</h1>
                </div>
            </div>
        </a>
        @endif
        @if(in_array( Auth::user()->id_usuariogrupo, array(1) ))
        <a style="color: black;" href="#">
            <div class="card text-center">
                <img src="{{url('/img/postgrado.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Postgrados</h1>
                </div>
            </div>
        </a>
        @endif
        @if(in_array( Auth::user()->id_usuariogrupo, array(1) ))
        <a style="color: black;" href="#">
            <div class="card text-center">
                <img src="{{url('/img/curso_cpp.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Cursos CPP</h1>
                </div>
            </div>
        </a>
        @endif
        @if(in_array( Auth::user()->id_usuariogrupo, array(1) ))
        <a style="color: black;" href="#">
            <div class="card text-center">
                <img src="{{url('/img/cursos.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Cursos</h1>
                </div>
            </div>
        </a>
        @endif
        @if(in_array( Auth::user()->id_usuariogrupo, array(1) ))
        <a style="color: black;" href="#">
            <div class="card text-center">
                <img src="{{url('/img/maestrias.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Maestrias</h1>
                </div>
            </div>
        </a>
        @endif
        @if(in_array( Auth::user()->id_usuariogrupo, array(4) ))
        <a style="color: black;" href="{{route('home')}}">
            <div class="card text-center">
                <img src="{{url('/img/administracion.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Administracion</h1>
                </div>
            </div>
        </a>
        @endif
        @if(in_array( Auth::user()->id_usuariogrupo, array(9) ))
        <a style="color: black;" href="{{route('usuario')}}">
            <div class="card text-center">
                <img src="{{url('/img/super.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Informatica</h1>
                </div>
            </div>
        </a>
        @endif
        @if(in_array( Auth::user()->id_usuariogrupo, array(3, 6) ))
        <a style="color: black;" href="{{route('actividad')}}">
            <div class="card text-center">
                <img src="{{url('/img/eventos.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Eventos</h1>
                </div>
            </div>
        </a>
        @endif
        <!--
        <div class="title m-b-md">
            {!!QrCode::size(100)->generate("www.nigmacode.com") !!}
            
         </div>
        -->
         
    </div>
</div>
@endsection
