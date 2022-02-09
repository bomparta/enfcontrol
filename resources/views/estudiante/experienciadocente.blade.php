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
                    <form name="formulario" method="post" action="experienciadocente/editar" onSubmit="return validar();">
                        <input name="caso" id="caso" type="hidden" value=''/>
                        <input name="idExp" id="idExp" type="hidden" value=''/>
                        <table align="center" border="0" cellpadding="2" cellspacing="2" width="98%">
                            <tr>
                                <td>
                                    <div align="center" id="divTituloIndex2">
                                        EXPERIENCIA DOCENTE
                                    </div>
                                    <div id="divSubTituloIndex2">
                                        Si ud. ha ejercido la docencia, registe en esta secci&oacute;n todas sus experiencias
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    <div id="divTabla">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
                                        <thead>
                                        <tr><td class="separator">&nbsp;</td></tr>
                                        <tr>
                                            <td width="40%" align="center" class="tituloColumna">Centro de Estudios</td>
                                            <td width="15%" align="center" class="tituloColumna">Nivel Educativo</td>
                                            <td width="25%" align="center" class="tituloColumna">C&aacute;tedras Impartidas</td>
                                            <td width="11%" align="center" class="tituloColumna">Antig&uuml;edad</td>
                                            <td width="9%" align="center" class="tituloColumna" colspan="2">Acciones</td>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <td colspan="6" align="center">
                                                    <br><br>
                                                    <button type="button" name="btnAgregar" value='Agregar Experiencia Docente' class="btn_default" onclick='agregar();'>
                                                        <i class="fa fa-file-o fa-lg" style="color:white"></i>&nbsp;&nbsp;Agregar Experiencia Docente
                                                    </button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        
                                        <tr>
                                            <td class="" align="center">&nbsp;</td>
                                            <td class="">&nbsp;&nbsp;</td>
                                            <td class="">&nbsp;&nbsp;</td>
                                            <td class="">&nbsp;&nbsp;a&ntilde;os</td>
                                            <td class="">&nbsp;
                                                <i class="fa fa-edit fa-2x" onClick="editar('');" title="Editar" style="cursor:pointer;"></i>
                                            &nbsp;</td>
                                            <td class="">&nbsp;
                                                <i class="fa fa-trash fa-2x" onClick="eliminar('');" title="Eliminar" style="cursor:pointer;"></i>
                                            &nbsp;</td>
                                        </tr>
                                       
                                        <tr>
                                            <td class="celParFin" align="center"colspan="6">&nbsp;No existen registros&nbsp;</td>
                                        </tr>
                                        
                                        <tr><td colspan="8" style="border-top:1px solid #006699;"></td></tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr><td class="separator">&nbsp;</td></tr>
                            <tr>
                                <td class="frameContenedor" colspan="4" align="center">
                                    <div align="right">
                                        <a class='btn btn-info' href="{{URL::route('organizacion')}}" >Guardar y Continuar</a>
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