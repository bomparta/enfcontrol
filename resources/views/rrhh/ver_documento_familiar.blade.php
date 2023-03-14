
@extends('layouts.app')
@section('styles')
@endsection
@section('content')
<div class="d-flex" id="wrapper">
        @include('layouts.apprrhh')      
    <div id="page-content-wrapper">
        <div class="sidebar-heading text-center">
            <h4 class="text-primary" >CONTROL DE EXPEDIENTES RRHH</h6>      
            <h6 class="text-dark">Bienvenid@, {{Auth::user()->name}}</h6>
        </div>   
            <div class="container pb-4">
                 <div class="row align-items-stretch">
                        <div class="col-12">
                            <div class="card mb-4">
                    <div align="center" id="divTituloIndex2" class="text-primary">
                                <b> REQUISITOS DIGITALIZADOS FAMILIARES</b>
                    </div>
                    <div id="divSubTituloIndex2">
                    <label class="text-primary"><b> 
                                                    @if($tipo_documento=='cedula_familiar')CEDULA DE IDENTIDAD AMPLIADA Y A COLOR @endif
                                                    @if($tipo_documento=='partida_nac_familiar')PARTIDA DE NACIMIENTO DEL HIJO/HIJA @endif
                    </b>
                
                    </label>
                                    
                                </div>
                    <form method="POST" action="#" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="tipo_documento" id="tipo_documento" value="{{$tipo_documento}}" required>
                        <input type="hidden" name="familiar_id" id="familiar_id" value="{{$id_familiar}}" required>
             
                    <div class="frameContenedor" style="margin:5px;" align="center">
                    <label for="datospersonales">
                        @foreach($familiar as  $key=>$fam)
                    <span style="color:gray;"> Nombre del Familiar: </span>{{$fam->nombre}} {{$fam->apellido}} 
                    <br>
                    <span style="color:gray;">  Parentezco:  </span> {{$fam->parentezco}} 
                    
                        @endforeach
                   </label><br>  <hr>
                   @if (!empty($req_fam[0]) )          
                    
                   
                            <label for="archivo"><b>Documento Cargado </b></label>
                            <img src="{{url('img/icon/check.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"> <a href= "{{ Storage::url( $req_fam[0]->ruta) }}" target="_new">
                                                   Ver Documento  
                    @else
                    <img src="{{url('img/imagen/cedula.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"/><span class='btn-info badge'><font color='red'>Pendiente</font></span> 
                   @endif
                 
                   
                
                    </div>
                    <div class="frameContenedor" style="margin:5px;" align="right">
                 
                    <a class='btn btn-secondary' href="{{URL::route('ver_trabajador')}}">Regresar</a> 
                    </div>                   
                      </form>
 




            
            </div> <!-- card -->
        </div>
    </div> <!-- row -->
</div>

</div> <!-- row -->
</div>
@endsection