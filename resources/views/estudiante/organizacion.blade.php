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
                    <form name="formulario" method="post" action="organizacion/add" onSubmit="return validar();">
                        <input name="idOrg" id="idOrg" type="hidden" value=''/>
                        <table align="center" border="0" cellpadding="2" cellspacing="2" width="98%">
                            <tr>
                                <td>
                                    <div align="center" id="divTituloIndex2">
                                        AFILIACIONES GREMIALES
                                    </div>
                                    <div id="divSubTituloIndex2">
                                        Debe suministrar en esta sección los datos de los gremios a los que está afiliado<br> (Ej. Colegio de Abogados, Colegio de Médicos, etc.)
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">
                                    <div id="divTabla">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
                                            <caption><strong>Agregue cada una de las organizaciones a las que esta afiliado.</strong></caption>
                                            <thead>
                                            <tr><td class="separator">&nbsp;</td></tr>
                                            <tr>
                                                <td width="20%" align="center" class="tituloColumna">Fecha de Afiliaci&oacute;n</td>
                                                <td width="40%" align="center" class="tituloColumna">Organizaci&oacute;n</td>
                                                <td width="30%" align="center" class="tituloColumna">C&oacute;digo de Afiliaci&oacute;n</td>
                                                <td width="10%" align="center" class="tituloColumna" colspan="2">Acciones</td>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="5" align="center">
                                                    <br><br>
                                                        <button type="button" name="btnAgregar" value='Agregar Organizaci&oacute;n' class="btn_default" onclick='agregar();'>
                                                            <i class="fa fa-file-o fa-lg" style="color:white"></i>&nbsp;&nbsp;Agregar Organizaci&oacute;n
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            
                                            <tr>
                                                <td class="" align="center">&nbsp;</td>
                                                <td class="">&nbsp;&nbsp;</td>
                                                <td class="">&nbsp;&nbsp;</td>
                                                <td class="">&nbsp;
                                                    <i class="fa fa-edit fa-2x" onClick="editar('');" title="Editar" alt="Editar" style="cursor:pointer;" ></i>
                                                &nbsp;</td>
                                                <td class="">&nbsp;
                                                    <i class="fa fa-trash fa-2x" onClick="eliminar('');" title="Eliminar" alt="Eliminar" style="cursor:pointer;" ></i>
                                                &nbsp;</td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="celParFin" align="center"colspan="5">&nbsp;No existen registros&nbsp;</td>
                                            </tr>
                                            
                                            <tr><td colspan="8" style="border-top:1px solid #006699;"></td></tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                            <tr><td class="separator">&nbsp;</td></tr>
                            <tr>
                                <td class="frameContenedor" align="center">
                                    <div align="right">
                                        <a class='btn btn-info' href="{{URL::route('programa')}}" >Guardar y Continuar</a>
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