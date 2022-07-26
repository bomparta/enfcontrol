@extends('layouts.app')
@section ('content')

<div class="container-fluid">
<div class="row justify-content-start">
@include('layouts.appbienes')  
       
        
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
            <div align="center" id="divTituloIndex2" class="text-primary">
              
                <b>MOVIMIENTOS BIENES NACIONALES (Registro)</b>
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
          <form id="formulario" name="formulario" method="POST" action="{{route('registrar_mov_bienes')}}">     
              
          @foreach ($bienes as $key=>$item)  
         <input id="id_bien" type="text" name="id_bien" value="{{$item->id}}" >
        
          @csrf
         
            <tr>
                <td colspan="2">
                    &nbsp;N° Bien Nacional&nbsp;<span style="color:red;">*</span>&nbsp;
                    <input type="search" class="form-control " name="num_bien" id="num_bien" value="{{$item->num_bien}}"  style="width:190px;"maxlength="100"  readonly required/>                                        
                </td>                
            </tr>
            <tr>
                <td>
                    &nbsp;Tipo Bien&nbsp;<span style="color:red;">*</span>&nbsp;                    
                    <select name="tipo_bien"  id="tipo_bien" class="form-control" readonly required >
                        <option value="1" @if($item->tipo_bien_id==1)echo selected @endif > CPU</option>
                        <option value="2"  @if($item->tipo_bien_id==2)echo selected @endif  > Monitor</option>
                        <option value="3"  @if($item->tipo_bien_id==3)echo selected @endif  > Teclado</option>                                       
                    </select>
                </td>
                <td>
                    &nbsp;Tipo de Movimiento&nbsp;<span style="color:red;">*</span>&nbsp;
                    <select id="tipo_movimiento" name="tipo_movimiento"class="form-control"    required >
                                <option value="0"  >Seleccione...</option>
                                <option value="2" selected >Asignación</option>
                                <option value="3"  >Traslado</option>
                                <option value="4"  >Enajenación</option>
                                <option value="5"  >Préstamo</option>
                                                                         
                    </select> 
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;Modelo&nbsp;&nbsp;&nbsp;
                    <input type="text" class="form-control" name="modelo" id="modelo" value="{{$item->modelo}}"  maxlength="100"  readonly required/>
                </td>  
                <td>
                    &nbsp;Marca&nbsp;<span style="color:red;">*</span>&nbsp;
                    <select id="marca" name="marca"class="form-control"  readonly required >
                        <option value="0">Seleccione...</option>                                 
                        <option value="1" @if($item->marca_id==1)echo selected @endif > VIT</option>
                        <option value="2"@if($item->marca_id==2)echo selected @endif  > Acer</option>
                        <option value="3"@if($item->marca_id==3)echo selected @endif  > HP</option>     
                        <option value="4"@if($item->marca_id==4)echo selected @endif  > Lenovo</option>                                   
                    </select>                        
                </td>
            </tr>
            <tr>
                       
                <td>
                    &nbsp;Serial&nbsp;&nbsp;&nbsp;
                    <input type="text" class="form-control" name="serial" id="serial" value="{{$item->serial}}"  maxlength="100" readonly required  />
                </td>                     
          
                <td>
                    &nbsp;Color&nbsp;&nbsp;&nbsp;
                    <input type="text" class="form-control" name="color" id="color" value="{{$item->color}}"  maxlength="100" readonly required  />
                </td>   
            </tr>
            
            <!-- FILA 3 -->
            <tr>
                <td>
                    &nbsp;Ubicación Administrativa&nbsp;<span style="color:red;">*</span>&nbsp;
                    <select id="ubic_adm" name="ubic_adm"class="form-control"   required >
                        <option value="0">Seleccione...</option>                                 
                        <option value="1" > Coordinación de Administración y Servicios</option>
                        <option value="2" > Dirección de Gestión Interna</option>
                        <option value="3" > Dirección de Promoción y Difusión</option>     
                        <option value="4" > Coordinación de Contrataciones </option>                                     
                    </select>                        
                </td>
                <td>
                    &nbsp;Ubicación Geográfica&nbsp;<span style="color:red;">*</span>&nbsp;
                    <select id="ubic_geo" name="ubic_geo"class="form-control"   required >
                        <option value="0">Seleccione...</option>   
                        @foreach($entidad as $entidad) 
 
                        <option value="{{$entidad->id}}" @if($entidad->id==24) selected @endif > {{$entidad->descripcion}}</option>
                       @endforeach
                    </select>                        
                </td>
            </tr>  
            <tr>  
                <td>
                    &nbsp;Asignado a:&nbsp;<span style="color:red;">*</span>&nbsp;
                    <input type="text" class="form-control " name="responsable_asignado" id="responsable_asignado" value=""  maxlength="100"  required/>                        
                </td>
                <td >
                    &nbsp;Observaciones  &nbsp;&nbsp;&nbsp;&nbsp;
                    <textarea rows="2" class="form-control"  name="observaciones" id="observaciones" maxlength="200"  > </textarea>
                </td>
            </tr>    
            @endforeach                     
        </table>
                   
        <div class="frameContenedor" style="margin:5px;" align="right">
            <input class='btn btn-info' type="submit" value="Guardar" >
            <a class='btn btn-secondary' href="{{URL::route('mov_bienes')}}">Regresar</a> 
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