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
                <form id="formulario" name="formulario" method="POST" action="{{route('estudiantestore')}}">
                @csrf
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
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
                                <input id="primernombre" type="text"  maxlength="25" class="form-control @error('primernombre') is-invalid @enderror" name="primernombre" value="" required>
                                @error('primernombre')
                                    <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </td>
                            <td>
                                &nbsp;Segundo Nombre&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <input id="segundonombre" type="text"  maxlength="25" class="form-control @error('segundonombre') is-invalid @enderror" name="segundonombre" value="" required>
                                @error('segundonombre')
                                    <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <!-- FILA 2 -->
                        <tr>
                            <td>
                                &nbsp;Primer Apellido&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <input id="primerapellido" type="text"  maxlength="25" class="form-control @error('primerapellido') is-invalid @enderror" name="primerapellido" value="" required>
                                @error('primerapellido')
                                    <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </td>
                            <td>
                                &nbsp;Segundo Apellido&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <input id="segundoapellido" type="text"  maxlength="25" class="form-control @error('segundoapellido') is-invalid @enderror" name="segundoapellido" value="" required>
                                @error('segundoapellido')
                                    <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <!-- FILA 3 -->
                        <tr>
                            <td>
                                &nbsp;Cedula&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="nacionalidad" name="nacionalidad" style="width:70px;" required>
                                    @foreach ($nacionalidades as $nacionalidad)
                                        <option value="{{ $nacionalidad->id  }}">{{ $nacionalidad->cod }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="cedula" id="cedula" value=""  maxlength="12"/>
                                @error('cedula')
                                    <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </td>
                            <td>
                                &nbsp;Sexo&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select class="form-control"  type="text" name="genero" required>
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
                        <!-- FILA 4 -->
                        <tr>
                            <td>
                                &nbsp;Estado Civil&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select name="estadocivil"  class="form-control" required >
                                    @foreach ($estado_civils as $estado_civil)
                                        <option value="{{ $estado_civil->id }}">{{ $estado_civil->descripcion }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                &nbsp;Correo&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <input id="correo" type="email"  maxlength="250" class="form-control @error('correo') is-invalid @enderror" name="correo" value="" required>
                                @error('correo')
                                    <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <!-- FILA 5 -->
                        <tr>
                            <td>
                                &nbsp;Telefono de Habitacion&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="codtele" name="codtele" style="width:70px;" required>
                                    @foreach ($cod_habs as $cod_hab)
                                        <option value="{{ $cod_hab->descripcion }}">{{ $cod_hab->descripcion }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="telfhabitacion" id="telfhabitacion" value=""  maxlength="100"/>
                            </td>
                            <td>
                                &nbsp;Fecha Nacimiento&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;">*</span><br>
                                <input type="date" name="fechanac" id="fechanac" value=""  maxlength="25" required/>
                            </td>
                        </tr>
                        <!-- FILA 6 -->
                        <tr>
                            <td>
                                &nbsp;Telefono Ceular&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="codtelecel" name="codtelecel" style="width:70px;" required>
                                    @foreach ($cod_cels as $cod_cel)
                                        <option value="{{ $cod_cel->descripcion }}">{{ $cod_cel->descripcion }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="telefonoCel" id="telefonoCel" value="" style="width:190px;" maxlength="11" onKeyPress="return valText(this.value, event, 'int');"  class="campoTexto" required/>
                            </td>
                            <td>
                                &nbsp;Telefono con Whatsapp&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="cod_what" name="cod_what" style="width:70px;" required>
                                    @foreach ($cod_cels as $cod_what)
                                        <option value="{{ $cod_what->descripcion }}">{{ $cod_what->descripcion }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="telfwhatsapp" id="telfwhatsapp" value="" style="width:190px;" maxlength="100" required/>
                            </td>
                        </tr>
                    </table>
                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Guardar y Continuar" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection