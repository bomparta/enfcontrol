@extends('layouts.app')
@section('title', 'Cantidades')
@section ('content')
<div class="d-flex" id="wrapper">
    @include('layouts.appcontrol')

    <div id="page-content-wrapper">
<div class="container pb-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 text-center">
                        <h1>Adjuntar Informacion</h1>
                    </div>
                    <div class="container">
                        <div class="col-12 text-center">
                           
                       </div>
                       <div class="card-columns">
                            <div class="card text-center">
                                   
                                   <div class="card-body">
                                       <!-- MUESTRA LA FOTO DEL USUARIO SI EXISTE, SINO SE MUESTRA LA IMAGEN POR DEFECTO -->
                                       <img src="{{ asset('img/imagen/curriculum.png') }}" height="120" width="100"><br><br>
                                    <label for="photo">Adjuntar Curriculum</label>
                                    <?= Form::file('photo') ?>
                                       <h1 class="card-title">Curriculum</h1>
                                   </div>
                            </div>
                               
                            <div class="card text-center">
                                   
                                   <div class="card-body">
                                       <!-- MUESTRA LA FOTO DEL USUARIO SI EXISTE, SINO SE MUESTRA LA IMAGEN POR DEFECTO -->
                                       <img src="{{ asset('img/imagen/carta.jpg') }}" height="120" width="100"><br><br>
                                    <label for="photo">Carta de Solicitud</label>
                                    <?= Form::file('photo') ?>
                                       <h1 class="card-title">Carta Solicitud</h1>
                                   </div>
                            </div>
                               
                            <div class="card text-center">
                                   
                                <div class="card-body">
                                       <!-- MUESTRA LA FOTO DEL USUARIO SI EXISTE, SINO SE MUESTRA LA IMAGEN POR DEFECTO -->
                                       <img src="{{ asset('img/imagen/foto_carnet.png') }}" height="120" width="100"><br><br>
                                    <label for="photo">Foto Carnet</label>
                                    <?= Form::file('photo') ?>
                                       <h1 class="card-title">Foto Carnet</h1>
                                   </div>
                            </div>

                            <div class="card text-center">
                                   
                                   <div class="card-body">
                                       <!-- MUESTRA LA FOTO DEL USUARIO SI EXISTE, SINO SE MUESTRA LA IMAGEN POR DEFECTO -->
                                       <img src="{{ asset('img/imagen/cedula.png') }}" height="120" width="100"><br><br>
                                    <label for="photo">Foto Cedula</label>
                                    <?= Form::file('photo') ?>
                                       <h1 class="card-title">Foto Cedula</h1>
                                   </div>
                            </div>

                            <div class="card text-center">
                                   
                                   <div class="card-body">
                                       <!-- MUESTRA LA FOTO DEL USUARIO SI EXISTE, SINO SE MUESTRA LA IMAGEN POR DEFECTO -->
                                       <img src="{{ asset('img/imagen/foto_carnet.png') }}" height="120" width="100"><br><br>
                                    <label for="photo">Foto Carnet</label>
                                    <?= Form::file('photo') ?>
                                       <h1 class="card-title">Foto Carnet Colegio</h1>
                                   </div>
                            </div>
                               
                            <div class="card text-center">
                                   
                                   <div class="card-body">
                                       <!-- MUESTRA LA FOTO DEL USUARIO SI EXISTE, SINO SE MUESTRA LA IMAGEN POR DEFECTO -->
                                       <img src="{{ asset('img/imagen/foto_carnet.png') }}" height="120" width="100"><br><br>
                                    <label for="photo">Foto Impre de Colegio</label>
                                    <?= Form::file('photo') ?>
                                       <h1 class="card-title">Foto Impre Colegio</h1>
                                   </div>
                            </div>
                               
                                   

                        </div>
                    </div>



                </div>
            </div> <!-- card -->
        </div>
    </div> <!-- row -->
</div>

</div> <!-- row -->
</div> 

@endsection