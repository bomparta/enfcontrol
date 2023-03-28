<aside class="bg-white" id="sidebar-wrapper-lg">
    <div class="sidebar-heading text-center">
        <h1 class="h5 text-primary">Panel de control</h1>
        <h2 class="h6">Nombre menu Usuario</h2>
        <hr class="mb-0">
    </div>

    <div class="list-group list-group-flush">
        <!-- Menu Secretaria-->

        <a href="" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Oferta Academica
        </a>
        
        <a href="" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Docente
        </a>
        
        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Pensum
        </a>

        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Revision Academica
        </a>

        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Informacion del alumno
        </a>

        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Distribución
        </a>

        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Nuevo Ingreso
        </a>

        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Reingreso
        </a>

      <!-- Menu Administracion -->
        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Unidad de Credito
        </a>

        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Lista de Docente
        </a>

        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Conciliacion
        </a>

        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Listado de Conciliado
        </a>

        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Conciliacion con Error
        </a>
        <!-- Menu Estudiante -->

        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Conciliacion con Error
        </a>

        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Conciliacion con Error
        </a>

        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Conciliacion con Error
        </a>

        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Constancia Estudio
        </a>

        <!-- Menu Docente -->

        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Ingreso de Notas
        </a>

        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Contancia de trabajo
        </a>

        <!-- Menu Comun -->

        <a href="/" class="list-group-item list-group-item-action border-0">
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