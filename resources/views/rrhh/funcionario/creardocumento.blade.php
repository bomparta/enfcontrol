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
                                <b> REQUISITOS DIGITALIZADOS</b>
                    </div>
                    <div id="divSubTituloIndex2">
                    <label class="text-primary"><b> @if($tipo_documento=='foto')FOTOGRAFÏA TIPO CARNET FONDO BLANCO @endif
                                                    @if($tipo_documento=='cedula')CEDULA DE IDENTIDAD AMPLIADA Y A COLOR @endif
                                                    @if($tipo_documento=='partida_nac')PARTIDA DE NACIMIENTO DEL TRABAJADOR @endif
                                                    @if($tipo_documento=='matrimonio')ACTA DE MATRIMONIO Y/O CONCUBINATO @endif
                                                    @if($tipo_documento=='constancia_est')CONSTANCIA DE ESTUDIOS TRABAJADOR @endif
                                                    @if($tipo_documento=='horario')HORARIO DE CLASES TRABAJADOR @endif
                                                    @if($tipo_documento=='curriculum')CURRICULUM VITAE ACTUALIZADO @endif
                                                    @if($tipo_documento=='titulo')ÚLTIMO TITULO ACADÉMICO REGISTRADO OBTENIDO  @endif

                    </b>
                
                    </label>
                                    <hr>
                                    <b>Seleccione el <span style="color:gray;">Requisito </span>y/o documentos desde su dispositivo de almacenamiento, haga clic en "Examinar " y seleccione el archivo, posteriormente haga clic en  "Cargar Archivo" para para registrar su información <b>
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                                </div>
                    <form method="POST" action="{{route('subirarchivo')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="tipo_documento" id="tipo_documento" value="{{$tipo_documento}}" required>
                       
                       
                        <div class="frameContenedor" style="margin:5px;" align="center">
                            <label for="archivo"><b>Seleccione el Archivo deseado: </b></label>
                            <input type="file" name="archivo" required><br><br>
                            <input class="btn btn-info" type="submit" value="Cargar Archivo" >
                        </div>
                        <div class="frameContenedor" style="margin:5px;" align="right">
                   
                    <a class='btn btn-secondary' href="{{URL::route('requisitos')}}">Regresar</a> 
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