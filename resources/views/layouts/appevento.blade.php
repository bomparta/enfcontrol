<aside class="bg-white" id="sidebar-wrapper-lg">
    <div class="sidebar-heading text-center">
        <h1 class="h5 text-primary">Panel de control</h1>
        <h2 class="h6">Nombre menu Usuario</h2>
        <hr class="mb-0">
    </div>

    <div class="list-group list-group-flush">
        <!-- Menu Secretaria-->

        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Actividad
        </a>
        
        <a href="{{route('actuacion')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Actuacion
        </a>
        
        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Ajustes
        </a>

        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Buscar
        </a>

        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Reportes
        </a>

        <!-- Menu Comun -->

        <a href="/password/reset" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Cambio de clave
        </a>

        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesion') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</aside>