@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
  
     <div class="col-12 text-center">
     <h4 class="text-primary" >CONTROL DE EXPEDIENTES RRHH</h6>   
     <a href="{{route('rrhh')}}"><img src="{{url('/img/logo2.png')}}" class="card-img-bottom"  style="max-width: 6rem;" title="Fundación Escuela Nacional de Fiscales del Ministerio Público">
</a>
     <h6 class="text-dark">Bienvenid@, {{Auth::user()->name}}</h6>

    </div>
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
        <div class="card-columns">
                <div class="col ps-6">
                  <div class="card bg-light mb-6" style="max-width: 14rem;">
                      <div class="card-header text-secondary">FUNCIONARIOS</div>
                      <div class="card-body">
                        <a href="{{route('funcionario')}}" ><h6 class="card-title">Registrar Información</h6>
                          <img src="{{url('/img/registro.jpeg')}}" class="card-img-bottom" >
                        </a>
                      </div>
                    </div>
                    <div class="card bg-light mb-6" style="max-width: 14rem;">
                      <div class="card-header text-secondary">RRHH</div>
                      <div class="card-body">
                      <a href="{{route('movimientosrrhh')}}"> <h6 class="card-title">Expedientes</h6>
                        <img src="{{url('/img/expediente.jpeg')}}" class="card-img-top">
                      </a>
                      </div>
                    </div>
                    
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection