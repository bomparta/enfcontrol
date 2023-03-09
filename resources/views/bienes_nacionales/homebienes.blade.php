@extends('layouts.app')
@section ('content') 
<div class="container">
    <div class="row justify-content-start">  
     <div class="col-12 text-center">
     <h4 class="text-primary" >REGISTRO Y CONTROL DE BIENES NACIONALES</h6>        
    </a>
     <h6 class="text-dark">Bienvenid@, {{Auth::user()->name}}</h6>
    </div>

    <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
      <div class="card-columns">
        <div class="col ps-6">                
          @if(in_array( Auth::user()->id_usuariogrupo, array(13,9) ))
            <div class="card bg-light mb-6" style="max-width: 14rem;">
                <div class="card-header text-secondary">INCORPORACIÓN BIENES</div>
                <div class="card-body">
                  <a href="{{route('bienes')}}" ><h6 class="card-title">Registrar Ficha</h6>
                    <img src="{{url('/img/registro.jpeg')}}" class="card-img-bottom" >
                  </a>
                </div>
              </div>                       
            @endif              
          
          @if(in_array( Auth::user()->id_usuariogrupo, array(13,9) ))
            <div class="card bg-light mb-6" style="max-width: 14rem;">
                <div class="card-header text-secondary">MOVIMIENTOS BIENES</div>
                <div class="card-body">
                  <a href="{{route('mov_bienes')}}" ><h6 class="card-title">Registrar Movimientos</h6>
                    <img src="{{url('/img/mov_bienes.jpg')}}" class="card-img-bottom" >
                  </a>
                </div>
              </div>                       
            @endif  
            @if(in_array( Auth::user()->id_usuariogrupo, array(13,9) ))
            <div class="card bg-light mb-6" style="max-width: 14rem;">
                <div class="card-header text-secondary">DESINCORPORACIÖN BIENES</div>
                <div class="card-body">
                  <a href="{{route('desin_bienes')}}" ><h6 class="card-title">Registrar Desincorporación</h6>
                    <img src="{{url('/img/des_bienes.jpg')}}" class="card-img-bottom" >
                  </a>
                </div>
              </div>                       
            @endif  
            
            @if(in_array( Auth::user()->id_usuariogrupo, array(13,9) ))
            <div class="card bg-light mb-6" style="max-width: 14rem;">
                <div class="card-header text-secondary">REPORTES</div>
                <div class="card-body">
                  <a href="{{route('reportes_bienes')}}" ><h6 class="card-title"></h6>
                    <img src="{{url('/img/requisitos.jpeg')}}" class="card-img-bottom" >
                  </a>
                </div>
              </div>      
                              
            @endif 
          
        </div>
      </div>
    </div>
</div>

@endsection