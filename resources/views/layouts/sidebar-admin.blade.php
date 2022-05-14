<aside class="bg-white" id="sidebar-wrapper-lg">
    <div class="sidebar-heading text-center">
        @if(Auth::user()->usuario_grupo_id == 2)
            <img src="" alt="" class="w-100 pb-3">
        @else
            <div class="h1 d-block pt-3">
                <img src="" alt="" class="w-50 pb-2">
            </div>
        @endif

        <h1 class="h5 text-primary">Panel de control</h1>
        <h2 class="h6">Distribución</h2>
        <hr class="mb-0">
    </div>

    <div class="list-group list-group-flush">
        <a href="" class="list-group-item list-group-item-action border-0">
            <img src="" class="icon-lg">
            Analítica
        </a>

        @if(in_array( Auth::user()->usuario_grupo_id, array(1, 3, 6) ))
            <a href="#collapse-pedidos" class="list-group-item list-group-item-action border-0" data-toggle="collapse" aria-controls="collapse-pedidos">
                <img src="" class="icon-lg">
                Pedidos
            </a>

            <div class="collapse" id="collapse-pedidos">
                @if(in_array( Auth::user()->usuario_grupo_id, array(1, 3) ))
                    <a href="" class="list-group-item list-group-item-action border-0 bg-light pl-4">
                        Por confirmar
                    </a>

                    <a href="" class="list-group-item list-group-item-action border-0 bg-light pl-4">
                        Rechazados
                    </a>
                @endif

                @if(in_array( Auth::user()->usuario_grupo_id, array(1, 3, 6) ))
                    <a href="" class="list-group-item list-group-item-action border-0 bg-light pl-4">
                        Confirmados
                    </a>

                    <a href="" class="list-group-item list-group-item-action border-0 bg-light pl-4">
                        Despachados
                    </a>
                @endif
            </div>
        @endif

        @if(in_array( Auth::user()->usuario_grupo_id, array(1, 3) ))
            <a href="#collapse-parametros" class="list-group-item list-group-item-action border-0" data-toggle="collapse" aria-controls="collapse-parametros">
                <i class="ri-settings-3-line icon-lg"></i>
                Parámetros
            </a>

            <div class="collapse" id="collapse-parametros">
                @if (Auth::user()->usuario_grupo_id == 1)
                    <a href="" class="list-group-item list-group-item-action border-0 bg-light pl-4">
                        Actividades económicas
                    </a>

                    <a href="" class="list-group-item list-group-item-action border-0 bg-light pl-4">
                        Capital
                    </a>

                    <a href="" class="list-group-item list-group-item-action border-0 bg-light pl-4">
                        Colecciones y categorías
                    </a>

                    <a href="" class="list-group-item list-group-item-action border-0 bg-light pl-4">
                        Territorios
                    </a>
                @endif

                @if(in_array( Auth::user()->usuario_grupo_id, array(1, 3) ))
                    <a href="" class="list-group-item list-group-item-action border-0 bg-light pl-4">
                        Bancos
                    </a>

                    <a href="" class="list-group-item list-group-item-action border-0 bg-light pl-4">
                        Impuestos
                    </a>

                    <a href="" class="list-group-item list-group-item-action border-0 bg-light pl-4">
                        Métodos de pago
                    </a>

                    <a href="" class="list-group-item list-group-item-action border-0 bg-light pl-4">
                        Monedas
                    </a>
                @endif
            </div>
        @endif

        @if(in_array( Auth::user()->usuario_grupo_id, array(1, 3) ))
            <a href="" class="list-group-item list-group-item-action border-0">
                <img src="/images/icons-lineal/dropshipping_azul.png" class="icon-lg">
                Tiendas
            </a>

        @elseif(Auth::user()->usuario_grupo_id == 2)
            <a href="" class="list-group-item list-group-item-action border-0">
                <img src="/images/icons-lineal/dropshipping_azul.png" class="icon-lg">
                Mi tienda
            </a>

            <a href="" class="list-group-item list-group-item-action border-0" >
                <img src="/images/icons-lineal/pagos.png" class="icon-lg">
                Métodos de pago
            </a>
        @endif

        @if(in_array( Auth::user()->usuario_grupo_id, array(1, 3) ))
            <a href="" class="list-group-item list-group-item-action border-0">
                <img src="/images/icons-lineal/usuarios.png" class="icon-lg">
                Usuarios
            </a>
        @endif

        @if(in_array( Auth::user()->usuario_grupo_id, array(1, 2, 6, 7) ))
            <a href="" class="list-group-item list-group-item-action border-0">
                <img src="/images/icons-lineal/productos.png" class="icon-lg">
                Productos
            </a>
        @endif
        
        <a href="" class="list-group-item list-group-item-action border-0">
            <img src="/images/icons-lineal/cuenta.svg" class="icon-lg">
            Mi Cuenta
        </a>
        
        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/images/icons-lineal/camion_mrw.svg" class="icon-lg">
            Distribución
        </a>

        <button onclick="document.getElementById('form-logout').submit();" type="button" class="list-group-item list-group-item-action border-0">
            <img src="/images/icons-lineal/logout.png" class="icon-lg">
            Cerrar sesión
        </button>

        <form id="form-logout" action="" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</aside>
