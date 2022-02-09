@extends('layouts.app')
@section('title', 'Cantidades')
@section ('content')
<div class="d-flex" id="wrapper">
    @include('layouts.appevento')

    <div id="page-content-wrapper">
<div class="container pb-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
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
                                        Suministre sus direccion, haga clic en "Guardar" .
                                    </div>
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
                            <!-- FILA 2 -->
                            <tr>
                                <td>
                                    &nbsp;Ciudad / Urbanizaci&oacute;n&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="urbanizacion" id="urbanizacion" value="" style="width:190px;" maxlength="100"  />
                                </td>
                                <td>
                                    &nbsp;Calle/Avenida&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                                    <input type="text" name="calleAv" id="calleAv" value="" style="width:190px;" maxlength="100"  />
                                </td>
                                <td>
                                    &nbsp;Nombre Casa o Edificio&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="nombreCasaApto" id="nombreCasaApto" value=""  style="width:190px;" maxlength="100"  />
                                </td>
                            </tr>
                                                
                      </table>
                          
                         <div class="frameContenedor" style="margin:5px;" align="right">
                            <a class='btn btn-info' href="{{URL::route('experienciaestudiante')}}" >Guardar y Continuar</a>
                        </div>
                    </form>

                </div>
            </div> <!-- card -->
        </div>
    </div> <!-- row -->
</div>

</div> <!-- row -->
</div> 

@endsection