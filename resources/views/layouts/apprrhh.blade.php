
<aside class="bg-white" id="sidebar-wrapper-lg">
 


    <div class="list-group list-group-flush">
        <!-- Menu Administrador RRHH-->
  
        @if(in_array( Auth::user()->id_usuariogrupo, array(9) ))
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
         
                <a href="{{route('vacaciones_pendientes_aprobacion')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Aprobación de Vacaciones Jefe(a) inmediato o Coordinador(a)
                </a> 
              
                <a href="{{route('vacaciones_pendientes_aprobacion_director')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Aprobación de Vacaciones Director(a)
                </a> 
              
                <a href="{{route('vacaciones_pendientes_aprobacion_presidencia')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Aprobación de Vacaciones Presidente(a)
                </a>         
            <hr>
            <div class="card-header text-secondary">RRHH</div>
            <div class="card-header text-primary" aling="center">Control de Expedientes</div>
                <a href="{{route('ver_trabajador')}}" class="list-group-item list-group-item-action border-0">
                    <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                    Movimientos de Personal
                </a>            
                <div class="card-header text-primary" aling="center">Vacaciones</div>
            <a href="{{route('vac_colectivas_rrhh')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Vacaciones Colectivas
            </a>   
           
            <hr>   
                <a href="{{route('reportesrrhh')}}" class="list-group-item list-group-item-action border-0">
                    <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                    Reportes
                </a>

        <hr>
        <div class="card-header text-secondary">BIENES NACIONALES</div>
                <a href="{{route('bienes')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Incorporación 
                </a>  
                <a href="{{route('mov_bienes')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Movimientos
                </a>    
                <a href="{{route('desin_bienes')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Desincorporación
                </a>  
            @endif
            @if(in_array( Auth::user()->id_usuariogrupo, array(10,11,12,13,14,15,16,6,4) ))<!--Funcionarios !-->
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
              
                @if(in_array( Auth::user()->id_usuariogrupo, array(14,12) ))<!--Funcionarios !--> 
                <a href="{{route('vacaciones_pendientes_aprobacion')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Aprobación de Vacaciones Jefe(a) inmediato o Coordinador(a)
                </a> 
                @endif  
                @if(in_array( Auth::user()->id_usuariogrupo, array(15,12) ))<!--Funcionarios !--> 
                <a href="{{route('vacaciones_pendientes_aprobacion_director')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Aprobación de Vacaciones Director(a)
                </a> 
                @endif   
                @if(in_array( Auth::user()->id_usuariogrupo, array(16) ))<!--Funcionarios !--> 
                <a href="{{route('vacaciones_pendientes_aprobacion_presidencia')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Aprobación de Vacaciones Presidente(a)
                </a> 
        
                @endif
            @if(in_array( Auth::user()->id_usuariogrupo, array(10,12) )) <!--Personal rrhh !-->
            <div class="card-header text-secondary">RRHH</div>
            <div class="card-header text-primary" aling="center">Control de Expedientes</div>
                <a href="{{route('ver_trabajador')}}" class="list-group-item list-group-item-action border-0">
                    <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                    Movimientos de Personal
                </a>
                <hr> 
        <div class="card-header text-primary" aling="center">Vacaciones</div>
            <a href="#" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Vacaciones Colectivas
            </a>   
            
                <hr>
                <a href="{{route('reportesrrhh')}}" class="list-group-item list-group-item-action border-0">
                    <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                    Reportes
                </a>
                
            @endif
            @if(in_array( Auth::user()->id_usuariogrupo, array(13) )) <!--Personal Bienes nacionales !-->
            <div class="card-header text-secondary">BIENES NACIONALES</div>
                <a href="{{route('bienes')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Incorporación 
                </a>  
                <a href="{{route('mov_bienes')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Movimientos
                </a>    
                <a href="{{route('desin_bienes')}}" class="list-group-item list-group-item-action border-0">
                <img src="/img/icons-lineal/check_list.png" class="icon-lg">
                Desincorporación
                </a>  
            @endif
        @endif
        <hr>
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