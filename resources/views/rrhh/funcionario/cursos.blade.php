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
                                    <b>Suministre sus datos de los <span style="color:gray;">Cursos Realizados</span> de adiestramiento,seminarios, entrenamientos especiales, haga clic en "Guardar" para registrar su información <b>
                                    <hr>   
                                </div>
                            </td>
                        </tr>
                    
                    <tr> 
                        
                        <td>
                            &nbsp;Nombre del Curso&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="nommbre_curso" id="nommbre_curso" value="" style="width:190px;" maxlength="25"/>
                        </td>
                        <td>
                            &nbsp;Nombre de la Institución&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text"class="form-control" required name="institucion_curso" id="institucion_curso" value="" style="width:190px;" maxlength="100"/>
                        </td>
                        <td>
                            &nbsp;Dirección Referencial&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"  required name="dir_ref_curso" id="dir_ref_curso" maxlength="200" value=""/>
                        </td>
                        </tr>
                    <tr> 
                        <td>
                            &nbsp;Fecha de Inicio&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" required name="fechainicio_curso" id="fechainicio_curso" value="" style="width:190px;"/>
                        </td>
                        <td>
                            &nbsp;Fecha de Culmincación&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" required name="fechaculminacion_curso" id="fechaculminacion_curso" value="" style="width:190px;" />
                        </td>
                    </tr>
                    <tr> 
                    <td >
                   
                    </td>
                   
                    </table>

                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Registrar Curso" >
                    </div>

                    <div class="table-responsive mt-3">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">                        
                            <thead>
                                <tr>
                                    <th>Nombre del Curso</th>
                                    <th>Nombre de la Institución</th>
                                    <th>Dirección Referencial</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha de Culminación</th>
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                        <th>Opcion</th>
                                    @endif
                                </tr>
                            </thead>    
                            <tbody>                              
                                <tr>                                                    
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                            <td class="text-center">
                                            <a href= "#" class="btn btn-info" data-tip="Detalle" title="Actualizar Curso" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
                                            </a>
                                            </td>
                                        @endif                                                            
                                    </tr>
                            
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nombre del Curso</th>
                                    <th>Nombre de la Institución</th>
                                    <th>Dirección Referencial</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha de Culminación</th>
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                        <th>Opcion</th>
                                    @endif
                                    
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection