
@extends('layouts.app')
@section ('content') 
@if(Auth::user())
<div class="container">
    <div class="row justify-content-start">
  
     <div class="col-12 text-center">
     <h4 class="text-primary" >VACACIONES</h6>        
</a>

     <h6 class="text-dark">Bienvenid@, {{Auth::user()->name}}</h6>

    </div>
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
        <div class="card-columns">
                <div class="col ps-6">
                
                @if(in_array( Auth::user()->id_usuariogrupo, array(12,10,11,13,14,15,16,6,4,9) ))
                  <div class="card bg-light mb-6" style="max-width: 14rem;">
                   
                      <div class="card-body">
                        <a href="{{route('funcionario_vacaciones')}}" ><h6 class="card-title">Solicitud Vacaciones</h6>
                          <img src="{{url('/img/registro.jpeg')}}" class="card-img-bottom" >
                        </a>
                      </div>
                    </div>    
                                   
                 
                    @if(in_array( Auth::user()->id_usuariogrupo, array(14,9)))
                    <div class="card bg-light mb-6" style="max-width: 14rem;">
                    
                      <div class="card-body">
                      <a href="{{route('vacaciones_pendientes_aprobacion')}}"> <h6 class="card-title">Aprobación Vacaciones Jefe(a) Inmediato o Coordinador(a) </h6>
                        <img src="{{url('/img/con_vacacion.jpeg')}}" class="card-img-top">
                      </a>
                      </div>
                    </div>
                    @endif
                    @if(in_array( Auth::user()->id_usuariogrupo, array(15,9)))
                    <div class="card bg-light mb-6" style="max-width: 14rem;">
                     
                      <div class="card-body">
                      <a href="{{route('vacaciones_pendientes_aprobacion_director')}}"> <h6 class="card-title">Aprobación Vacaciones Director(a) </h6>
                        <img src="{{url('/img/con_vacacion.jpeg')}}" class="card-img-top">
                      </a>
                      </div>
                    </div>
                    @endif
                    @if(in_array( Auth::user()->id_usuariogrupo, array(16,9)))
                    <div class="card bg-light mb-6" style="max-width: 14rem;">
                    
                      <div class="card-body">
                      <a href="{{route('vacaciones_pendientes_aprobacion_presidencia')}}"> <h6 class="card-title">Aprobación Vacaciones Presidente(a) </h6>
                        <img src="{{url('/img/con_vacacion.jpeg')}}" class="card-img-top">
                      </a>
                      </div>
                    </div>
                    
                  @endif  
                  @if(in_array( Auth::user()->id_usuariogrupo, array(12,16,9)))
                    <div class="card bg-light mb-6" style="max-width: 14rem;">
                    
                      <div class="card-body">
                      <a href="{{route('vac_colectivas_rrhh')}}"> <h6 class="card-title">Vacaciones Colectivas</h6>
                        <img src="{{url('/img/colectivas.png')}}" class="card-img-top">
                      </a>
                      </div>
                    </div>                    
                  @endif  
                  @endif  
                  </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@endsection