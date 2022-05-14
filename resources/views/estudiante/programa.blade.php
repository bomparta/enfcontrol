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
                    <form name="formulario" id="formulario" method="post" action="persona/addprograma" onSubmit="return validar();">
                        <table align="center" border="0" cellpadding="2" cellspacing="2" width="99%">
                            <tr>
                                <td>
                                    <div align="center" id="divTituloIndex2">
                                        PROGRAMA A CURSAR
                                    </div>
                                    <div id="divSubTituloIndex2">
                                        En esta sección debe indicar la Extensión y el Programa de Estudio que desea cursar en la Escuela Nacional de Fiscales.
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td align="center"><br>
                                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="80%">
                                        <tr><td width="10%" rowspan="2"><img src="recursos/imgs/number_1.png" width="60" height="60"></td><td width="90%" align="left">&nbsp;<b>Seleccione la Extensión</b>&nbsp;<span style="color:red;">*</span>&nbsp;</td></tr>
                                        <tr>
                                            <td align="left">
                                                <select name="id_nucleo" id="id_nucleo" class="comboGrande" onChange="cargarComboOfertas(this.value);" >
                                                    <option style="font-size:medium;" value="">Seleccione una Extensión</option>
                                                   
                                                </select>
                                            </td>
                                        </tr>
                                        <tr><td><br></td></tr>
                                        <tr><td rowspan="2"><img src="recursos/imgs/number_2.png" width="60" height="60"></td><td align="left">&nbsp;<b>Seleccione un Programa de Estudio</b>&nbsp;<span style="color:red;">*</span>&nbsp;</td></tr>
                                        <tr>
                                            <td align="left">
                                                <select name="id_oferta" id="id_oferta" class="comboGrande" onChange="cargarRequisitos(this.value);">
                                                    <option style="font-size:medium;" value="">Seleccione una Programa de Estudio</option>
                                                    
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="60%">
                                        <tr>
                                            <td><h1 id="titRequisitos" style="text-align:center; display:none;">Requisitos exigidos por la Oferta de Estudio</h1></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <ol style="list-style-type: none;" id="requisitos">
                                                </ol>
                                                <br>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td><b>
                                    <ol style="list-style-type: square;padding:0px 30px 0px 30px; list-style-position: outside">
                                        <li></i>Debe cumplir con los requisitos exigidos por el Programa de Estudio seleccionado, de lo contrario será excluido del proceso de selección.</li>
                                        <br>
                                        <li></i>Todo el proceso de selección posterior a la preinscripción se realizará en la ciudad de Caracas, por lo que deberá tomar sus precauciones para cumplir con la puntual asistencia a las fases de evaluación presencial.</li>
                                    </ol>
                                    <br><br>
                                </b></td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <div class="frameContenedor" style="margin:5px;" align="right">
                                        <button type="button" name="btnRegresar" value='Regresar' class="btn_default" id="btnVolver" onClick="location.href='organizacion/';">
                                            <i class="fa fa-arrow-left fa-lg" style="color:white"></i>&nbsp;&nbsp;Regresar
                                        </button>
                    
                                        <button type="submit" value='Guardar y Continuar' class="btn_default" id="btnGuardar">
                                            Guardar y Continuar&nbsp;&nbsp;<i class="fa fa-arrow-right fa-lg" style="color:white"></i>
                                        </button>
                                        <a class='btn btn-info' href="{{URL::route('listadoestudiante')}}" >Guardar y Continuar</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>
            </div> <!-- card -->
        </div>
    </div> <!-- row -->
</div>

</div> <!-- row -->
</div> 

@endsection