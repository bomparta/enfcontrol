
@extends('layouts.appsecretaria')

@section('content')
<div class="container">
     <div class="col-12 text-center">
        <h1>Bienvenido, {{Auth::user()->name}}</h1>
    </div>
    <div class="card-columns">
        @if (Auth::user()->id_usuariogrupo == 4)
        <a href="{{route('listaconciliacion')}}" style="color: black;" href="index">
            <div class="card text-center">
                <img src="{{url('/img/administracion.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Administracion</h1>
                </div>
            </div>
        </a>
        @endif
        @if (Auth::user()->id_usuariogrupo == 2)
        <a style="color: black;" target="_blank" href="{{route('listamateriadoc')}}">
            <div class="card text-center">
                <img src="{{url('/img/profesor.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Profesor</h1>
                </div>
            </div>
        </a>
        @endif
        @if (Auth::user()->id_usuariogrupo == 6)
        <a style="color: black;" href="{{route('planificacion')}}">
            <div class="card text-center">
                <img src="{{url('/img/planificador.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Revisión Académica</h1>
                </div>
            </div>
        </a>
       
        <a style="color: black;" href="{{route('planificacion')}}">
            <div class="card text-center">
                <img src="{{url('/img/estudiante.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Oferta Académica</h1>
                </div>
            </div>
        </a>
       
        <a style="color: black;" href="{{route('reporte')}}">
            <div class="card text-center">
                <img src="{{url('/img/supervisor.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Consultar Períodos Preinscritos</h1>
                </div>
            </div>
        </a>
        @endif
        
    </div>
</div>
@endsection