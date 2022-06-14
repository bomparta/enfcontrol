
<aside class="bg-white" id="sidebar-wrapper-lg">
    <div class="col-12 text-center">
      <h4 class="text-primary" >CONTROL DE EXPEDIENTES RRHH</h6>   
      <a href="{{route('rrhh')}}"><img src="{{url('/img/logo2.png')}}" class="card-img-bottom"  style="max-width: 6rem;" title="Fundación Escuela Nacional de Fiscales del Ministerio Público">
      </a>
      <h6 class="text-dark">Bienvenid@, {{Auth::user()->name}}</h6>
    </div>
</aside>
<div class="col-xs-1 col-sm-1 col-md-1 col-lg-2 col-xl-2 col-xxl-2 border-rt-e6 px-0">
    <div class="d-flex flex-column align-items-center align-items-sm-start ">
    <div class="list-group list-group-flush">
        <!-- Menu Administrador RRHH-->
        @if(in_array( Auth::user()->id_usuariogrupo, array(12) ))
        <div class="card-header text-secondary">FUNCIONARIOS</div>
        <a href="{{route('buscarfuncionario')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/check_list.png" class="icon-lg">
            Datos Personales
        </a>     
        <a href="{{route('familiarfuncionario')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/check_list.png" class="icon-lg">
            Datos Grupo Familiar
        </a>
        <a href="{{route('educacionfuncionario')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/check_list.png" class="icon-lg">
            Instrucción Formal y Complementaria
        </a>
        <a href="{{route('laboralfuncionario')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/check_list.png" class="icon-lg">
            Experiencia Laboral
        </a>
        <a href="{{route('requisitos')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/check_list.png" class="icon-lg">
            Requisitos
        </a>
        <a href="{{route('constanciapdf')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/check_list.png" class="icon-lg">
            Planilla de Actualización de Datos
        </a>
        <div class="card-header text-secondary">RRHH</div>
            <a href="{{route('movimientosrrhh')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Movimientos de Personal
            </a>
        
            <a href="{{route('reportesrrhh')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Reportes
            </a>
        @endif
        @if(in_array( Auth::user()->id_usuariogrupo, array(11) ))<!--Funcionarios !-->
        <div class="card-header text-secondary">FUNCIONARIOS</div>
        <a href="{{route('datosfuncionario')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/check_list.png" class="icon-lg">
            Datos Personales
        </a>     
        <a href="#" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/check_list.png" class="icon-lg">
            Datos Grupo Familiar
        </a>
        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/check_list.png" class="icon-lg">
            Instrucción Formal y Complementaria
        </a>
        <a href="{{route('laboralfuncionario')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/check_list.png" class="icon-lg">
            Experiencia Laboral
        </a>
        <a href="{{route('datosfuncionario')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/check_list.png" class="icon-lg">
            Requisitos
        </a>
        <a href="{{route('constanciapdf')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/check_list.png" class="icon-lg">
            Planilla de Actualización de Datos
        </a>
        @endif
        @if(in_array( Auth::user()->id_usuariogrupo, array(10) )) <!--Personal rrhh !-->
        <div class="card-header text-secondary">RRHH</div>
            <a href="{{route('movimientosrrhh')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Movimientos de Personal
            </a>
        
            <a href="{{route('reportesrrhh')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Reportes
            </a>
        @endif
        <!-- Menu Comun -->

        <a href="/password/reset" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/check_list.png" class="icon-lg">
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
</div>
</div>
