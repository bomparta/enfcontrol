<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistema Gestión ENFMP') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tooltip.css') }}" rel="stylesheet">
    
    {!! SEO::generate() !!}
    
</head>
<body>
   
        @foreach (['danger', 'warning', 'success'] as $alert)
            @if(session()->has($alert))
                <div id="alert-main" class="alert alert-{{ $alert }} alert-dismissible fixed-top" role="alert">
                    {{ session()->get($alert) }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        @endforeach
      
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" title ="Ir A la Página Principal">
                <img src="{{url('/img/logo2.png')}}" >{{ config('app.name', 'Sistema Gestión ENFMP') }}

                </a>
               
                <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Inicio&nbsp;<i class="fa fa-home"></i></a>
                </li>
                @if(isset(Auth::user()->id_usuariogrupo))
                    @if(in_array( Auth::user()->id_usuariogrupo, array(1) ))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard')}}">Estudiante&nbsp;<i class="fa fa-box"></i></a>
                    </li>
                    @endif
                    @if(in_array( Auth::user()->id_usuariogrupo, array(2) ))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Información Personal&nbsp;<i class="fa fa-box"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">Notas Académicas&nbsp;<i class="fa fa-box"></i></a>
                    </li>
                    @endif
                    @if(in_array( Auth::user()->id_usuariogrupo, array(4) ))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('adm')}}">Administración&nbsp;<i class="fa fa-box"></i></a>
                    </li>
                    @endif
                    @if(in_array( Auth::user()->id_usuariogrupo, array(6) ))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admincontrol')}}">Control de Estudios&nbsp;<i class="fa fa-cart-plus"></i></a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('actividad')}}">Eventos Académicos&nbsp;<i class="fa fa-list"></i></a>
                    </li>
                    @endif
                    @if(in_array( Auth::user()->id_usuariogrupo, array(9) ))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('usuario')}}">Informática&nbsp;<i class="fa fa-box"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('rrhh')}}">Control de Expedientes&nbsp;<i class="fa fa-box"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('vacaciones')}}">Vacaciones&nbsp;<i class="fa fa-box"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('menubienes')}}">Registro y Control de Bienes Nacionales&nbsp;<i class="fa fa-box"></i></a>
                    </li>
                    @endif
                    @if(in_array( Auth::user()->id_usuariogrupo, array(12,11,10,13,12,14,15,16,6,4) ))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('rrhh')}}">Control de Expedientes&nbsp;<i class="fa fa-box"></i></a>
                    </li>
                   <li class="nav-item">
                        <a class="nav-link" href="{{route('vacaciones')}}">Vacaciones&nbsp;<i class="fa fa-box"></i></a>
                    </li>
                    @endif
                    @if(in_array( Auth::user()->id_usuariogrupo, array(13) ))
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('menubienes')}}">Registro y Control de Bienes Nacionales&nbsp;<i class="fa fa-box"></i></a>
                    </li>
                    @endif
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" 
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Acceso') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                            
                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('logout') }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
<script type="text/javascript">
    // Tomado de https://parzibyte.me/blog/2019/06/26/menu-responsivo-bootstrap-4-sin-dependencias/
    document.addEventListener("DOMContentLoaded", () => {
        const menu = document.querySelector("#menu"),
            botonMenu = document.querySelector("#botonMenu");
        if (menu) {
            botonMenu.addEventListener("click", () => menu.classList.toggle("show"));
        }
    });
</script>
        <main>
            @yield('scripts')
            @yield('content')
            
        </main>
<footer class="px-2 py-2 fixed-bottom bg-dark">
    <span class="text-muted">Sistema de Gestión de la Escuela Nacional de Fiscales del Ministerio Público. 
         <i class="fa fa-code text-white">Bompart</i>
    con
         <i class="fa fa-code text-white">Colmenares</i>
    por
    <a target="_blank" class="text-white" href="http://www.enf.edu.ve">Coordinación de Tecnología</a>
    &nbsp;
    </span>
</footer>
 
</body>
</html>
