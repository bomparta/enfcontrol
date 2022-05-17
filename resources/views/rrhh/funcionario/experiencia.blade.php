@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
    @include('layouts.appcontrol')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">

                <div class="col-12 text-center">
                            <h1>Informacion</h1>
                </div>
                <form id="formulario" name="formulario" method="post" action="#">
                    <table align="center" border="0" cellpadding="2" cellspacing="5" width="100%" >
                    <tr>    
                        <td colspan="4">
                            <div align="center" id="divTituloIndex2">
                                           <b> DATOS EXPERIENCIA LABORAL</b>
                            </div>
                            <div id="divSubTituloIndex2">
                                        Suministre sus datos de experiencia laboral comenzando por su trabajo actual, haga clic en "Guardar".
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;Empresa u Organizacion&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" name="empresa" id="empresa" value="" style="width:190px;" maxlength="25"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;Cargo de desempeño&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" name="cargo" id="cargo" value="" style="width:190px;" maxlength="25" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;Fecha Ingreso&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" name="fechaingreso" id="fechaingreso" value="" style="width:190px;" maxlength="25"/>
                        </td>
                    <tr>
                    </tr>
                        <td>
                            &nbsp;Fecha de Egreso&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" name="fechaegreso" id="fechaegreso" value="" style="width:190px;" maxlength="25" />
                        </td>
                    </tr>
                    <tr>
                    <td>
                            &nbsp;Telefono&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" name="telefono" id="telefono" value="" style="width:190px;" maxlength="25"/>
                        </td>
                        <td></td>
                    </tr>
                    </table>
                    <div class="frameContenedor" style="margin:5px;" align="left">
                            <a class='btn btn-info' href="" >Guardar y Continuar</a>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>

@endsection