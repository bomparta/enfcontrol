@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="d-flex" id="wrapper">
        @include('layouts.appevento')

        <div id="page-content-wrapper">

            <div class="container pb-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @include('layouts.items.card-header', ['titulo' => 'Nueva Actividad'])

                                <form method="POST" action="/parametros/banco">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nombre">Codigo  </label>
                                                <input id="nombre" type="text" class="form-control rounded-pill border-primary @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required>
                                                @error('nombre')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre">Tipo de Estudio  </label>
                                                <select id="retencion" class="form-control custom-select border-primary @error('retencion') is-invalid @enderror" name="retencion">
                                                    <option selected disabled>Seleccionar...</option>
                                                    <option value="0" >0%</option>
                                                    <option value="75" >75%</option>
                                                    <option value="100" >100%</option>
                                                </select>
                                                @error('nombre')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre">Nombre de la Actividad  </label>
                                                <input id="nombre" type="text" class="form-control rounded-pill border-primary @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required>
                                                @error('nombre')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre">Clasificacion  </label>
                                                <select id="retencion" class="form-control custom-select border-primary @error('retencion') is-invalid @enderror" name="retencion">
                                                    <option selected disabled>Seleccionar...</option>
                                                    <option value="0" >0%</option>
                                                    <option value="75" >75%</option>
                                                    <option value="100" >100%</option>
                                                </select>
                                                @error('nombre')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre">Tematica  </label>
                                                <select id="retencion" class="form-control custom-select border-primary @error('retencion') is-invalid @enderror" name="retencion">
                                                    <option selected disabled>Seleccionar...</option>
                                                    <option value="0" >0%</option>
                                                    <option value="75" >75%</option>
                                                    <option value="100" >100%</option>
                                                </select>
                                                @error('nombre')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="nombre">Alcance  </label>
                                                <select id="retencion" class="form-control custom-select border-primary @error('retencion') is-invalid @enderror" name="retencion">
                                                    <option selected disabled>Seleccionar...</option>
                                                    <option value="0" >0%</option>
                                                    <option value="75" >75%</option>
                                                    <option value="100" >100%</option>
                                                </select>
                                                @error('nombre')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>

                                            
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="observacion">Observación</label>
                                                <textarea id="observacion" class="form-control border-primary @error('observacion') is-invalid @enderror" name="observacion" value="{{ old('observacion') }}"></textarea>
                                                    @error('observacion')
                                                    <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div align="center">
                                        <input type="submit" value=" Crear " class="btn btn-primary" />
                                        <input name="" type="button" value=" Cerrar " onclick="cerrar()" class="btn btn-default" />
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