<div class="col-xs-1 col-sm-1 col-md-1 col-lg-2 col-xl-2 col-xxl-2 border-rt-e6 px-0">
    <div class="d-flex flex-column align-items-center align-items-sm-start ">
                <ul class="nav flex-column pt-2 w-200">
                    <!-- Menu Administrador Control Estudio -->
                    @if(in_array( Auth::user()->id_usuariogrupo, array(4,5) ))
                    <a href="{{route('listadoactividad')}}" class="list-group-item list-group-item-action border-0">
                        <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
                        Lista de Usuario
                    </a>
                    <a href="{{route('gestor.usuario')}}" class="list-group-item list-group-item-action border-0">
                        <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
                        Gestor Usuario
                    </a>
                    <a href="{{route('listaPeriodo')}}" class="list-group-item list-group-item-action border-0">
                        <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
                        Lista de Periodo
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
                    <a href="{{route('dashboard')}}" class="list-group-item list-group-item-action border-0 bg-dark text-white">
                        <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
                        Inicio
                    </a>
                    <a href="#" class="list-group-item list-group-item-action border-0">
                        <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
                        Inscripcion Postgrado
                    </a>
                    <a href="#" class="list-group-item list-group-item-action border-0">
                        <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
                        Registro de Pago
                    </a>
                    <a href="#" class="list-group-item list-group-item-action border-0">
                        <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
                        Registro otros Pago
                    </a>
                    <a href="/estudiantelist/{{ Auth::user()->id }}" class="list-group-item list-group-item-action border-0">
                        <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
                        Informacio Alumno
                    </a>
                    <a href="/direccionlist/{{ Auth::user()->id }}" class="list-group-item list-group-item-action border-0">
                        <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
                        Direccion Alumno
                    </a>
                    <a href="/experiencialist/{{ Auth::user()->id }}" class="list-group-item list-group-item-action border-0">
                        <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
                        Experiencia Alumno
                    </a>
                    <a href="/adjunto_datos/{{ Auth::user()->id }}" class="list-group-item list-group-item-action border-0">
                        <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
                        Datos Adjuntados
                    </a>
                    <a href="{{route('estatus')}}" class="list-group-item list-group-item-action border-0">
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
                </ul>
    </div>
</div>