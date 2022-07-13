@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
    @include('layouts.apprrhh')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
            <div align="center" id="divTituloIndex2" class="text-primary">
               
                <b>INSTRUCCIÓN FORMAL Y COMPLEMENTARIA</b>
                </div>
                <form id="formulario" name="formulario" method="post" action="#">
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
                                    <b>Suministre sus datos de <span style="color:gray;">Nivel de Instrucción</span>, haga clic en "Guardar" para registrar su información <b>
                                    <hr>   
                                </div>
                            </td>
                        </tr>
                    
                    <tr> 
                        <td class="table-primary" rowspan="2">&nbsp;<b>PRIMARIA</b> </td>
                        <td>
                            &nbsp;Último Año Cursado&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="pri_ultimo_anno" id="pri_ultimo_anno" value="" style="width:190px;" maxlength="25"/>
                        </td>
                        <td>
                            &nbsp;Nombre de la Institución&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text"class="form-control" required name="institucion_pri" id="institucion_pri" value="" style="width:190px;" maxlength="100"/>
                        </td>
                        <td>
                            &nbsp;Dirección Referencial&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"  required name="dir_ref_pri" id="dir_ref_pri" maxlength="200" value=""/>
                        </td>
                        </tr>
                    <tr> 
                        <td>
                            &nbsp;Fecha de Inicio&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" required name="fechainicio_pri" id="fechainicio_pri" value="" style="width:190px;"/>
                        </td>
                        <td>
                            &nbsp;Fecha de Culmincación&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" required name="fechaculminacion_pri" id="fechaculminacion_pri" value="" style="width:190px;" />
                        </td>
                    </tr>
                    <tr> 
                    <td >
                   
                    </td>
                    </tr>
                    <td class="table-primary" rowspan="2">&nbsp;<b>SECUNDARIA</b> </td>
                        <td>
                            &nbsp;Último Año Cursado&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="pri_ultimo_anno" id="pri_ultimo_anno" value="" style="width:190px;" maxlength="25"/>
                        </td>
                        <td>
                            &nbsp;Nombre de la Institución&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="institucion_pri" id="institucion_pri" value="" style="width:190px;" maxlength="100"/>
                        </td>
                        <td>
                            &nbsp;Dirección Referencial&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" rows="2" required name="dir_ref_sec" id="dir_ref_sec" maxlength="200"value=""/>
                        </td>
                        </tr>
                        <tr> 
                        <td>
                            &nbsp;Fecha de Inicio&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" required name="fechainicio_pri" id="fechainicio_pri" value="" style="width:190px;" />
                        </td>
                        <td>
                            &nbsp;Fecha de Culmincación&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" required name="fechaculminacion_pri" id="fechaculminacion_pri" value="" style="width:190px;" />
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
                            &nbsp;Último Año Cursado&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="pri_ultimo_anno" id="pri_ultimo_anno" value="" style="width:190px;" maxlength="25"/>
                        </td>
                        <td>
                            &nbsp;Nombre de la Institución&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" name="institucion_pri_tec" required id="institucion_pri_tec" value="" style="width:190px;" maxlength="100"/>
                        </td>
                        <td>
                            &nbsp;Dirección Referencial&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="dir_ref_tec" id="dir_ref_tec" value="" maxlength="200"/>
                        </td>
                        </tr>
                        <tr>
                        <td>
                            &nbsp;Fecha de Inicio&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" required name="fechainicio_pri_tec" id="fechainicio_pri_tec" value="" style="width:190px;" />
                        </td>
                        <td>
                            &nbsp;Fecha de Culmincación&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" required name="fechaculminacion_pri" id="fechaculminacion_pri" value="" style="width:190px;" />
                        </td>
                    </tr>
                    <tr> 
                    <td >
                 
                    </td>
                    </tr>
                    <tr> 
                    <td class="table-primary" rowspan="2">&nbsp;<b>UNIVERSITARIA</b> </td>
                        <td>
                            &nbsp;Último Año Cursado&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" requiredname="pri_ultimo_anno_uni" id="pri_ultimo_anno_uni" value="" style="width:190px;" maxlength="25"/>
                        </td>
                        <td>
                            &nbsp;Nombre de la Institución&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="institucion_uni" id="institucion_uni" value="" style="width:190px;" maxlength="100"/>
                        </td>
                        <td>
                            &nbsp;Dirección Referencial&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="dir_ref_uni" id="dir_ref_uni" value="" maxlength="200"/>
                        </td>
                    </tr>
                    <tr>
                   
                        <td>
                            &nbsp;Fecha de Inicio&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" required name="fechainicio_pri_uni" id="fechainicio_pri_uni" value="" style="width:190px;" />
                        </td>
                        <td>
                            &nbsp;Fecha de Culminación&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control"  required name="fechaculminacion_pri_uni" id="fechaculminacion_pri_uni" value="" style="width:190px;"/>
                        </td>
                    </tr>
                    </tr>
                    
                    
                    </table>
                      <table class=""align="center" border="0" cellpadding="2" cellspacing="5" width="100%" >
                   
                    <tr>
                        <td colspan="4"> 
                            &nbsp;Profesión u Ocupación&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"name="profesion" id="profesion" value=""  maxlength="200" size="50" class="form-control" required/>
                        </td>
                        <td colspan="4"> 
                            &nbsp;En caso de haber culminado otros estudios de alto nivel técnico o universitario, indique Titulos obtenidos:&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"name="dir_ref_uni" id="dir_ref_uni" value=""  maxlength="200" size="50" />
                        </td>
                        
                    </tr>   
                    
                    </table>
                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Guardar" >
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection