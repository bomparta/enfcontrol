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
                <form id="formulario" name="formulario" method="post" action="{{route('registrarestudios_act')}}">
                    <table  align="center" border="0" cellpadding="5" cellspacing="5" width="100%" >
                    <tr>
                            <td colspan="4">
                                <div class="col-12 text-center">
                
                                    <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('educacionfuncionario')}}">Nivel de Instrucción</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link active"  href="{{route('estudios_actfuncionario')}}">Estudios Actuales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('cursos_funcionario')}}">Cursos Realizados</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{route('idiomas_funcionario')}}">Idiomas</a>
                                    </li>
                                    </ul>
                                        
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <b>Suministre sus datos de los <span style="color:gray; ">Estudios Actuales</span>, haga clic en "Guardar" para registrar su información <b>
                                    <hr> 
                                    @include('rrhh.funcionario.mensaje')  
                             
                                </div>
                            </td>
                        </tr>
                    
                    </tr>

                    @if (count($funcionario)>0)   
                    @foreach($funcionario as $key=>$item)       
                    <input id="id_funcionario" type="hidden" name="id_funcionario" value="{{$item->funcionario_id}}" >
                    @csrf
                    <tr>
                        <td colspan="2"> 
                        <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top"> &nbsp;¿Estudia actualmente?&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <select id="estudia" name="estudia"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                           
                                            <option value="1" @if($item->estudia==1) selected @endif >SI</option>
                                            <option value="2"@if($item->estudia==2) selected @endif >NO</option>                                        
                                    </select>                       
                        </td>
                        <td colspan="2"> 
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Nivel que cursa&nbsp;</span>
                            <input type="text" class="form-control"name="nivel_curso" id="nivel_curso" onkeyup="mayusculas(this);" value="{{$item->nivel_cursa}}"  maxlength="200" size="50" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"> 
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> &nbsp;Especialidad&nbsp;&nbsp;</span>
                            <input type="text" class="form-control" name="especialidad" id="especialidad" onkeyup="mayusculas(this);" value="{{$item->especialidad}}"  maxlength="200" size="50"  />
                        </td>
                        <td colspan="2"> 
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Nombre de la institución donde estudia&nbsp;</span>
                            <input type="text" class="form-control"name="universidad" id="universidad" onkeyup="mayusculas(this);" value="{{$item->institucion_estudia}}"  maxlength="200" size="50" />
                        </td>
                    </tr>   
                    @endforeach
                    </table> 
                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Guardar" >
                    </div>
                    @else
                    </table> 
                    <div class="frameContenedor" style="margin:5px;"align="center">
                           <h2 aling="center"><b>DEBE COMPLETAR LOS DATOS BÁSICOS</b></h2>
                        </div>
                    @endif                  
                   
                    
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