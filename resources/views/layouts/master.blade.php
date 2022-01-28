<aside class="bg-white" id="sidebar-wrapper-lg">
    <div class="sidebar-heading text-center">
        <h1 class="h5 text-primary">Panel de control</h1>
        <h2 class="h6">Distribución</h2>
        <hr class="mb-0">
    </div>

    <div class="list-group list-group-flush">
        <a href="" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Analítica
        </a>

             
        <a href="" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
            Mi Cuenta
        </a>
        
        <a href="/" class="list-group-item list-group-item-action border-0">
            <img src="/img/icons-lineal/analiticas.png" class="icon-lg">
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