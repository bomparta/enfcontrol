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
                        
                    <!--	<div class="frame3">-->
                        <table align="center" border="0" cellpadding="2" cellspacing="5" width="100%" >
                            <!-- FILA 1 + FOTO -->
                            <tr>
                                <td colspan="4">
                                    <div align="center" id="divTituloIndex2">
                                           <b> DATOS BÁSICOS</b>
                                    </div>
                                    <div id="divSubTituloIndex2">
                                        Suministre sus datos básicos, haga clic en "Guardar" y posteriormente suba su foto.
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;Primer Nombre&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                    <input type="text" name="primernombre" id="primernombre" value="" style="width:190px;" maxlength="25"/>
                                </td>
                                <td>
                                    &nbsp;Segundo Nombre&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                    <input type="text" name="segundonombre" id="segundonombre" value="" style="width:190px;" maxlength="25" />
                                </td>
                                <td width="30%" rowspan="7" >
                                    <div align="center">
                                        <h1>Foto tipo Carnet</h1>
                                    </div>
                                    <div class="frameContenedor" style="width: 250px;" align="center">
                                        <!-- MUESTRA LA FOTO DEL USUARIO SI EXISTE, SINO SE MUESTRA LA IMAGEN POR DEFECTO -->
                                        <img src="{{ asset('img/icon/usuario.png') }}" height="120" width="100"><br><br>
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
                                    &nbsp;Primer Apellido&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                    <input type="text" name="primerapellido" id="primerapellido" value="" style="width:190px;" maxlength="25"/>
                                </td>
                                <td>
                                    &nbsp;Segundo Apellido&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                    <input type="text" name="segundoapellido" id="segundoapellido" value="" style="width:190px;" maxlength="25"/>
                                </td>
                            </tr>
                            <!-- FILA 2 -->
                            <tr>
                                <td>
                                    &nbsp;Cedula&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                    <select id="id_nacionalidad" name="id_nacionalidad" style="width:70px;">
                                        @foreach ($nacionalidades as $nacionalidad)
                                            <option value="{{ $nacionalidad->id }}">{{ $nacionalidad->cod }}</option>
                                        @endforeach
                                        <input type="text" name="cedula" id="cedula" value="" style="width:190px;" maxlength="25"/>  
                                </td>
                                <td>
                                    &nbsp;Sexo&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                    <select class="form-control"  type="text" name="sexo" >
                                        <option value="">Seleccione...</option>
                                        @foreach ($generos as $genero)
                                            <option value="{{ $genero->id }}">{{ $genero->cod }}</option>
                                        @endforeach
                                    </select>
                                    @error('sexo')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </td>
                                			
                            </tr>
                            <!-- FILA 3 -->
                            <tr>
                                <td>
                                    &nbsp;Estado Civil&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                    <select name="estadocivil"  style="width:190px;" class="form-control" >
                                        @foreach ($estado_civils as $estado_civil)
                                            <option value="{{ $estado_civil->id }}">{{ $estado_civil->descripcion }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    &nbsp;Correo&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                    <input type="email" name="correo" id="correo" value="" style="width:190px;" maxlength="200"/>
                                </td>
                            </tr>
                            <!-- FILA 4 -->
                            <tr>
                                <td>
                                    &nbsp;Telefono de Habitacion&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                    <select id="codtele" name="codtele" style="width:70px;">
                                        @foreach ($cod_habs as $cod_hab)
                                            <option value="{{ $cod_hab->descripcion }}">{{ $cod_hab->descripcion }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="telfhabitacion" id="telfhabitacion" value="" style="width:190px;" maxlength="100"/>
                                </td>
                                <td>
                                    &nbsp;Fecha Nacimiento&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;">*</span><br>
                                    <input type="date" name="fechanac" id="fechanac" value="" style="width:190px;" maxlength="25"/>
                                </td>
                            </tr>
                            <!-- FILA 5 -->
                            <tr>
                                <td>
                                    &nbsp;Telefono Ceular&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                    <select id="codtelecel" name="codtelecel" style="width:70px;">
                                        @foreach ($cod_cels as $cod_cel)
                                            <option value="{{ $cod_cel->descripcion }}">{{ $cod_cel->descripcion }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="telefonoCel" id="telefonoCel" value="" style="width:190px;" maxlength="11" onKeyPress="return valText(this.value, event, 'int');"  class="campoTexto"/>
                                </td>
                                <td></td>
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
                            <a class='btn btn-info' href="" >Guardar y Continuar</a>
                        </div>
                       
                    </form>
                    
        
            </div>
        </div>
    </div>
</div>

@endsection