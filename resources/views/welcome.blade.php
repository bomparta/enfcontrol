<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema de Gestión ENFMP</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Inicio</a>
                    @else
                        <a href="{{ route('login') }}" title="Acceso al Sistema Control ENFMP"><strong>Acceso</strong></a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" title="Registrar Nuevo Usuario"><strong>Registrarse</strong></a>
                        @endif
                    @endauth
                   

                </div>
            @endif

            <div class="content">
            <div>
                <img src="{{url('/img/logo2.png')}}"  width="150px" height="150px" >
                <hr style=" height: 10px;border-radius: 5px; background-color: gray;">
            </div>
                <div class="title m-b-md">
                    Fundación Escuela de Fiscales
                </div>
                <div class="title m-b-md">
                del Ministerio Público
                </div>
            <div class="container-fluid">
                <strong>"El ente articulador del Ministerio Público en el Sistema de Justicia venezolano, <br>en materia de función Fiscal que coadyuven en la resolución de problemas<br>en el Sistema de Justicia Penal venezolano."</strong>
                <p>
                <hr style=" height: 10px;border-radius: 5px; background-color: gray;">
            </div>
            
            <div class="links">
                    <a href="http://www.enf.edu.ve/index.php/mision/" target="_new">Misión</a>
                    <a href="http://www.enf.edu.ve/index.php/vision/" target="_new" >Visión</a>
                    <a href="http://www.enf.edu.ve/index.php/valores/" target="_new">Valores</a>
                    <a href="http://www.enf.edu.ve/index.php/contacto/" target="_new">Dirección</a>
                    <a href="http://www.enf.edu.ve" target="_new">Novedades</a>
                    <a href="#">Galeria</a>
                    <a href="#">Promociones</a>
                    <a href="#">Diplomados</a>
                </div>
            </div>
        </div>
    </body>
</html>
