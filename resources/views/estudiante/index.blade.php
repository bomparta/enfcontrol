@extends('layouts.app')

@section('content')
<div class="container">
     <div class="col-12 text-center">
        <h1>Bienvenido, {{Auth::user()->name}}</h1>
    </div>
    <div class="card-columns">
        <a href="{{route('datosestudiante')}}" style="color: black;" href="index">
            <div class="card text-center">
                <img src="{{url('/img/informacion_personalenf.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Informacion Personal</h1>
                </div>
            </div>
        </a>

        <a style="color: black;" target="_blank" href="https://parzibyte.me/blog/contrataciones-ayuda/">
            <div class="card text-center">
                <img src="{{url('/img/inscripcionenf.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Inscripciones</h1>
                </div>
            </div>
        </a>

        <a style="color: black;" href="{{route('reporte')}}">
            <div class="card text-center">
                <img src="{{url('/img/preinscripcionenf.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Preinscripcion</h1>
                </div>
            </div>
        </a>

        <a style="color: black;" target="_blank" href="{{route('constanciapdf')}}">
            <div class="card text-center">
                <img src="{{url('/img/control_estudioenf.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Constancia Estudio</h1>
                </div>
            </div>
        </a>
        
    </div>
</div>
@endsection