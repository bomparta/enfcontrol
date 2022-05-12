@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="d-flex" id="wrapper">
        @include('layouts.appcontrol')

        <div id="page-content-wrapper">

            <div class="container ">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @include('layouts.items.card-header', ['titulo' => 'Nueva Oferta Academica '])

                                <form method="POST" action="/parametros/actividad">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                             
                                            <div class="form-group">
                                                <label for="codigo">Fecha Inicio </label>
                                                <input  id="fechainicio" type="text" class="form-control rounded-pill border-primary @error('fechainicio') is-invalid @enderror" name="fechainicio" value="{{ old('fechainicio') }}" >
                                                @error('fechainicio')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="codigo">Fecha Fin </label>
                                                <input  id="fechafin" type="text" class="form-control rounded-pill border-primary @error('fechafin') is-invalid @enderror" name="fechafin" value="{{ old('fechafin') }}" >
                                                @error('fechafin')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="periodo">Periodo</label>
                                                <select class="form-control"  type="text" name="periodo" >
                                                    <option value="">Seleccione...</option>
                                                    
                                                        <option value=""></option>
                                                    
                                                </select>
                                                @error('periodo')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="list_programa">Programa de Postgrado</label>
                                                <select class="form-control"  type="text" name="list_programa" >
                                                    <option value="">Seleccione...</option>
                                                    
                                                        <option value=""></option>
                                                    
                                                </select>
                                                @error('list_programa')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="list_programa">Unidad Curricular</label>
                                                <select class="form-control"  type="text" name="list_programa" >
                                                    <option value="">Seleccione...</option>
                                                    
                                                        <option value=""></option>
                                                    
                                                </select>
                                                @error('list_programa')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="codigo">Codigo </label>
                                                <input id="codigo" type="text" class="form-control rounded-pill border-primary @error('codigo') is-invalid @enderror" name="codigo" value="{{ old('codigo') }}" required>
                                                @error('codigo')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="trimestre">Trimestre </label>
                                                <input id="trimestre" type="text" class="form-control rounded-pill border-primary @error('trimestre') is-invalid @enderror" name="trimestre" value="{{ old('trimestre') }}" required>
                                                @error('trimestre')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="dia">Dia de Clases  </label>
                                                <select class="form-control"  type="text" name="dia" >
                                                    <option value="">Selecciones...</option>
                                                    
                                                        <option value=""></option>
                                                    
                                                </select>
                                                @error('dia')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="docente">Docente que Impartira la Unidad Curricular </label>
                                                <select class="form-control"  type="text" name="docente" >
                                                    <option value="">Seleccione...</option>
                                                    
                                                        <option value=""></option>
                                                    
                                                </select>
                                                @error('docente')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="horario">Horario de Clase </label>
                                                <input id="horario" type="text" class="form-control rounded-pill border-primary @error('horario') is-invalid @enderror" name="horario" value="{{ old('horario') }}" required>
                                                @error('horario')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="unidad">Unidad de Credito </label>
                                                <input id="unidad" type="text" class="form-control rounded-pill border-primary @error('unidad') is-invalid @enderror" name="unidad" value="{{ old('unidad') }}" required>
                                                @error('unidad')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="seccion">Seccion </label>
                                                <select class="form-control"  type="text" name="seccion" >
                                                    <option value="">Seleccione...</option>
                                                    
                                                        <option value=""></option>
                                                    
                                                </select>
                                                @error('seccion')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="cupos">Cupos de la Seccion</label>
                                                <input id="cupos" type="text" class="form-control rounded-pill border-primary @error('cupos') is-invalid @enderror" name="cupos" value="{{ old('cupos') }}" required>
                                                @error('cupos')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="valor">Valor Publico General</label>
                                                <input id="valor" type="text" class="form-control rounded-pill border-primary @error('valor') is-invalid @enderror" name="valor" value="{{ old('valor') }}" required>
                                                @error('valor')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="monto_general">Monto Total Publico General</label>
                                                <input id="monto_general" type="text" class="form-control rounded-pill border-primary @error('monto_general') is-invalid @enderror" name="monto_general" value="{{ old('monto_general') }}" required>
                                                @error('monto_general')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="valor_mp">Valor Personal MP</label>
                                                <input id="valor_mp" type="text" class="form-control rounded-pill border-primary @error('valor_mp') is-invalid @enderror" name="valor_mp" value="{{ old('valor_mp') }}" required>
                                                @error('valor_mp')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="monto_mp">Monto Total Personal MP</label>
                                                <input id="monto_mp" type="text" class="form-control rounded-pill border-primary @error('monto_mp') is-invalid @enderror" name="monto_mp" value="{{ old('monto_mp') }}" required>
                                                @error('monto_mp')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>

                                            
                                        </div>
                                    </div>
                                    <div align="center">
                                        <input type="submit" value=" Crear " class="btn btn-primary" />
                                        <a class='btn btn-default' type="button"  href="{{URL::route('listadoactividad')}}">Cerrar</a>
                                    </div>

                                   
                                </form>
                            </div>
                        </div> <!-- card -->
                    </div>
                </div>
            </div>
        </div> <!-- page-content-wrapper -->
    </div> <!-- wrapper -->
@endsection

@section('scripts')
<script type="text/javascript">
	function cerrar(){
		window.close()
	}
</script>
@endsection