@extends('layouts.app')
@section('title', 'Cantidades')
@section ('content')
<div class="container pb-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 text-center">
                        <h1>Informacion</h1>
                    </div>
                    <!-- Nav tabs -->
                        <div role="tabpanel">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"> Personales | </a></li>
                                <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"> Direccion | </a></li>
                                <li role="presentation"><a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"> Educacion | </a></li>
                                <li role="presentation"><a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"> Laboral | </a></li>
                            </ul>
                            <br>
                        
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="tab1">
                                    {!! Form::label('capital', 'Personal') !!}
                                    {!! Form::text('capital', null, ['class' => 'form-control', 'placeholder' => 'Ingrese Cantidad $$$' , 'required']) !!}
                                    <br>
                                    {!! Form::submit('Agregar!') !!}
                                    <br>
                                    <br>
                                    <table class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>John</td>
                                                <td>Doe</td>
                                                <td>john@example.com</td>
                                            </tr>
                                            <tr>
                                                <td>Smith</td>
                                                <td>Thomas</td>
                                                <td>smith@example.com</td>
                                            </tr>
                                            <tr>
                                                <td>Merry</td>
                                                <td>Jim</td>
                                                <td>merry@example.com</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab2">
                                    {!! Form::label('capital2', 'Direccion') !!}
                                    {!! Form::text('capital2', null, ['class' => 'form-control' , 'required']) !!}
                                    <br>
                                    {!! Form::label('Grouped List', 'Grouped List') !!}
                                    {!! Form::select('animal', array(
                                        'Cats' => array('leopard' => 'Leopard'),
                                        'Dogs' => array('spaniel' => 'Spaniel'),
                                    ))!!}
                                    <br>
                                    {!! Form::label('checkbox', 'checkbox') !!}
                                    {!! Form::checkbox('name', 'value', true)  !!}
                                    <br>
                                    {!! Form::label('radio', 'radio') !!}
                                    {!! Form::radio('name', 'value', true) !!}
                                    <br>
                                    {!! Form::label('password', 'password') !!}
                                    {!! Form::password('password') !!}
                                    <br>
                                    {!! Form::label('email', 'email') !!}
                                    {!! Form::text('email', 'example@gmail.com') !!}
                                    <br>
                                    {!! Form::label('email2', 'email2') !!}
                                    {!! Form::label('email', 'E-Mail Address', array('class' => 'awesome')) !!}
                                    <br>
                                    {!! Form::submit('Click Me!') !!}

                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab3">
                                    <h1>Agregar canción</h1>
                                    <form method="POST" action="">
                                        @csrf
                                        <input autocomplete="off" required type="text" name="nombre" placeholder="Nombre de la canción">
                                        <br><br>
                                        <input autocomplete="off" required type="text" name="artista" placeholder="Artista que la canta">
                                        <br><br>
                                        <input autocomplete="off" required type="text" name="album" placeholder="Álbum">
                                        <br><br>
                                        <input autocomplete="off" required type="number" name="anio" placeholder="Año">
                                        <br><br>
                                        <input type="submit" value="Guardar">
                                    </form>
                                    
                                </div>
                                <div role="tabpanel" class="tab-pane" id="tab4">
                                    {!! Form::token() !!}
                                    {!! Form::label('nombre_empresa', 'Nombre Empresa') !!}
                                    {!! Form::text('nombre_empresa', null, ['class' => 'form-control' , 'required']) !!}
                                    {!! Form::label('fecha_inicio', 'Fecha Inicio') !!}
                                    {!! Form::text('fecha_inicio', null, ['class' => 'form-control' , 'required']) !!}
                                    <br>
                                    {!! Form::label('fecha_fin', 'Fecha Fin') !!}
                                    {!! Form::selectMonth('month') !!}
                                    <br>
                                    {!! Form::submit('Agregar!') !!}

                                    <br><br>
                                    <table class="table table-responsive ">
                                        <thead>
                                            <tr>
                                                <th>nro</th>
                                                <th>Nombre Empresa</th>
                                                <th>Fecha inicio</th>
                                                <th>Fecha fin</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>prueba empresa</td>
                                                <td>Noviembre 2019</td>
                                                <td>Diciembre 2020</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>prueba empresa 2</td>
                                                <td>Enero 2021</td>
                                                <td>Diciembre 2021</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>prueba empresa 3</td>
                                                <td>Enero 2022</td>
                                                <td>Actualmente</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> 
                        <script>
                            // detectamos el cambio de valor en el campo capital
                            $('#capital').on('input', function(){
                          
                            // comprobamos que sea un entero y en caso contrario, pasamos un cero
                            var capitalValue = !isNaN(parseInt($(this).val())) ? parseInt($(this).val()) : 0 ;
                          
                            // sumamos 1000 al valor obtenido de capital y lo ponemos en capital2
                            $('#capital2').val(capitalValue + 1000);
                          
                            });
                        </script>
                        <br>
                    <a class='btn btn-info' href="{{URL::route('listadoestudiante')}}" >Regresar</a>
                </div>
            </div> <!-- card -->
        </div>
    </div> <!-- row -->
</div>

   

@endsection