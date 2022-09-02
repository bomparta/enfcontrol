@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
        @include('layouts.apprrhh')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
            <div class="card">
                <div class="card-body">
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
 




                </div>
            </div> <!-- card -->
        </div>
    </div> <!-- row -->
</div>

</div> <!-- row -->
</div>
@endsection