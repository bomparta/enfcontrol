
<aside class="bg-white" id="sidebar-wrapper-lg">
    <div class="col-12 text-center">
      <h4 class="text-primary" >VACACIONES</h6>   
   
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
        <div class="card-header text-primary" align="center">Control de Expedientes</div>
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
        <a href="{{route('planillarrhh')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/check_list.png" class="icon-lg">
            Planilla de Actualización de Datos
        </a>
      
        <div class="card-header text-primary" align="center">Vacaciones</div>
        <a href="{{route('funcionario_vacaciones')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/check_list.png" class="icon-lg">
            Solicitud de Vacaciones
        </a> 
        <hr>
        <div class="card-header text-secondary">RRHH</div>
        <div class="card-header text-primary" aling="center">Control de Expedientes</div>
            <a href="{{route('ver_trabajador')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Movimientos de Personal
            </a>
           
            <div class="card-header text-primary" aling="center">Vacaciones</div>
            <a href="{{route('funcionario_vacaciones')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/check_list.png" class="icon-lg">
            Aprobación de Vacaciones
            </a>   
            <hr>  
            <a href="{{route('reportesrrhh')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Reportes
            </a>
        
        @endif
        @if(in_array( Auth::user()->id_usuariogrupo, array(10,11,13,6,4) ))<!--Funcionarios !-->
        <div class="card-header text-secondary">FUNCIONARIOS</div>
        <div class="card-header text-primary" aling="center">Control de Expedientes</div>
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
        <a href="{{route('planillarrhh')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/check_list.png" class="icon-lg">
            Planilla de Actualización de Datos
        </a>
      
        <div class="card-header text-primary" aling="center">Vacaciones</div>
        <a href="{{route('funcionario_vacaciones')}}" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/check_list.png" class="icon-lg">
            Solicitud de Vacaciones
        </a>     
        @endif
        @if(in_array( Auth::user()->id_usuariogrupo, array(10) )) <!--Personal rrhh !-->
        <div class="card-header text-secondary">RRHH</div>
        <div class="card-header text-primary" aling="center">Control de Expedientes</div>
            <a href="{{route('ver_trabajador')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Movimientos de Personal
            </a>
            <hr>
            <div class="card-header text-primary" aling="center">Control de Expedientes</div>
            <a href="{{route('funcionario_vacaciones')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Aprobación de Vacaciones
             </a>     
            <hr>
            <a href="{{route('reportesrrhh')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Reportes
            </a>
        @endif
        <!-- Menu Comun -->

       <!-- <a href="/password/reset" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/check_list.png" class="icon-lg">
            Cambio de clave
        </a>-->

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
