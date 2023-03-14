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
                                <b> @if($tipo_documento!='adm_pub_constancia')REQUISITOS DIGITALIZADOS MOVIMIENTO DE PERSONAL @endif
                                @if($tipo_documento=='adm_pub_constancia')REQUISITOS DIGITALIZADOS ANTECEDENTES DE SERVICIO EN LA ADMINISTRACIÓN PÚBLICA @endif
                                </b>
                    </div>
                    <div id="divSubTituloIndex2">
                    <label class="text-primary"><b> 
                                                    @if($tipo_documento=='rrhh_mov')CONTRATO, RESOLUCIÖN Y/U OTRO DOCUMENTO QUE VALIDE EL MOVIMIENTO @endif
                                                    @if($tipo_documento=='carta_renuncia')CARTA DE RENUNCIA VOLUNTARIA DEL TRABAJADOR(A) @endif
                                                    @if($tipo_documento=='aprob_renuncia')APROBACIÓN DE LA RENUNCIA @endif
                                                    @if($tipo_documento=='adm_pub_constancia')CONSTANCIA O ANTECEDENTE DE SERVICIO @endif
                                                  
                    </b>
                
                    </label>
                                    <hr>
                                    <b>Seleccione el <span style="color:gray;">Requisito </span>y/o documentos desde su dispositivo de almacenamiento, haga clic en "Examinar " y seleccione el archivo, posteriormente haga clic en  "Cargar Archivo" para para registrar su información <b>
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                                </div>
                    <form method="POST" action="{{route('subirarchivo_rrhh')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="tipo_documento" id="tipo_documento" value="{{$tipo_documento}}" required>
                        <input type="hidden" name="rrhh_mov_id" id="rrhh_mov_id" value="{{$id_rrhh_mov}}" required>
                        <input type="hidden" name="cedula" id="cedula" value="{{$cedula}}" required>
                        <div class="frameContenedor" style="margin:5px;" align="center">
                            <label for="archivo"><b>Seleccione el Archivo deseado: </b></label>
                            <input type="file" name="archivo" required><br><br>
                            <input class="btn btn-info" type="submit" value="Cargar Archivo" >
                        </div>
                        <div class="frameContenedor" style="margin:5px;" align="right">
                        @if($tipo_documento!='adm_pub_constancia')<a class='btn btn-secondary' href="/rrhh/movimientos/{{$cedula}}">Regresar</a> @endif
                    @if($tipo_documento=='adm_pub_constancia') <a class='btn btn-secondary' href="/rrhh/registrar_adm_publica_edit/{{$id_rrhh_mov}}/{{$cedula}}">Regresar</a> @endif
                    </div>
                    <div class="frameContenedor" style="margin:5px;" align="center">
                    <label for="datospersonales">
                        @foreach($rrhh as  $key=>$rrhh)
                    <span style="color:gray;"> Cédula de IdentidadN°: </span>{{$cedula}}   
                    <br>
                    <span style="color:gray;"> Nombre(s) y Apellido(s): </span>{{$rrhh->nombre}}  {{$rrhh->nombreseg}} {{$rrhh->apellido}}   {{$rrhh->apellidoseg}}      
                    <br>
                    @if($tipo_documento!='adm_pub_constancia') 
                    <span style="color:gray;"> Cargo: </span>{{$rrhh->cargo_mov}} 
                    <br>
                    <span style="color:gray;"> Tipo movimiento: </span>{{$rrhh->tipo_mov}}   
                    @endif
                    <br>
                    <span style="color:gray;"> Tipo Trabajador: </span>{{$rrhh->tipo_trabajador}}      
                    @if($tipo_documento!='adm_pub_constancia') 
                    <br>
                    <span style="color:gray;"> Unidad Administrativa: </span>{{$rrhh->ubic_administrativa}}                   
                    @endif
                    @if($tipo_documento=='adm_pub_constancia') 
                    <br>                    
                    <span style="color:gray;"> Organismo o Institución Pública donde prestó servicios: </span>{{$rrhh->organismo}}                   
                    <br>
                    <span style="color:gray;"> Último Cargo Desempeñado: </span>{{$rrhh->ult_cargo}}                   
                    @endif
                        @endforeach
                   </label><br> 
                   @if (!empty($rrhh_mov[0]) )             
                   <hr>
                   
                            <label for="archivo"><b>Documento Cargado </b></label>
                            <img src="{{url('img/icon/check.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"> <a href= "{{ Storage::url( $rrhh_mov[0]->ruta) }}" target="_new">
                                                   Ver Documento  
                   @endif
                    
                   
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