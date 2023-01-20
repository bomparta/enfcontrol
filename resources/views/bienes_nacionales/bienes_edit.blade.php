@extends('layouts.app')
@section ('content')

<div class="container-fluid">
<div class="row justify-content-start">
@include('layouts.appbienes')  
       
        
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
            <div align="center" id="divTituloIndex2" class="text-primary">
              
                <b>INCORPORACIÓN DE BIENES</b>
                </div>
           
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
                         <tr>
                            <td>
                                <div id="divSubTituloIndex2">
                                   
                                    <hr>
                                    <b>Suministre los datos del <span style="color:gray; ">Bien Nacional</span>, haga clic en "Guardar" para actualizar su información <b>
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                           
                                </div>
                            </td>

                        </tr>
                    </table>
        <table>
          <form id="formulario" name="formulario" method="POST" action="{{route('actualizarbien')}}">     
          @foreach ($bienes as $key=>$item)  
         <input id="id_bien" type="hidden" name="id_bien" value="{{$item->id}}" >
          @csrf
       
                        <tr>
                                <td >
                                    &nbsp;N° Bien Nacional&nbsp;<span style="color:red;">*</span>&nbsp;
                      
                                    <input type="text" class="form-control " name="num_bien" id="num_bien" value="{{$item->num_bien}}"  maxlength="100" readonly />                                        
                                 
                                </td>
                                
                        </tr>
                        <tr>
                                <td>
                                    &nbsp;Tipo Bien&nbsp;<span style="color:red;">*</span>&nbsp;
                                   
                                    <select name="tipo_bien"  id="tipo_bien" class="form-control" required >
                                <option value="0">Seleccione...</option>                                 
                                       
                                         @foreach($tipo_bien as $tipo_bien )
                                                <option value="{{$tipo_bien->id}}" @if($item->tipo_bien_id==$tipo_bien->id)selected @endif > {{$tipo_bien->descripcion}}</option>
                                        @endforeach                                        
                                </select>
                                </td>
                                <td>
                                    &nbsp;Descripción del Bien&nbsp;
                                    <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{$item->descripcion_bien}}"  maxlength="100"  />
                                        
                                </td>
                                </tr>
                        <tr>
                                <td>
                                &nbsp;Tipo de Movimiento&nbsp;<span style="color:red;">*</span>&nbsp;
                            <select id="tipo_movimiento" name="tipo_movimiento"class="form-control"   readonly   >                                            
                                        @foreach($tipo_mov as $tipo_mov )
                                                <option value="{{$tipo_mov->id}}" @if ($item->tipo_movimiento_id=$tipo_mov->id) selected @endif> {{$tipo_mov->descripcion}}</option>
                                        @endforeach                    
                                    </select> 
                                </td>
                                <td>
                                </tr>
                        <tr>
                      
                        <td>
                                &nbsp;Forma de Adquisición&nbsp;<span style="color:red;">*</span>&nbsp;
                            <select id="forma_adquisicion" name="forma_adquisicion"class="form-control"    required >
                                            <option value="0"  >Seleccione...</option>
                                            @foreach($adquisicion_bien as $adquisicion_bien )
                                                <option value="{{$adquisicion_bien->id}}" @if ($item->forma_adquisicion_id==$adquisicion_bien->id) selected @endif> {{$adquisicion_bien->descripcion}}</option>
                                        @endforeach      
                                    </select> 
                                </td>
                                <td>    
                                &nbsp;Estado del Bien&nbsp;<span style="color:red;">*</span>&nbsp;
                            <select id="estado_bien" name="estado_bien"class="form-control"    required >
                                            <option value="0"  >Seleccione...</option>
                                            @foreach($estado_bien as $estado_bien )
                                                <option value="{{$estado_bien->id}}" @if ($estado_bien->id==$item->estado_bienes_id) selected @endif> {{$estado_bien->descripcion}}</option>
                                            @endforeach                        
                                    </select> 

                                </td>
                        </tr>
                        <tr>
                                <td>
                                    &nbsp;N° Factura&nbsp;
                                    <input type="text" class="form-control" name="num_factura" id="num_orden" value="{{$item->num_factura}}"  maxlength="100"  />
                                        
                                </td>
                                <td>                              
                                    &nbsp;Fecha Factura&nbsp;&nbsp;&nbsp;
                                    <input type="date" class="form-control" name="fecha_factura" id="fecha_orden" value="{{$item->fecha_factura}}"  maxlength="100"  />
                                </td>
                                
                            </tr>
                        <tr>
                        <tr>
                                <td>
                                    &nbsp;N° Orden de Compra&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <input type="text" class="form-control" name="num_orden" id="num_orden" value="{{$item->num_orden_compra}}"  maxlength="100"  required/>
                                        
                                </td>
                                <td>                              
                                    &nbsp;Fecha Orden Compra&nbsp;&nbsp;&nbsp;
                                    <input type="date" class="form-control" name="fecha_orden" id="fecha_orden" value="{{$item->fecha_compra}}"  maxlength="100"  required/>
                                </td>
                                
                        </tr>

                        <tr>
                                <td>
                                    &nbsp;N° Cotización&nbsp;
                                    <input type="text" class="form-control" name="num_cotizacion" id="num_cotizacion" value="{{$item->num_cotizacion}}"  maxlength="100"  />
                                        
                                </td>
                                <td>                              
                                    &nbsp;Fecha Cotización&nbsp;&nbsp;&nbsp;
                                    <input type="date" class="form-control" name="fecha_cotizacion" id="fecha_cotizacionn" value="{{$item->fecha_cotizacion}}"  maxlength="100"  />
                                </td>
                                
                         </tr>
                         <tr>
                                <td>
                                    &nbsp;Nombre del Proveedor&nbsp;
                                    <input type="text" class="form-control" name="nom_proveedor" id="nom_proveedor" value="{{$item->nombre_proveedor}}"  maxlength="100"  />
                                        
                                </td>
                                <td>                              
                                    &nbsp;R.I.F. Proveedor&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="form-control" name="rif_proveedor" id="rif_proveedor" value="{{$item->rif_proveedor}}" placeholder="Ej. J123456789 (sin guiones -)" maxlength="100"  />
                                </td>
                                
                                
                         </tr>
                         <tr>       
                                <td >                              
                                    &nbsp;Correo del Proveedor&nbsp;&nbsp;&nbsp;
                                    <input type="email" class="form-control" name="correo_proveedor" id="correo_proveedor" value="{{$item->correo_proveedor}}" placeholder="Ej. elcorreo@diminio.com" maxlength="100"  />
                                </td>
                        </tr>
                        <tr>
                                <td>
                                    &nbsp;Marca&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <select id="marca" name="marca"class="form-control"   required >
                                    <option value="0">Seleccione...</option>     
                                    @foreach($marca as $marca )
                                                <option value="{{$marca->id}}"@if($item->marca_id==$marca->id)echo selected @endif > {{$marca->descripcion}}</option>
                                    @endforeach                                
                                                                       
                                </select>
                                        
                                </td>
                                <td>
                              
                                    &nbsp;Modelo&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="form-control" name="modelo" id="modelo" value="{{$item->modelo}}"  maxlength="100"  required/>
                                </td>
                                
                            </tr>
                           
                            <!-- FILA 2 -->
                            <tr>
                            <td>
                                    &nbsp;Serial&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="form-control" name="serial" id="serial" value="{{$item->serial}}"  maxlength="100" required  />
                                </td>                     
                                
                                <td>
                                    &nbsp;Color&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="form-control" name="color" id="color" value="{{$item->color}}"  maxlength="100" required  />
                                </td>                     
                                
                            </tr>
                           
                            <!-- FILA 3 -->
                            <tr>
                            <td>
                                    &nbsp;Recibido por:&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <input type="text" class="form-control " name="recibido_por" id="recibido_por" value="{{$item->registrado_por}}"  maxlength="100"  required/>
                                        
                                </td>
                                <td >

                                    &nbsp;Observaciones  &nbsp;&nbsp;&nbsp;&nbsp;
                                    <textarea rows="2" class="form-control"  name="observaciones" id="observaciones" maxlength="200"  >{{$item->observacion}}</textarea>
                                </td>
                                
                        </tr>                       
                        @endforeach                
                      </table>
                   
                      <div class="frameContenedor" style="margin:5px;" align="right">
                      <input class='btn btn-info' type="submit" value="Guardar" >
                      <a class='btn btn-secondary' href="{{URL::route('bienes')}}">Regresar</a> 
                        </div>
                   
                         
                    </form>

            </div>
            
        </div>
        @endsection
        @section('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="{{url('js/funciones_generales.js')}}"></script>

@endsection