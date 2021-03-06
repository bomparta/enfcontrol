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
                                </div>
                            </td>
                        </tr>
                    
                    </tr>
                   
                   
                    <tr>
                        <td colspan="2"> 
                            &nbsp;¿Estudia actualmente?&nbsp;<span style="color:red;">*</span>&nbsp;
                            <select id="estudia" name="estudia"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1">SI</option>
                                            <option value="2">NO</option>                                        
                                    </select>                       
                        </td>
                        <td colspan="2"> 
                            &nbsp;Nivel que cursa<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control"name="nivel_curso" id="nivel_curso" value=""  maxlength="200" size="50" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"> 
                            &nbsp;Especialidad&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" name="especialidad" id="especialidad" value=""  maxlength="200" size="50" />
                        </td>
                        <td colspan="2"> 
                            &nbsp;Nombre de la institución donde estudia<span style="color:red;">*</span>&nbsp;
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