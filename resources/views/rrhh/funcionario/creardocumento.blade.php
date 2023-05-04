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
                                                    @if($tipo_documento=='rif')COMPROBANTE DE REGISTRO ÚNICO DE INFORMACIÓN FISCAL (RIF) ACTUALIZADO  @endif
                                                    @if($tipo_documento=='carnet_mp')CARNET DE TRABAJO DEL MINISTERIO PÚBLICO @endif

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
 





            </div> <!-- card -->
        </div>
    </div> <!-- row -->
</div>

</div> <!-- row -->
</div>
@endsection