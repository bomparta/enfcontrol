@extends('layouts.app')
@section('content')
<div class="container">
     <div class="col-12 text-center">
        <h1>Bienvenido(a), {{Auth::user()->name}}</h1>
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
                    <h1 class="card-title">Control de Estudios</h1>
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
        <a style="color: black;" href="{{route('adm')}}">
            <div class="card text-center">
                <img src="{{url('/img/administracion.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Administración</h1>
                </div>
            </div>
        </a>
        @endif
        @if(in_array( Auth::user()->id_usuariogrupo, array(2) ))
        <a style="color: black;" href="#">
            <div class="card text-center">
                <img src="{{url('/img/informacion_personalenf.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Información Personal</h1>
                </div>
            </div>
        </a>
        <a style="color: black;" href="#">
            <div class="card text-center">
                <img src="{{url('/img/profesor.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Notas Académicas</h1>
                </div>
            </div>
        </a>
        @endif
        @if(in_array( Auth::user()->id_usuariogrupo, array(9) ))
        <a style="color: black;" href="{{route('usuario')}}">
            <div class="card text-center">
                <img src="{{url('/img/super.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Informática</h1>
                </div>
            </div>
        </a>
        <a style="color: black;" href="{{route('rrhh')}}">
            <div class="card text-center">
                <img src="{{url('/img/rrhh.png')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title"></h1>
                    <h1 class="card-title">Control</h1>
                    <h1 class="card-title">Expedientes RRHH</h1>
                </div>
            </div>
        </a>
        <a style="color: black;" href="{{route('vacaciones')}}">
            <div class="card text-center">
                <img src="{{url('/img/vacacion.png')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Vacaciones</h1>
                </div>
            </div>
        </a> 
        <a style="color: black;" href="{{route('menubienes')}}">
            <div class="card text-center">
                <img src="{{url('/img/bienes.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Bienes Nacionales</h1>
                </div>
            </div>
        </a>
        @endif
        @if(in_array( Auth::user()->id_usuariogrupo, array(3, 6, 7) ))
        <a style="color: black;" href="{{route('actividad')}}">
            <div class="card text-center">
                <img src="{{url('/img/eventos.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Eventos Académicos</h1>
                </div>
            </div>
        </a>
        @endif
        @if(in_array( Auth::user()->id_usuariogrupo, array(12,10,11,13,14,15,16,6,4) ))
        <a style="color: black;" href="{{route('rrhh')}}">
            <div class="card text-center">
                <img src="{{url('/img/rrhh.png')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title"></h1>
                    <h1 class="card-title">Control</h1>
                    <h1 class="card-title">Expedientes RRHH</h1>
                </div>
            </div>
        </a>
        <a style="color: black;" href="{{route('vacaciones')}}">
            <div class="card text-center">
                <img src="{{url('/img/vacacion.png')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Vacaciones</h1>
                </div>
            </div>
        </a>
        @endif
        @if(in_array( Auth::user()->id_usuariogrupo, array(13) ))
        <a style="color: black;" href="{{route('menubienes')}}">
            <div class="card text-center">
                <img src="{{url('/img/bienes.jpeg')}}" class="card-img-top">
                <div class="card-body">
                    <h1 class="card-title">Bienes Nacionales</h1>
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
