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
                                <b> REQUISITOS DIGITALIZADOS MOVIMIENTO DE PERSONAL</b>
                    </div>
                    <div id="divSubTituloIndex2">
                    <label class="text-primary"><b> 
                                                    @if($tipo_documento=='rrhh_mov')CONTRATO, RESOLUCIÖN Y/U OTRO DOCUMENTO QUE VALIDE EL MOVIMIENTO @endif
                                                    @if($tipo_documento=='carta_renuncia')CARTA DE RENUNCIA VOLUNTARIA DEL TRABAJADOR(A) @endif
                                                    @if($tipo_documento=='aprob_renuncia')APROBACIÓN DE LA RENUNCIA @endif
                                                  
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
                   
                    <a class='btn btn-secondary' href="/rrhh/movimientos/{{$cedula}}">Regresar</a> 
                    </div>
                    <div class="frameContenedor" style="margin:5px;" align="center">
                    <label for="datospersonales">
                        @foreach($rrhh as  $key=>$rrhh)
                    <span style="color:gray;"> Cédula de IdentidadN°: </span>{{$cedula}}   
                    <br>
                    <span style="color:gray;"> Nombre(s) y Apellido(s): </span>{{$rrhh->nombre}}  {{$rrhh->nombreseg}} {{$rrhh->apellido}}   {{$rrhh->apellidoseg}}      
                    <br>
                    <span style="color:gray;"> Cargo: </span>{{$rrhh->cargo_mov}} 
                    <br>
                    <span style="color:gray;"> Tipo movimiento: </span>{{$rrhh->tipo_mov}}   
                    <br>
                    <span style="color:gray;"> Tipo Trabajador: </span>{{$rrhh->tipo_trabajador}}      
                    <br>
                    <span style="color:gray;"> Unidad Administrativa: </span>{{$rrhh->ubic_administrativa}}                   
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