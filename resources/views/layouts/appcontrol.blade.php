<aside class="bg-white" id="sidebar-wrapper-lg">
    <div class="sidebar-heading text-center">
        <h1 class="h5 text-primary">Panel de control</h1>
        <h2 class="h6">Nombre menu Usuario al cual pertenece</h2>
        <hr class="mb-0">
    </div>

    <div class="list-group list-group-flush">
        <!-- Menu Administrador Control Estudio -->
        @if(in_array( Auth::user()->id_usuariogrupo, array(4,5) ))
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Lista de Usuario
        </a>
        @endif

        <!-- Menu Supervisor Control Estudio -->
        @if(in_array( Auth::user()->id_usuariogrupo, array(6) ))
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Oferta Academica
        </a>
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Docentes
        </a>
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Pensum Estudio
        </a>
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Revision Academica
            <span class="badge badge-primary badge-pill">14</span>
        </a>
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Cupos x Materias
        </a>
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Reporte Inscrito
        </a>
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Reporte General
        </a>
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Reporte Pre-inscrito
        </a>
        @endif

        <!-- Menu Planificador Control Estudio-->
        @if(in_array( Auth::user()->id_usuariogrupo, array(7) ))
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Actuacion
        </a>
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Participantes
        </a>
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Ponentes
        </a>
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Asistencia
        </a>
        @endif

        <!-- Menu Operador Control Estudio-->
        @if(in_array( Auth::user()->id_usuariogrupo, array(8) ))
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Ponente
        </a>
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Asistencia
        </a>
        @endif

        <!-- Menu Participante Control Estudio-->
        @if(in_array( Auth::user()->id_usuariogrupo, array(1) ))
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Inicio
        </a>
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Inscripcion Postgrado
        </a>
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Registro de Pago
        </a>
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Informacio Alumno
        </a>
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Status Proceso
        </a>
        @endif

        <!-- Menu Administracion Control Estudio-->
        @if(in_array( Auth::user()->id_usuariogrupo, array(9) ))
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Precio UC
        </a>
        <a href="{{route('listadocente')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Listado Docente
        </a>
        <a href="{{route('listaconciliacion')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Conciliacion
        </a>
        <a href="{{route('listconciliacion')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Conciliado Lista
        </a>
        <a href="{{route('listaconciliacionerror')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Conciliado Error
        </a>
        @endif

        <!-- Menu Profesor Control Estudio-->
        @if(in_array( Auth::user()->id_usuariogrupo, array(2) ))
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Materias
        </a>
        <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Informacion Profesor
        </a>
        @endif

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