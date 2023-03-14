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
               
                <b>INSTRUCCIÓN FORMAL Y COMPLEMENTARIA</b>
                </div>
            
                    <table  align="center" border="0" cellpadding="5" cellspacing="2" width="100%" >
                    <tr>
                            <td colspan="4">
                            <div class="col-12 text-center">
                
                                <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('educacionfuncionario')}}">Nivel de Instrucción</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link "  href="{{route('estudios_actfuncionario')}}">Estudios Actuales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{route('cursos_funcionario')}}">Cursos Realizados</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('idiomas_funcionario')}}">Idiomas</a>
                                </li>
                                </ul>
                                     
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <b>Suministre sus datos del <span style="color:gray;">Curso Realizado</span> de adiestramiento,seminarios, entrenamientos especiales, haga clic en "Guardar" para actualizar su información <b>
                                    <hr>  
                                    @include('rrhh.funcionario.mensaje')   
                                </div>
                            </td>
                        </tr>
                        </table>
                       
                       <table>
               <form id="formulario" name="formulario" method="post" action="{{route('actualizarcursos')}}">
               
               @foreach($cursos as $key=>$item)
                <input id="id_curso" type="hidden" name="id_curso" value="{{$item->id}}" >
                @csrf

                    <tr> 
                        
                        <td>
                            &nbsp;Nombre del Curso&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="nommbre_curso" id="nommbre_curso" onkeyup="mayusculas(this);"  value="{{$item->nommbre_curso}}" maxlength="25"/>
                        </td>
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> &nbsp;Nombre de la Institución&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="text"class="form-control" required name="institucion_curso" id="institucion_curso" onkeyup="mayusculas(this);" value="{{$item->institucion_curso}}"  maxlength="100"/>
                        </td>
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Dirección Referencial&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"  required name="dir_ref_curso" id="dir_ref_curso" onkeyup="mayusculas(this);"  maxlength="200" value="{{$item->dir_ref_curso}}"/>
                        </td>
                        </tr>
                    <tr> 
                        <td>
                        <span data-tooltip="Indique una fecha del calendario" sdata-flow="top"> &nbsp;Fecha de Inicio&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" required name="fechainicio_curso" id="fechainicio_curso" value="{{$item->fechainicio_curso}}" style="width:190px;"/>
                        </td>
                        <td>
                        <span data-tooltip="Indique una fecha del calendario" sdata-flow="top">&nbsp;Fecha de Culmincación&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" required name="fechaculminacion_curso" id="fechaculminacion_curso" value="{{$item->fechaculminacion_curso}}" style="width:190px;" />
                        </td>
                    </tr>
              @endforeach
                   
                    </table>

                    <div class="frameContenedor" style="margin:5px;" align="right">
                    <input class='btn btn-info' type="submit" value="Guardar" >
                    <a class='btn btn-secondary' href="{{URL::route('cursos_funcionario')}}">Regresar</a> 
                    </div>
                   
                   </div>
                </form>
                </div>
        </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script src="{{url('js/funciones_generales.js')}}"></script>
@endsection
