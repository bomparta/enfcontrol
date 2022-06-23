@extends('layouts.app')
@section ('content')
<div class="container">
    <div class="row justify-content-start">  
      <div class="col-12 text-center">
      <h4 class="text-primary" >CONTROL DE EXPEDIENTES RRHH</h6>   
    
</a>
      <h6 class="text-dark">Bienvenid@, {{Auth::user()->name}}</h6>
    </div>
    <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
      <div class="card-columns">
        <div class="col ps-6">
          <div class="card bg-light mb-6" style="max-width: 12rem;">                   
              <div class="card-body">
                <a href="{{route('buscarfuncionario')}}#" ><h6 class="card-title">Datos <br> Personales</h6>
                  <img src="{{url('/img/datos.png')}}" class="card-img-bottom">
                </a>
              </div>
            </div>
            <div class="card bg-light mb-6" style="max-width: 12rem;">                    
              <div class="card-body">
              <a href="{{route('familiarfuncionario')}}" > <h6 class="card-title">Datos del Grupo Familiar</h6>
                <img src="{{url('/img/familia.jpeg')}}" class="card-img-top"  >
              </a>
              </div>
            </div>
            <div class="card bg-light mb-6" style="max-width: 12rem;">                    
              <div class="card-body">
              <a href="{{route('educacionfuncionario')}}" > <h6 class="card-title">Instrucción Formal y Complementaria</h6>
                <img src="{{url('/img/estudio.png')}}" class="card-img-top"   >
              </a>
              </div>
            </div>
            <div class="card bg-light mb-6" style="max-width: 12rem;">                    
              <div class="card-body">
              <a href="{{route('laboralfuncionario')}}" > <h6 class="card-title">Experiencia <br>  Laboral</h6>
                <img src="{{url('/img/laboral.png')}}" class="card-img-top"   >
              </a>
              </div>
            </div>
            <div class="card bg-light mb-6" style="max-width: 12rem;">                    
              <div class="card-body">
                <a href="{{route('requisitos')}}" > <h6 class="card-title">Requisitos <br> Digitalizados </h6>
                  <img src="{{url('/img/requisitos_di.jpeg')}}" class="card-img-top"   >
                </a>
              </div>
            </div>
            <div class="card bg-light mb-6" style="max-width: 12rem;">                    
              <div class="card-body">
              <a href="{{route('planillarrhh')}}" > <h6 class="card-title">Planilla de Actualización de Datos</h6>
                <img src="{{url('/img/cv.jpeg')}}" class="card-img-top" title="Descargar Planilla de Actualización"  >
              </a>
              </div>
            </div> 
      </div>
    </div>  
  </div>        


@endsection