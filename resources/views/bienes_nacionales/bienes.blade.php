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
                                    <b>Suministre los datos del <span style="color:gray; ">Bien Nacional</span>, haga clic en "Guardar" para registrar su información <b>
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                           
                                </div>
                            </td>

                        </tr>
                    </table>
        <table>
          <form id="formulario" name="formulario" method="POST" action="{{route('registrar_bienes')}}">     
              
         <input id="id_funcionario" type="hidden" name="id_funcionario" value="" >
          @csrf
                        <tr>
                                <td >
                                    &nbsp;N° Bien Nacional&nbsp;<span style="color:red;">*</span>&nbsp;
                                    @foreach ($num_bien as $key=>$item)
                                    <input type="text" class="form-control " name="num_bien" id="num_bien" value="{{$item->nomenclatura}}-{{$item->ult_num_bien+1}}"  maxlength="100"  required/>                                        
                                    @endforeach
                                </td>
                                
                        </tr>
                        <tr>
                                <td>
                                    &nbsp;Tipo Bien&nbsp;<span style="color:red;">*</span>&nbsp;
                                   
                                    <select name="tipo_bien"  id="tipo_bien" class="form-control" required >
                                <option value="0">Seleccione...</option>                                 
                                        <option value="1" > CPU</option>
                                        <option value="2" > Monitor</option>
                                        <option value="3" > Teclado</option>                                   
                                </select>
                                </td>
                                <td>
                                &nbsp;Tipo de Movimiento&nbsp;<span style="color:red;">*</span>&nbsp;
                            <select id="tipo_movimiento" name="tipo_movimiento"class="form-control"    required >
                                            
                                            <option value="1" selected >Incorporación</option>
                                                                       
                                    </select> 
                                </td>
                                <td>

                        </tr>
                        <tr>
                        <td>
                                &nbsp;Forma de Adquisición&nbsp;<span style="color:red;">*</span>&nbsp;
                            <select id="forma_adquisicion" name="forma_adquisicion"class="form-control"    required >
                                            <option value="0"  >Seleccione...</option>
                                            <option value="1"  >Compra Directa</option>
                                            <option value="2"  >Donación</option>                           
                                    </select> 
                                </td>
                                <td>
                        </tr>
                        <tr>
                                <td>
                                    &nbsp;N° Factura&nbsp;
                                    <input type="text" class="form-control" name="num_factura" id="num_orden" value=""  maxlength="100"  />
                                        
                                </td>
                                <td>                              
                                    &nbsp;Fecha Factura&nbsp;&nbsp;&nbsp;
                                    <input type="date" class="form-control" name="fecha_factura" id="fecha_orden" value=""  maxlength="100"  />
                                </td>
                                
                            </tr>
                        <tr>
                        <tr>
                                <td>
                                    &nbsp;N° Orden de Compra&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <input type="text" class="form-control" name="num_orden" id="num_orden" value=""  maxlength="100"  required/>
                                        
                                </td>
                                <td>                              
                                    &nbsp;Fecha Orden Compra&nbsp;&nbsp;&nbsp;
                                    <input type="date" class="form-control" name="fecha_orden" id="fecha_orden" value=""  maxlength="100"  required/>
                                </td>
                                
                        </tr>

                        <tr>
                                <td>
                                    &nbsp;N° Cotización&nbsp;
                                    <input type="text" class="form-control" name="num_cotizacion" id="num_orden" value=""  maxlength="100"  />
                                        
                                </td>
                                <td>                              
                                    &nbsp;Fecha Cotización&nbsp;&nbsp;&nbsp;
                                    <input type="date" class="form-control" name="fecha_cotizacion" id="fecha_orden" value=""  maxlength="100"  />
                                </td>
                                
                         </tr>
                         <tr>
                                <td>
                                    &nbsp;Nombre del Proveedor&nbsp;
                                    <input type="text" class="form-control" name="nom_proveedor" id="nom_proveedor" value=""  maxlength="100"  />
                                        
                                </td>
                                <td>                              
                                    &nbsp;R.I.F. Proveedor&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="form-control" name="rif_proveedor" id="rif_proveedor" value="" placeholder="Ej. J123456789 (sin guiones -)" maxlength="100"  />
                                </td>
                                
                                
                         </tr>
                         <tr>       
                                <td >                              
                                    &nbsp;Correo del Proveedor&nbsp;&nbsp;&nbsp;
                                    <input type="email" class="form-control" name="correo_proveedor" id="correo_proveedor" value="" placeholder="Ej. elcorreo@diminio.com" maxlength="100"  />
                                </td>
                        </tr>
                        <tr>
                                <td>
                                    &nbsp;Marca&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <select id="marca" name="marca"class="form-control"   required >
                                    <option value="0">Seleccione...</option>                                 
                                        <option value="1" > VIT</option>
                                        <option value="2" > Acer</option>
                                        <option value="3" > HP</option>     
                                        <option value="4" > Lenovo</option>                                     
                                </select>
                                        
                                </td>
                                <td>
                              
                                    &nbsp;Modelo&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="form-control" name="modelo" id="modelo" value=""  maxlength="100"  required/>
                                </td>
                                
                            </tr>
                           
                            <!-- FILA 2 -->
                            <tr>
                            <td>
                                    &nbsp;Serial&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="form-control" name="serial" id="serial" value=""  maxlength="100" required  />
                                </td>                     
                                
                                <td>
                                    &nbsp;Color&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="form-control" name="color" id="color" value=""  maxlength="100" required  />
                                </td>                     
                                
                            </tr>
                           
                            <!-- FILA 3 -->
                            <tr>
                            <td>
                                    &nbsp;Recibido por:&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <input type="text" class="form-control " name="recibido_por" id="recibido_por" value=""  maxlength="100"  required/>
                                        
                                </td>
                                <td >

                                    &nbsp;Observaciones  &nbsp;&nbsp;&nbsp;&nbsp;
                                    <textarea rows="2" class="form-control"  name="observaciones" id="observaciones" maxlength="200"  ></textarea>
                                </td>
                                
                        </tr>                       
                                                
                      </table>
                   
                      <div class="frameContenedor" style="margin:5px;" align="right">
                      <input class='btn btn-info' type="submit" value="Guardar" >
                      <a class='btn btn-secondary' href="{{URL::route('bienes')}}">Regresar</a> 
                        </div>
                   
                         
                    </form>

            </div>
            
        </div>
        <script>
            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
            document.getElementById('_estado').addEventListener('change',(e)=>{
                fetch('submunicipio_fun',{
                    method : 'POST',
                    body: JSON.stringify({texto : e.target.value}),
                    headers:{
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                }).then(response =>{
                    return response.json()
                }).then( data =>{
                    var opciones ="<option value=''>Seleccione ...</option>";
                    for (let i in data.lista) {
                            opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].nombre+'</option>';                        
                    }
                    document.getElementById("_submunicipio").innerHTML = opciones;
                }).catch(error =>console.error(error));
            })
        
            document.getElementById('_submunicipio').addEventListener('change',(e)=>{
                fetch('subparroquia_fun',{
                    method : 'POST',
                    body: JSON.stringify({texto : e.target.value}),
                    headers:{
                        'Content-Type': 'application/json',
                        "X-CSRF-Token": csrfToken
                    }
                }).then(response =>{
                    return response.json()
                }).then( data =>{
                    var opciones ="<option value=''>Seleccione ...</option>";
                    for (let i in data.lista) {
                       opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].nombre+'</option>';
                    }
                    document.getElementById("_subparroquia").innerHTML = opciones;
                }).catch(error =>console.error(error));
            })
        
        </script>
    </div>
</div>



@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>



@endsection