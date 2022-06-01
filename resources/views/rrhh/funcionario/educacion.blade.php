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
                    <table align="center" border="0" cellpadding="2" cellspacing="5" width="100%" >
                    <tr>
                            <td colspan="4">
                            <div class="col-12 text-center">
                                     
                                       <b>Nivel de Instrucción</b>
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <b>Suministre sus datos de nivel de instrucción, haga clic en "Guardar" para registrar su información <b>
                                    <hr>   
                                </div>
                            </td>
                        </tr>
                    
                    <tr>
                        <td>
                            &nbsp;PRIMARIA (Último Año Cursado)&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" name="fechaingreso" id="fechaingreso" value="" style="width:190px;" maxlength="25"/>
                        </td>
                   
                        <td>
                            &nbsp;SECUNDARIA (Último Año Cursado)&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" name="fechaingreso" id="fechaingreso" value="" style="width:190px;" maxlength="25"/>
                        </td>
                    
                    </tr>
                    <tr>
                        <td>
                            &nbsp;TÉCNICA, SUPERIOR (Último Año o Semestre Cursado)&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" name="fechaingreso" id="fechaingreso" value="" style="width:190px;" maxlength="25"/>
                        </td>
                    
                    </tr>
                    
                    
                    </table>
                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Agregar Familiar" >
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection