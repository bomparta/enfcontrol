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
                background-image: url('/img/fondo.jpeg') ;
                background-repeat: no-repeat;
                background-size: cover;
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
            .overlay{
                background: rgba(0,0,0,0.3);
                position: fixed;
                top:0;
                bottom:0;
                left:0;
                right:0;
                display:flex;            
                justify-content:center;
            }
            .popup{
                background: #f8f8f8;
                box-shadow: 0px 0px 0px 0px rgba(0,0,0,0.3);
                border-radius:3px;
                padding:20px;
                width:600px;
            }
            .popup .btn-cerrar-popup{
                display:black;
                color:#bbbbbb;
                transition: .3s ease all;
            }
            .popup .btn-cerrar-popup:hover{
               
                color:#000;
               
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

         
            <div class="content">
                <div>
                    <a href="http://www.enf.edu.ve" target="_new"><img src="{{url('/img/banner.png')}}"  ></a>
                
            
                    <div class="container-fluid">
                        <strong>"El ente articulador del Ministerio Público en el Sistema de Justicia Venezolano, 
                            <br>en materia de Función Fiscal que coadyuven en la resolución de problemas<br>en el Sistema de Justicia Penal venezolano."
                        </strong>
                        <p>
                        <hr style=" height: 10px;border-radius: 5px; background-color: #c8c5c5;">
                        <h2> <strong> <font color=#001958>Sistema de Gestión ENFMP </font></strong></h2> <!--<button >    <img src="{{url('/img/icon/get_info.png')}}" heigth="20px" width="20px"  ></button>-->
                    </div>
                        @if (Route::has('login'))
                            <div class="links" >
                                @auth
                               
                                <a href="{{ url('/home') }}"> <img src="{{url('/img/icon/home.png')}}" heigth="20px" width="20px"  ><strong><font color=#001958> Inicio</strong></font></a>
                               
                                @else
                                
                                    <a href="{{ route('login') }}" title="Acceso al Sistema Gestión ENFMP"><img src="{{url('/img/icon/users.png')}}" heigth="20px" width="20px"  ><strong> <font color=#001958> Acceso</strong></font></a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" title="Registrar Nuevo Usuario"><strong> <font color=#001958>Registrarse</font></strong></a>
                                    @endif
                               
                                @endauth                        

                            </div>
                        @endif       
                </div>
               <!-- <div class="overlay">
                    <div class="popup">
                        <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup">Cerrar</a>
                     <img src="{{url('/img/icon/home.png')}}" >  
                    </div>
                </div>-->
            </div>
    </body>
</html>
