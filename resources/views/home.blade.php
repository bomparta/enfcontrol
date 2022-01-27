@extends('layouts.app')

@section('content')
<div class="container">
     <div class="col-12 text-center">
        <h1>Bienvenido, {{Auth::user()->name}}</h1>
    </div>
    <div class="card-columns">
        <a href="{{route('listadoestudiante')}}" style="color: black;">
            <div class="card text-center">
                <img src="{{url('/img/estudiante.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Estudiante</h1>
                </div>
            </div>
        </a>

        <a style="color: black;" href="{{route('actividad')}}">
            <div class="card text-center">
                <img src="{{url('/img/control_estudio.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Secretaria</h1>
                </div>
            </div>
        </a>
        <a style="color: black;" href="{{route('home')}}">
            <div class="card text-center">
                <img src="{{url('/img/postgrado.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Postgrados</h1>
                </div>
            </div>
        </a>
        <a style="color: black;" href="{{route('home')}}">
            <div class="card text-center">
                <img src="{{url('/img/curso_cpp.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Cursos CPP</h1>
                </div>
            </div>
        </a>
        <a style="color: black;" href="{{route('home')}}">
            <div class="card text-center">
                <img src="{{url('/img/cursos.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Cursos</h1>
                </div>
            </div>
        </a>
        <a style="color: black;" href="{{route('home')}}">
            <div class="card text-center">
                <img src="{{url('/img/maestrias.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Maestrias</h1>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
