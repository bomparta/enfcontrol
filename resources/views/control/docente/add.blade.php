@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
        @include('layouts.appcontrol')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">

                    <div class="col-12 text-center"><h1>Docente</h1></div>
                    <div class="col-12">
                    <form id="formulario" name="formulario" method="post" action="#">
                        
                                <div id="divSubTituloIndex2">
                                            Suministre los datos del Docente, haga clic en "Crear".
                                </div><br>
                               
                        <div class="form-group row">
                            <label for="inputnacionalidad" class="col-sm-2 col-form-label">Nacionalidad</label>
                            <div class="col-sm-10">
                            <input name="nacionalidad" type="text" class="form-control" id="inputnacionalidad" placeholder="Nacionalidad V o E">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputcedula" class="col-sm-2 col-form-label">Cedula</label>
                            <div class="col-sm-10">
                            <input name="cedula" type="text" class="form-control" id="inputcedula" placeholder="Cedula de Identidad ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputcodrif" class="col-sm-2 col-form-label">Cod Rif</label>
                            <div class="col-sm-10">
                            <input name="codrif" type="text" class="form-control" id="inputcodrif" placeholder="Codigo Rif ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputrif" class="col-sm-2 col-form-label">Rif</label>
                            <div class="col-sm-10">
                            <input name="rif" type="text" class="form-control" id="inputrif" placeholder="rif">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputprinombre" class="col-sm-2 col-form-label">Primer Nombre</label>
                            <div class="col-sm-10">
                            <input name="primernombre" type="text" class="form-control" id="inputprinombre" placeholder="Primer Nombre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputsegnombre" class="col-sm-2 col-form-label">Segundo Nombre</label>
                            <div class="col-sm-10">
                            <input name="segundonombre" type="text" class="form-control" id="inputsegnombre" placeholder="Segundo Nombre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputpriapellido" class="col-sm-2 col-form-label">Primer Apellido</label>
                            <div class="col-sm-10">
                            <input name="primerapellido" type="text" class="form-control" id="inputpriapellido" placeholder="Primer Apellido">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputsegapellido" class="col-sm-2 col-form-label">Segundo Apellido</label>
                            <div class="col-sm-10">
                            <input name="segundoapellido" type="text" class="form-control" id="inputsegapellido" placeholder="Segundo Apellido">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputsexo" class="col-sm-2 col-form-label">sexo</label>
                            <div class="col-sm-10">
                            <input name="sexo" type="text" class="form-control" id="inputsexo" placeholder="sexo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtelcelular" class="col-sm-2 col-form-label">Telefono Celular</label>
                            <div class="col-sm-10">
                            <input name="telcelular" type="text" class="form-control" id="inputtelcelular" placeholder="Telefono Celular">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtelhabitacion" class="col-sm-2 col-form-label">Telefono Habitacion</label>
                            <div class="col-sm-10">
                            <input name="telhabitacion" type="text" class="form-control" id="inputtelhabitacion" placeholder="Telefono Habitacion">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputcorreo" class="col-sm-2 col-form-label">Correo</label>
                            <div class="col-sm-10">
                            <input name="correo" type="text" class="form-control" id="inputcorreo" placeholder="Correo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputnivelacademico" class="col-sm-2 col-form-label">Nivel Academico</label>
                            <div class="col-sm-10">
                            <input name="nivelacademico" type="text" class="form-control" id="inputnivelacademico" placeholder="nivel Academico">
                            </div>
                        </div>
                                                
                        <input type="submit" name=" Crear " value="Guardar" class="btn btn-dark btn-block">
                        <br>
                        <a type="button"  href="{{URL::route('planificacion')}}" class="btn btn-info btn-block">Cerrar</a>
                        <br>
                        <br>
                    </form>
                
           
              

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
	function cerrar(){
		window.close()
	}
</script>
@endsection