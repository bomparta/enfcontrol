@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="d-flex" id="wrapper">
        @include('layouts.apprrhh')
      
        <div id="page-content-wrapper">
            <div class="sidebar-heading text-center">
            <h4 class="text-primary" >CONTROL DE EXPEDIENTES RRHH</h6>   
            </a>
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
                                    <hr>
                                    <b>Seleccione el <span style="color:gray;">Requisito </span>y/o documentos desde su dispositivo de almacenamiento, haga clic en "Examinar " y seleccione el archivo, posteriormente haga clic en  "Cargar Archivo" para para registrar su información <b>
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                                </div>
                    <form method="POST" action="{{route('subirarchivo_familiar')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="tipo_documento" id="tipo_documento" value="{{$tipo_documento}}" required>
                        <input type="hidden" name="familiar_id" id="familiar_id" value="{{$id_familiar}}" required>
                       
                        <div class="frameContenedor" style="margin:5px;" align="center">
                            <label for="archivo"><b>Seleccione el Archivo deseado: </b></label>
                            <input type="file" name="archivo" required><br><br>
                            <input class="btn btn-info" type="submit" value="Cargar Archivo" >
                        </div>
                        <div class="frameContenedor" style="margin:5px;" align="right">
                 
                    <a class='btn btn-secondary' href="{{URL::route($ir)}}">Regresar</a> 
                    </div>
                    <div class="frameContenedor" style="margin:5px;" align="center">
                    <label for="datospersonales">
                        @foreach($familiar as  $key=>$fam)
                    <span style="color:gray;"> Nombre del Familiar: </span>{{$fam->nombre}} {{$fam->apellido}} 
                    <br>
                    <span style="color:gray;">  Parentezco:  </span> {{$fam->parentezco}} 
                    
                        @endforeach
                   </label><br>  <hr>
                   @if (!empty($cedula[0]) )             
                    
                   
                            <label for="archivo"><b>Documento Cargado </b></label>
                            <img src="{{url('img/icon/check.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"> <a href= "{{ Storage::url( $cedula[0]->ruta) }}" target="_new">
                                                   Ver Documento  
                   @endif
                    
                   @if(!empty($partida[0]))  
                    
                            <label for="archivo"><b>Documento Cargado </b></label>
                            <img src="{{url('img/icon/check.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"> <a href= "{{ Storage::url( $partida[0]->ruta) }}" target="_new">
                    
                            Ver Documento  
                    @endif
                     
                    </div>
                   
                      </form>
 




            </div> <!-- card -->
        </div>
    </div> <!-- row -->
</div>

</div> <!-- row -->
</div>
@endsection