
<aside class="bg-white" id="sidebar-wrapper-lg">
    <div class="col-12 text-center">
      <h4 class="text-primary" >REGISTRO Y CONTROL DE BIENES NACIONALES</h6>   
   
      </a>
      <h6 class="text-dark">Bienvenid@, {{Auth::user()->name}}</h6>
    </div>
</aside>
<div class="col-xs-1 col-sm-1 col-md-1 col-lg-2 col-xl-2 col-xxl-2 border-rt-e6 px-0">
    <div class="d-flex flex-column align-items-center align-items-sm-start ">
    <div class="list-group list-group-flush">
        <!-- Menu Administrador RRHH-->
        @if(in_array( Auth::user()->id_usuariogrupo, array(13,9) ))
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
       
        <a href="{{route('reportes_bienes')}}" class="list-group-item list-group-item-action border-0">
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
