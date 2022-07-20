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
               
                    <table align="center" border="0" cellpadding="2" cellspacing="5" width="100%" >
                    <tr>
                            <td colspan="4">
                            <div class="col-12 text-center">
                                     
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <b>Suministre sus datos de su <span style="color:gray;">Experiencia Laboral</span> más reciente, haga clic en "Guardar" para registrar su información <b>
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                                </div>
                            </td>
                        </tr>   
                </table>
                       
                       <table>
               <form id="formulario" name="formulario" method="post" action="{{route('laboralregistrar')}}">
               @if(isset($funcionario_id))     
                <input id="id_funcionario" type="hidden" name="id_funcionario" value="{{$funcionario_id}}" >
                @csrf
                      
                    <tr>
                        <td>
                            &nbsp;Empresa u Organización&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" name="empresa" id="empresa" value="" maxlength="200" required/>
                        </td>
                   
                        <td>
                            &nbsp;Cargo de desempeñado&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" name="cargo" id="cargo" value=""  maxlength="150" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;Fecha Ingreso&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" name="fechaingreso" id="fechaingreso" value="" style="width:190px;" maxlength="25" required/>
                        </td>
                   
                        <td>
                            &nbsp;Fecha de Egreso&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" name="fechaegreso" id="fechaegreso" value="" style="width:190px;" maxlength="25" required/>
                        </td>
          
                        <td>
                                &nbsp;Telefono Empresa u Organización&nbsp;<br>
                                <div class="input-group">
                                <select id="cod_telefono" name="cod_telefono" style="width:70px;" required>
                                    @foreach ($todos_cod as $todos_cod)
                                        <option value="{{ $todos_cod->descripcion }}">{{ $todos_cod->descripcion }}</option>
                                    @endforeach
                                    
                                </select>
                                <input type="text" class="form-control" name="telefono" id="telf_contacto" value="" maxlength="7" />
                                </div>
                            </td>
                        <td></td>
                    </tr>
                    </table>
                    <div class="frameContenedor" style="margin:5px;" align="right">
                    <input class='btn btn-info' type="submit" value="Registrar Exp. Laboral" >
                       
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
                            @foreach($laboral as $laboral)
                            <tbody>                              
                                <tr>                                                    
                                        <td>{{$laboral->nombre_empresa}}</td>
                                        <td>{{$laboral->cargo}}</td>
                                        <td>{{$laboral->telefono_empresa}}</td>
                                        <td>{{date('d-m-Y', strtotime($laboral->fecha_ingreso))}}</td>
                                        <td>{{date('d-m-Y', strtotime($laboral->fecha_egreso))}}</td>
                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                            <td class="text-center">
                                            <a href= "experiencia_edit/{{$laboral->id}}" class="btn btn-info" data-tip="Detalle" title="Actualizar Exp. Laboral" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
                                            </a>
                                            </td>
                                        @endif                                                            
                                    </tr>
                            
                            </tbody>
                            @endforeach
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
                    @else
                 <div class="frameContenedor" style="margin:5px;"align="center">
                           <h2 aling="center"><b>DEBE COMPLETAR LOS DATOS BÁSICOS</b></h2>
                        </div>
                 @endif  
                </form>

            </div>

        </div>
    </div>
</div>

@endsection