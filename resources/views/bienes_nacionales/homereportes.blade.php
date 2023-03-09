@extends('layouts.app')
@section ('content') 
<div class="container">
    <div class="row justify-content-start">

     <div class="col-12 text-center">
     <h4 class="text-primary" >REGISTRO Y CONTROL DE BIENES NACIONALES</h4>        

     <h6 class="text-dark">Bienvenid@, {{Auth::user()->name}}</h6>

    </div>
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
        <div class="col-12 text-center">
            <hr>
     <h6 class="text-primary" >REPORTES</h6>        
    

    </div>
        <div class="card-columns">
                <div class="col ps-6">
                
                @if(in_array( Auth::user()->id_usuariogrupo, array(13,9) ))
                  <div class="card bg-light mb-6" style="max-width: 14rem;">
                      
                      <div class="card-body">
                        <a href="{{route('ficha')}}" ><h6 class="card-title">Ficha por Bien Nacional</h6>
                          <img src="{{url('/img/informacion_personalenf.jpeg')}}" class="card-img-bottom" >
                        </a>
                      </div>
                    </div>                       
                  @endif  
                  @if(in_array( Auth::user()->id_usuariogrupo, array(13,9) ))
                  <div class="card bg-light mb-6" style="max-width: 14rem;">
                     
                      <div class="card-body">
                        <a href="{{route('adm')}}" ><h6 class="card-title">Ubicación Administrativa</h6>
                          <img src="{{url('/img/bienes_ubi_adm.jpeg')}}" class="card-img-bottom" >
                        </a>
                      </div>
                    </div>                      
                  @endif 
                
                
                  @if(in_array( Auth::user()->id_usuariogrupo, array(13,9) ))
                  <div class="card bg-light mb-6" style="max-width: 14rem;">
                     
                      <div class="card-body">
                        <a href="{{route('activos')}}" ><h6 class="card-title">Bienes Nacionales Activos</h6>
                          <img src="{{url('/img/mov_bienes.jpg')}}" class="card-img-bottom" >
                        </a>
                      </div>
                    </div>                       
                  @endif 
                  @if(in_array( Auth::user()->id_usuariogrupo, array(13,9) ))
                  <div class="card bg-light mb-6" style="max-width: 14rem;">
                     
                      <div class="card-body">
                        <a href="{{route('desincorporados')}}" ><h6 class="card-title">Bienes Nacionales Desincorporados</h6>
                          <img src="{{url('/img/desin_bienes.jpg')}}" class="card-img-bottom" >
                        </a>
                      </div>
                    </div>                       
                  @endif 
                  
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection