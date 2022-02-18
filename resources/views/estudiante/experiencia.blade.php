@extends('layouts.app')
@section('title', 'Cantidades')
@section ('content')
<div class="d-flex" id="wrapper">
    @include('layouts.appcontrol')

    <div id="page-content-wrapper">
<div class="container pb-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 text-center">
                        <h1>Informacion</h1>
                    </div>

                    <form name="formulario" method="post" action="experiencia/add">
                        <input name="idExp" id="idExp" type="hidden" value=''/>
                        <table  align="center" border="0" cellpadding="2" cellspacing="2" width="98%">
                            <tr>
                                <td>
                                    <div align="center" id="divTituloIndex">
                                            EXPERIENCIAS LABORALES
                                    </div>
                                    <div id="divSubTituloIndex">
                                        En esta secci&oacute;n debe registrar sus experiencias laborales
                                    </div>
                                </td>
                            </tr>
                            <tr><td class="separator">&nbsp;</td></tr>
                            <tr>
                                <td align="right">
                                    <div id="divTabla">
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="98%">
                                        <thead>
                                        <tr>
                                            <td width="35%" align="center" class="tituloColumna">Empresa u Organismo</td>
                                            <td width="30%" align="center" class="tituloColumna">Cargo</td>
                                            <td width="15%" align="center" class="tituloColumna">Fecha Ingreso</td>
                                            <td width="15%" align="center" class="tituloColumna">Fecha Egreso</td>
                                            <td width="5%" align="center" class="tituloColumna" colspan="2">Acciones</td>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <td colspan="5" align="center">
                                                <br><br>
                                                    <button type="button" value='Agregar Experiencia' class="btn_default" onclick='agregar();'>
                                                        <i class="fa fa-file-o fa-lg" style="color:white"></i>&nbsp;&nbsp;Agregar Experiencia
                                                    </button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        
                                        <tr>
                                            <td class="" align="center">&nbsp;</td>
                                            <td class="">&nbsp;&nbsp;</td>
                                            <td class="">&nbsp;&nbsp;</td>
                                            <td class="">&nbsp;&nbsp;</td>
                                            <td class=""> 
                                                <i class="fa fa-edit fa-2x" onClick="editar('');" title="Editar" style="cursor:pointer;"></i>
                                            </td>
                                            <td class="">
                                                <i class="fa fa-trash fa-2x" onClick="eliminar('');" title="Eliminar" style="cursor:pointer;"></i>
                                            </td>
                    
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
                                <td class="frameContenedor" colspan="4" align="center">
                                    <div align="right">
                                        <a class='btn btn-info' href="{{URL::route('experienciadocente')}}" >Guardar y Continuar</a>
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