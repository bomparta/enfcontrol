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
                                    <a class="nav-link active" href="{{route('educacionfuncionario')}}">Nivel de Instrucción</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link "  href="{{route('estudios_actfuncionario')}}">Estudios Actuales</a>
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
                                    <b>Suministre sus datos de <span style="color:gray;">Nivel de Instrucción</span>, haga clic en "Guardar" para actualizar su información <b>
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')   
                                </div>
                            </td>
                        </tr>
                        </table>
                        <table>
                        <form id="formulario" name="formulario" method="post" action="{{route('actualizareducacion')}}">                        
                    @if (count($educacion)>0)   
          @foreach($educacion as $key=>$item)       
         <input id="id_funcionario" type="hidden" name="id_funcionario" value="{{$funcionario_id}}" >
                            @csrf
                            <tr> 
                        <td class="table-primary" rowspan="2">&nbsp;<b>PRIMARIA</b> </td>
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Último Año Cursado&nbsp;</span>
                            <input type="text" class="form-control"  name="pri_ultimo_anno" id="pri_ultimo_anno"style="width:100%;"  onkeyup="mayusculas(this);" value="{{$item->pri_ult_anio}}" style="width:190px;" maxlength="25"/>
                        </td>
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">  &nbsp;Nombre de la Institución&nbsp;</span>
                            <input type="text"class="form-control"  name="institucion_pri" id="institucion_pri" style="width:100%;"onkeyup="mayusculas(this);" value="{{$item->institucion_pri}}" style="width:190px;" maxlength="100"/>
                        </td>
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> &nbsp;Dirección Referencial&nbsp;</span>
                            <input type="text" class="form-control"   name="dir_ref_pri" id="dir_ref_pri" maxlength="200" style="width:100%;" onkeyup="mayusculas(this);" value="{{$item->dir_ref_pri}}"/>
                        </td>
                        </tr>
                    <tr> 
                        <td>
                        <span data-tooltip="Indique una fecha del calendario" sdata-flow="top"> &nbsp;Fecha de Inicio&nbsp;</span>
                            <input type="date" class="form-control"  name="fechainicio_pri" id="fechainicio_pri" value="{{$item->fecha_ini_pri}}" style="width:190px;"/>
                        </td>
                        <td>
                        <span data-tooltip="Indique una fecha del calendario" sdata-flow="top">   &nbsp;Fecha de Culminación&nbsp;</span>
                            <input type="date" class="form-control"  name="fechaculminacion_pri" id="fechaculminacion_pri" value="{{$item->fecha_fin_pri}}" style="width:190px;" />
                        </td>
                    </tr>
                    <tr> 
                    <td >
                   
                    </td>
                    </tr>
                    <td class="table-primary" rowspan="2">&nbsp;<b>SECUNDARIA</b> </td>
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> &nbsp;Último Año Cursado&nbsp;</span>
                            <input type="text" class="form-control"  name="sec_ultimo_anno" id="sec_ultimo_anno" style="width:100%;"onkeyup="mayusculas(this);" value="{{$item->sec_ult_anio}}" style="width:190px;" maxlength="25"/>
                        </td>
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> &nbsp;Nombre de la Institución&nbsp;</span>
                            <input type="text" class="form-control"  name="institucion_sec" id="institucion_sec" style="width:100%;"onkeyup="mayusculas(this);"value="{{$item->institucion_sec}}" style="width:190px;" maxlength="100"/>
                        </td>
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">    &nbsp;Dirección Referencial&nbsp;</span>
                            <input type="text" class="form-control" rows="2"  name="dir_ref_sec" id="dir_ref_sec" style="width:100%;"maxlength="200" onkeyup="mayusculas(this);"value="{{$item->institucion_sec}}"/>
                        </td>
                        </tr>
                        <tr> 
                        <td>
                        <span data-tooltip="Indique una fecha del calendario" sdata-flow="top">   &nbsp;Fecha de Inicio&nbsp;</span>
                            <input type="date" class="form-control"  name="fechainicio_sec" id="fechainicio_sec" value="{{$item->fecha_ini_sec}}" style="width:190px;" />
                        </td>
                        <td>
                        <span data-tooltip="Indique una fecha del calendario" sdata-flow="top"> &nbsp;Fecha de Culminación&nbsp;</span>
                            <input type="date" class="form-control"  name="fechaculminacion_sec" id="fechaculminacion_sec" value="{{$item->fecha_fin_sec}}" style="width:190px;" />
                        </td>
                    </tr>                    
                    </tr>
                    <tr> 
                    <td >
                    
                    </td>
                    </tr> 
                    <tr>
                    <td class="table-primary" rowspan="2">&nbsp;<b>TÉCNICA SUPERIOR</b> </td>
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Último Año Cursado&nbsp;</span>
                            <input type="text" class="form-control"  name="tec_ultimo_anno" id="tec_ultimo_anno" style="width:100%;" onkeyup="mayusculas(this);" value="{{$item->tec_ult_anio}}" style="width:190px;" maxlength="25"/>
                        </td>
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Nombre de la Institución&nbsp;</span>
                            <input type="text" class="form-control" name="institucion_tec"  id="institucion_tec" style="width:100%;" onkeyup="mayusculas(this);" value="{{$item->institucion_tec}}" style="width:190px;" maxlength="100"/>
                        </td>
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> &nbsp;Dirección Referencial&nbsp;</span>
                            <input type="text" class="form-control"  name="dir_ref_tec" id="dir_ref_tec" style="width:100%;" onkeyup="mayusculas(this);" value="{{$item->dir_ref_tec}}" maxlength="200"/>
                        </td>
                        </tr>
                        <tr>
                        <td>
                        <span data-tooltip="Indique una fecha del calendario" sdata-flow="top">  &nbsp;Fecha de Inicio&nbsp; </span>
                            <input type="date" class="form-control"  name="fechainicio_tec" id="fechainicio_tec" value="{{$item->fecha_ini_tec}}" style="width:190px;" />
                        </td>
                        <td>
                        <span data-tooltip="Indique una fecha del calendario" sdata-flow="top">  &nbsp;Fecha de Culminación&nbsp;</span>
                            <input type="date" class="form-control"  name="fechaculminacion_tec" id="fechaculminacion_tec" value="{{$item->fecha_fin_tec}}" style="width:190px;" />
                        </td>
                    </tr>
                    <tr> 
                    <td >
                 
                    </td>
                    </tr>
                    <tr> 
                    <td class="table-primary" rowspan="2">&nbsp;<b>UNIVERSITARIA</b> </td>
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> &nbsp;Último Año Cursado&nbsp;</span>
                            <input type="text" class="form-control" name="uni_ultimo_anno" id="uni_ultimo_anno" style="width:100%;" onkeyup="mayusculas(this);" value="{{$item->uni_ult_anio}}" style="width:190px;" maxlength="25"/>
                        </td>
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> &nbsp;Nombre de la Institución&nbsp;</span>
                            <input type="text" class="form-control"  name="institucion_uni" id="institucion_uni" style="width:100%;" onkeyup="mayusculas(this);" value="{{$item->institucion_uni}}" style="width:190px;" maxlength="100"/>
                        </td>
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Dirección Referencial&nbsp;</span>
                            <input type="text" class="form-control"  name="dir_ref_uni" id="dir_ref_uni" style="width:100%;" onkeyup="mayusculas(this);" value="{{$item->dir_ref_uni}}" maxlength="200"/>
                        </td>
                    </tr>
                    <tr>
                   
                        <td>
                        <span data-tooltip="Indique una fecha del calendario" sdata-flow="top">   &nbsp;Fecha de Inicio&nbsp;</span>
                            <input type="date" class="form-control"   name="fechainicio_uni" id="fechainicio_uni" value="{{$item->fecha_ini_uni}}" style="width:190px;"/>
                          
                        </td>
                        <td>
                        <span data-tooltip="Indique una fecha del calendario" sdata-flow="top">  &nbsp;Fecha de Culminación&nbsp;</span>
                            <input type="date" class="form-control"   name="fechaculminacion_uni" id="fechaculminacion_uni" value="{{$item->fecha_fin_uni}}" style="width:190px;"/>
                        </td>
                    </tr>
                    
                    
                    </table>
                      <table class=""align="center" border="0" cellpadding="2" cellspacing="5" width="100%" >
                   
                    <tr>
                        <td colspan="4"> 
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> &nbsp;Profesión u Ocupación&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"name="profesion" id="profesion" style="width:100%;" onkeyup="mayusculas(this);" value="{{$item->profesion_ocup}}"  maxlength="200" size="50" class="form-control" required/>
                        </td>
                        <td colspan="4"> 
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> &nbsp;En caso de haber culminado otros estudios de alto nivel técnico o universitario, indique Titulos obtenidos:&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"name="otros_estudios" id="otros_estudios" style="width:100%;" onkeyup="mayusculas(this);"  value="{{$item->otros_estudios}}"  maxlength="200" size="50" />
                        </td>
                        
                    </tr>   
                    
                  
                    @endforeach
                    </table>
                    @else
                    @include('rrhh.funcionario.educacion')   
                    @endif     
                         
                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Guardar" >
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