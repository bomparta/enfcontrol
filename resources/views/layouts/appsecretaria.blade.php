<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistema Gestion ENFMP') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}" title ="Ir A la Página Principal">
                <img src="{{url('/img/logo2.png')}}" >{{ config('app.name', 'Control de Estudio ENF') }}

                </a>
                <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Inicio&nbsp;<i class="fa fa-home"></i></a>
                </li>
                @if(isset(Auth::user()->id_usuariogrupo))
                    @if(in_array( Auth::user()->id_usuariogrupo, array(6) ))
                    @if(Route::currentRouteName()=='actividad')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('listadoactividad')}}">Actividad&nbsp;<i class="fa fa-box"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('actuacion')}}">Actuación&nbsp;<i class="fa fa-cart-plus"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('reporte')}}">Reportes Evento&nbsp;<i class="fa fa-list"></i></a>
                    </li>
                    @endif
                    @if(Route::currentRouteName()=='admincontrol')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('planificacion')}}">Revisión Académica&nbsp;<i class="fa fa-box"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('planificacion')}}">Oferta Académica&nbsp;<i class="fa fa-cart-plus"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('reporte')}}">Consultar Períodos Preinscritos&nbsp;<i class="fa fa-list"></i></a>
                    </li>
                    @endif
                    @endif
                @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

        <main class="py-4">
            @yield('content')
        </main>
        <footer class="px-2 py-2 fixed-bottom bg-dark">
     <span class="text-muted">Sistema de control de estudio de la Escuela Nacional de Fiscales
        <i class="fa fa-code text-white"></i>
        con
        <i class="fa fa-heart" style="color: #ff2b56;"></i>
        por
        <a class="text-white" href="//parzibyte.me/blog">Parzibyte</a>
        &nbsp;|&nbsp;
        <a target="_blank" class="text-white" href="//github.com/parzibyte/sistema_ventas_laravel">
            <i class="fab fa-github"></i>
        </a>
    </span>
</footer>
    </div>
</body>
</html>
