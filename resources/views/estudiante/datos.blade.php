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
                                            DATOS BÁSICOS
                                    </div>
                                    <div id="divSubTituloIndex2">
                                        Suministre sus datos básicos, haga clic en "Guardar" y posteriormente suba su foto.
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;Cedula&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <input disabled type="text" name="cedulaT" id="cedulaT" value="" style="width:190px;" maxlength="8" onKeyPress="return valText(this.value, event, 'int');" class="campoTexto"/>
                                    <input type="hidden" name="cedula" id="cedula" value="" />
                                </td>
                                <td>
                                    &nbsp;Nombres&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <input type="text" name="nombres" id="nombres" value="" style="width:190px;" maxlength="100" class="campoTexto" onKeyUp="this.value = this.value.toUpperCase();"/>
                                </td>
                                <td>
                                    &nbsp;Apellidos&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <input type="text" name="apellidos" id="apellidos" value="" style="width:190px;"  maxlength="100" class="campoTexto" onKeyUp="this.value = this.value.toUpperCase();"/>
                                </td>
                                <td width="30%" rowspan="7" >
                                    <div align="center">
                                        <h1>Foto tipo Carnet</h1>
                                    </div>
                                    <div class="frameContenedor" style="width: 250px;" align="center">
                                        <!-- MUESTRA LA FOTO DEL USUARIO SI EXISTE, SINO SE MUESTRA LA IMAGEN POR DEFECTO -->
                                       
                                         <!-- <form id="formFoto" method="post" enctype="multipart/form-data" action=""> -->
                                            <div class="custom-input-file"><input id="userfile" name="userfile" type="file" size="1" class="input-file" />
                                                Seleccione su foto
                                                <div class="archivo" style="color: black;font-size: 10px;background: #f7b261;">...</div>
                                            </div>
                                            <!--
                                            <button type="button" value='Subir foto' name="upload" class="btn_default" id="btnVolver" onclick="procesaForm(2)">
                                                <i class="fa fa-upload fa-lg" style="color:white"></i>&nbsp;&nbsp;Subir Foto
                                            </button>-->
                                        <!-- </form> -->
                                        <p align="center" style="font-size: 11px;">
                                            Formatos de imagen permitido:<br>*.JPG, *.JPEG, *.GIF, *.PNG.<br>
                                            La imagen no puede exceder de 1 MB (1024KB).
                                        </p>
                                    </div>
                                </td>
                            </tr>
                            <!-- FILA 2 -->
                            <tr>
                                <td>
                                    &nbsp;G&eacute;nero&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <select id="genero" name="genero" class="combo select2_single" style="width:190px;">
                                        <option value="">Seleccione G&eacute;nero</option>
                                        
                                    </select>
                                </td>
                                <td>
                                    &nbsp;Estado Civil&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <select id="edocivil" name="edoCivil" class="combo select2_single" style="width:190px;" >
                                        <option value="">Seleccione Estado Civil</option>
                                        
                                    </select>
                                </td>
                                <td>
                                    &nbsp;Fecha de Nacimiento&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <input type="text" name="fechaNacimiento" id="fechaNacimiento" value="" style="width:170px;" readonly="readonly" class="campoTexto"/>
                                    <i class="fa fa-calendar fa-lg" id='cal1' alt='calendario' onmouseover="Tip('Haga click aqu\u00ed para abrir un selector de fechas.')" onmouseout="UnTip();"></i>
                                    
                                </td>			
                            </tr>
                            <!-- FILA 3 -->
                            <tr>
                                <td>
                                    &nbsp;Estado de Residencia&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <select name="estado" onChange="cargarComboMunicipios(this.value);cargarComboParroquias(0);" class="combo select2_single" style="width:190px;">
                                        <option value="">Seleccione Estado</option>
                                        
                                    </select>
                                </td>
                                <td>
                                    &nbsp;Municipio de Residencia&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <select name="municipio" id="municipio" class="combo select2_single" style="width:190px;"  onchange="cargarComboParroquias(this.value)">
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
                            <!-- FILA 4 -->
                            <tr>
                                <td>
                                    &nbsp;Ciudad / Urbanizaci&oacute;n&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="urbanizacion" id="urbanizacion" value="" style="width:190px;" maxlength="100" class="campoTexto" onKeyUp="this.value = this.value.toUpperCase();"/>
                                </td>
                                <td>
                                    &nbsp;Calle/Avenida&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="calleAv" id="calleAv" value="" style="width:190px;" maxlength="100" class="campoTexto" onKeyUp="this.value = this.value.toUpperCase();"/>
                                </td>
                                <td>
                                    &nbsp;Nombre Casa o Edificio&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="nombreCasaApto" id="nombreCasaApto" value=""  style="width:190px;" maxlength="100" class="campoTexto" onKeyUp="this.value = this.value.toUpperCase();"/>
                                </td>
                            </tr>
                            <!-- FILA 5 -->
                            <tr>
                                <td>
                                    &nbsp;Correo Electr&oacute;nico <span style="color:red;">*</span>&nbsp;
                                    <input disabled type="text" name="emailT" id="emailT" value="" style="width:190px;" maxlength="100" class="campoTexto"/>
                                    <input disabled type="hidden" name="email" id="email" value=""/>
                                </td>
                                <td>
                                    &nbsp;Telefono Local&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <input type="text" name="telefonoHab" id="telefonoHab" value="" style="width:190px;" maxlength="11" onKeyPress="return valText(this.value, event, 'int');"  class="campoTexto"/>
                                </td>
                                <td>
                                    &nbsp;Telefono Celular&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <input type="text" name="telefonoCel" id="telefonoCel" value="" style="width:190px;" maxlength="11" onKeyPress="return valText(this.value, event, 'int');"  class="campoTexto"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                            </tr>
                    
                      </table>
                          <div style="margin:5px">
                            <div class="cuadroFoco">
                                  <table align="center" border="0" cellpadding="2" cellspacing="5" width="100%" >
                                      <tr>
                                        <td align="left" width="35%">
                                            &nbsp;<b>¿Pertenece a alguna comunidad indigena?&nbsp;<span style="color:red;">*&nbsp;</span></b>
                                        </td>
                                        <td align="left" width="10%">
                                            <input type="hidden" name="indigena" id="indigena" value="">
                                            <input type="radio" name="chkindigena" value=""  onchange="checkIndigena(1);"> Sí
                                            <input type="radio" name="chkindigena" value=""  onchange="checkIndigena(0);"> No	
                                        </td>
                                        <td align="left" width="50%"> 
                                            <label id="td_comunidad">Comunidad indigena a la cual pertenece:
                                                <input style="width: 200px;" type="text" name="comunidad" maxlength="150" value="">
                                            </label>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <br>
                              <div class="cuadroFoco">
                                  <table align="center" border="0" cellpadding="2" cellspacing="5" width="100%" >
                                      <tr>
                                        <td align="left" width="25%">
                                            &nbsp;<b>¿Posee ud. alguna discapacidad física?&nbsp;<span style="color:red;">*&nbsp;</span></b>
                                        </td>
                                        <td align="left" width="10%">
                                            <input type="hidden" name="discapacidad" id="discapacidad" value="">
                                            <input type="radio" name="chkdiscapacidad" value=""  onchange="checkDiscapacidad(1);"> Sí
                                            <input type="radio" name="chkdiscapacidad" value=""  onchange="checkDiscapacidad(0);"> No	
                                        </td>
                                        <td align="left" width="40%"> 
                                            <label id="td_tipo_discapacidad">Indique el tipo de discapacidad que posee:
                                                <input style="width: 200px;" type="text" name="tipo_discapacidad" maxlength="150" value="">
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <small>&nbsp;&nbsp;&nbsp;&nbsp;Esta información tiene por objeto brindarle apoyo en el momento de su asistencia a las fases de evaluación presencial.</small>
                                        </td>
                                    </tr>
                                </table>			
                            </div>
                        </div>
                         <div class="frameContenedor" style="margin:5px;" align="right">
                            <button type="button" name="btnGrabar" value="Guardar" class="btn_default" onClick="validar();">
                                <i class="fa fa-save fa-lg" style="color:white"></i>&nbsp;Guardar
                            </button>
                            <button type="button" name="btnSeguiente" value="Siguiente" class="btn_default" onClick="siguiente();" href="{{URL::route('experienciaestudiante')}}">
                                Guardar y Continuar&nbsp;<i class="fa fa-arrow-right fa-lg" style="color:white"></i>
                            </button>
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