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
                        <input name="continuar" id="continuar" type="hidden" value=""/>
                    <!--	<div class="frame3">-->
                        <table align="center" border="0" cellpadding="2" cellspacing="5" width="100%" >
                            <!-- FILA 1 + FOTO -->
                            <tr>
                                <td colspan="4">
                                    <div align="center" id="divTituloIndex2">
                                           <b> DIRECCION</b>
                                    </div>
                                    <div id="divSubTituloIndex2">
                                        Suministre sus direccion, haga clic en "Guardar y Continuar" .
                                    </div>
                                    <br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;Estado de Residencia&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <select name="estado"   style="width:190px;">
                                        <option value="">Seleccione Estado</option>
                                        
                                    </select>
                                </td>
                                <td>
                                    &nbsp;Municipio de Residencia&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <select name="municipio" id="municipio"  style="width:190px;"  >
                                        <option value="">Seleccione un Municipio</option>
                                        
                                    </select>
                                </td>
                                <td>
                                    &nbsp;Parroquia de Residencia&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <select name="parroquia" id="parroquia" class="combo select2_single" style="width:190px;">
                                        <option value="">Seleccione una Parroquia</option>
                                       
                                    </select>
                                </td>
                                
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <!-- FILA 2 -->
                            <tr>
                                <td>
                                    &nbsp;Ciudad / Urbanizaci&oacute;n&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="urbanizacion" id="urbanizacion" value="" style="width:190px;" maxlength="100"  />
                                </td>
                                <td>
                                    &nbsp;Calle/Avenida&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="calleAv" id="calleAv" value="" style="width:190px;" maxlength="100"  />
                                </td>
                                <td>
                                    &nbsp;Nombre Casa o Edificio&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="nombreCasaApto" id="nombreCasaApto" value=""  style="width:190px;" maxlength="100"  />
                                </td>
                            </tr>
                                                
                      </table>
                          
                         <div class="frameContenedor" style="margin:5px;" align="right">
                            <a class='btn btn-info' href="" >Guardar y Continuar</a>
                        </div>
                    </form>

            </div>
        </div>
    </div>
</div>

@endsection