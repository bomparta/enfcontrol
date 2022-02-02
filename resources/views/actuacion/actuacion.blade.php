@extends('layouts.appsecretaria')

@section('content')
<div class="container">
     <div class="col-12 text-center">
        <h1>Bienvenido, {{Auth::user()->name}}</h1>
    </div>
    <div class="card-columns">
        <a href="{{route('listadoactividad')}}" style="color: black;" href="index">
            <div class="card text-center">
                <img src="{{url('/img/estudiante.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Actividad</h1>
                </div>
            </div>
        </a>

        <a style="color: black;" target="_blank" href="https://parzibyte.me/blog/contrataciones-ayuda/">
            <div class="card text-center">
                <img src="{{url('/img/control_estudio.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Actuacion</h1>
                </div>
            </div>
        </a>

        <a style="color: black;" href="{{route('reporte')}}">
            <div class="card text-center">
                <img src="{{url('/img/postgrado.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Reportes Eventos</h1>
                </div>
            </div>
        </a>
        
    </div>
</div>
@endsection
