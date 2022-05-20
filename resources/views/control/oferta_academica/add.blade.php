@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
        @include('layouts.appcontrol')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">

                    <div class="col-12 text-center"><h1>Oferta Academica</h1></div>
                    <div class="col-12">
                    <form id="formulario" name="formulario" method="post" action="#">
                        
                                <div id="divSubTituloIndex2">
                                            Suministre los datos de oferta academica, haga clic en "Crear".
                                </div><br>
                               
                        <div class="form-group row">
                            <label for="inputfechainicio" class="col-sm-2 col-form-label">Fecha Inicio</label>
                            <div class="col-sm-10">
                            <input name="fechainicio" type="date" class="form-control" id="inputfechainicio">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputfecha fin" class="col-sm-2 col-form-label">Fecha Fin</label>
                            <div class="col-sm-10">
                            <input name="fechafin" type="date" class="form-control" id="inputfechafin">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputperiodos" class="col-sm-2 col-form-label">Periodo</label>
                            <div class="col-sm-10">
                                <select name="periodos"  class="form-control" required >
                                    @foreach ($periodos as $periodo)
                                        <option value="{{ $periodo->id }}">{{ $periodo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputprograma" class="col-sm-2 col-form-label">Programa</label>
                            <div class="col-sm-10">
                                <select name="programa"  class="form-control" required >
                                    @foreach ($programas as $programa)
                                        <option value="{{ $programa->id }}">{{ $programa->programa }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputpensum" class="col-sm-2 col-form-label">Unidad Curricular</label>
                            <div class="col-sm-10">
                                <select name="pensum"  class="form-control" required >
                                    @foreach ($pensums as $pensum)
                                        <option value="{{ $pensum->id }}">{{ $pensum->unidad_curricular }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputcodigo" class="col-sm-2 col-form-label">Codigo</label>
                            <div class="col-sm-10">
                            <input name="codigo" type="text" class="form-control" id="inputcodigo" placeholder="Codigo de la materia">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtrimestre" class="col-sm-2 col-form-label">Trimestre</label>
                            <div class="col-sm-10">
                                <select name="trimestre"  class="form-control" required >
                                    @foreach ($trimestres as $trimestre)
                                        <option value="{{ $trimestre->id }}">{{ $trimestre->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputdiaclase" class="col-sm-2 col-form-label">Dia de Clase</label>
                            <div class="col-sm-10">
                            <input name="diaclase" type="text" class="form-control" id="inputdiaclase" placeholder="dia de clase">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputprofesor" class="col-sm-2 col-form-label">Profesor</label>
                            <div class="col-sm-10">
                                <select name="profesor"  class="form-control" required >
                                    @foreach ($profesores as $profesor)
                                        <option value="{{ $profesor->id }}">{{ $profesor->primer_nombre }} {{ $profesor->segundo_nombre }} {{ $profesor->primer_apellido }} {{ $profesor->segundo_apellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputhorario" class="col-sm-2 col-form-label">Horario</label>
                            <div class="col-sm-10">
                            <input name="horario" type="text" class="form-control" id="inputhorario" placeholder="Horario de clase">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputunidadcurricular" class="col-sm-2 col-form-label">Unidad Curricular</label>
                            <div class="col-sm-10">
                            <input name="unidadcurricular" type="text" class="form-control" id="inputunidadcurricular" placeholder="Unidad Curricular">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputseccion" class="col-sm-2 col-form-label">Seccion</label>
                            <div class="col-sm-10">
                                <select name="seccion"  class="form-control" required >
                                    @foreach ($seccions as $seccion)
                                        <option value="{{ $seccion->id }}">{{ $seccion->descripcion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputcupos" class="col-sm-2 col-form-label">Cupos</label>
                            <div class="col-sm-10">
                            <input name="cupos" type="text" class="form-control" id="inputcupos" placeholder="Cupones por seccion">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputvalorgen" class="col-sm-2 col-form-label">Valor Publico General</label>
                            <div class="col-sm-10">
                            <input name="valorgeneral" type="text" class="form-control" id="inputvalorgen" placeholder="Valor publico general">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtotalgen" class="col-sm-2 col-form-label">Monto Total General</label>
                            <div class="col-sm-10">
                            <input name="totalgeneral" type="text" class="form-control" id="inputtotalgen" placeholder="Total publico general">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputvalormp" class="col-sm-2 col-form-label">Valor MP</label>
                            <div class="col-sm-10">
                            <input name="valormp" type="text" class="form-control" id="inputvalormp" placeholder="Valor publico general">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputtotalmp" class="col-sm-2 col-form-label">Monto Total MP</label>
                            <div class="col-sm-10">
                            <input name="totalmp" type="text" class="form-control" id="inputtotalmp" placeholder="Total publico general">
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