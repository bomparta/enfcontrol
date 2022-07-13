@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
    @include('layouts.apprrhh')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
            <div align="center" id="divTituloIndex2" class="text-primary">
              
                <b>EXPERIENCIA LABORAL</b>
                </div>
                <form id="formulario" name="formulario" method="post" action="#">
                    <table align="center" border="0" cellpadding="2" cellspacing="5" width="100%" >
                    <tr>
                            <td colspan="4">
                            <div class="col-12 text-center">
                                     
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <b>Suministre sus datos de su <span style="color:gray;">Experiencia Laboral</span> más reciente, haga clic en "Guardar" para registrar su información <b>
                                    <hr>   
                                </div>
                            </td>
                        </tr>
                    
                    <tr>
                        <td>
                            &nbsp;Empresa u Organización&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" name="empresa" id="empresa" value="" maxlength="25"/>
                        </td>
                   
                        <td>
                            &nbsp;Cargo de desempeñado&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" name="cargo" id="cargo" value=""  maxlength="25" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;Fecha Ingreso&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" name="fechaingreso" id="fechaingreso" value="" style="width:190px;" maxlength="25"/>
                        </td>
                   
                        <td>
                            &nbsp;Fecha de Egreso&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" name="fechaegreso" id="fechaegreso" value="" style="width:190px;" maxlength="25" />
                        </td>
          
                    <td>
                            &nbsp;Teléfono&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" name="telefono" id="telefono" value="" style="width:190px;" maxlength="25"/>
                        </td>
                        <td></td>
                    </tr>
                    </table>
                    <div class="frameContenedor" style="margin:5px;" align="right">
                            <a class='btn btn-info' href="" >Registrar Exp. Laboral</a>
                    </div>
                    <div class="table-responsive mt-3">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">                        
                            <thead>
                                <tr>
                                    <th>Empresa u Organización</th>
                                    <th>Cargo Desempeñado</th>
                                    <th>Teléfono</th>
                                    <th>Fecha de Ingreso</th>
                                    <th>Fecha de Egreso</th>
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                        <th>Opcion</th>
                                    @endif
                                </tr>
                            </thead>    
                            <tbody>                              
                                <tr>                                                    
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                            <td class="text-center">
                                            <a href= "#" class="btn btn-info" data-tip="Detalle" title="Actualizar Curso" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
                                            </a>
                                            </td>
                                        @endif                                                            
                                    </tr>
                            
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>Empresa u Organización</th>
                                    <th>Cargo Desempeñado</th>
                                    <th>Teléfono</th>
                                    <th>Fecha de Ingreso</th>
                                    <th>Fecha de Egreso</th>
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                        <th>Opcion</th>
                                    @endif
                                    
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection