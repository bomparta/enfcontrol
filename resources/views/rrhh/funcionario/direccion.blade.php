@extends('layouts.app')
@section ('content')

<div class="container-fluid">
<div class="row justify-content-start">
@include('layouts.apprrhh')  
       
        
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
            <div align="center" id="divTituloIndex2" class="text-primary">
              
                <b>DATOS PERSONALES</b>
                </div>
           
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
                   
                                <div id="divSubTituloIndex2">
                                    <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{route('buscarfuncionario')}}">Datos Básicos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{route('direccionfuncionario')}}">Dirección de Domicilio</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link "  href="{{route('hist_medicofuncionario')}}">Historial Médico</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{route('bancofuncionario')}}">Cuentas Bancarias</a>
                                    </li>
                                   
                                    </ul>
                                    <hr>
                                    <b>Suministre su <span style="color:gray; ">Dirección de Domicilio</span>, haga clic en "Guardar" para registrar su información <b>
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                           
                                </div>
                            </td>
                        </tr>
                     
          <form id="formulario" name="formulario" method="POST" action="{{route('updatedireccion')}}">     
          @if (count($funcionario)>0)   
          @foreach($funcionario as $key=>$item)       
         <input id="id_funcionario" type="hidden" name="id_funcionario" value="{{$item->funcionario_id}}" >
          @csrf
          <tr>
                                <td>
                                    &nbsp;Estado de Residencia&nbsp;<span style="color:red;">*</span>&nbsp;
                                   
                                    <select name="_estado"  id="_estado" class="form-control" required >
                                <option value="0">Seleccione...</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado->id }}"
                                        @if($item->estado_domicilio == $estado->id)selected @endif >
                                        {{ $estado->descripcion }}</option>
                                    @endforeach
                                </select>
                                </td>
                             


                                <td>
                                    &nbsp;Municipio de Residencia&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <select class="form-control"name="_submunicipio" id="_submunicipio" required></select>
                                        
                                </td>
                                <td>
                                    &nbsp;Parroquia de Residencia&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <select class="form-control" name="_subparroquia" id="_subparroquia" required></select>

                                </td>
                                
                            </tr>
                           
                            <!-- FILA 2 -->
                            <tr>
                                <td>
                                    &nbsp;Ciudad / Urbanizaci&oacute;n&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="form-control" name="urbanizacion" id="urbanizacion" value="{{$item->sector_urbanizacion}}" maxlength="100" required />
                                </td>
                                <td>
                                    &nbsp;Calle/Avenida&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="form-control" name="calleAv" id="calleAv" value="{{$item->calle_avenida}}" maxlength="100" required />
                                </td>
                               
                            </tr>
                            <tr>
                                 <td>
                                    &nbsp;N° Casa o Apartamento&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="form-control" name="nroCasaApto" id="nroCasaApto" value="{{$item->nro_casa_apartamento}}"  maxlength="100"  required/>
                                </td>
                                <td>
                                    &nbsp;Nombre de la Casa o Edificio&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="form-control" name="nombreCasaApto" id="nombreCasaApto" value="{{$item->nombre_casa_edificio_residencia}}"  maxlength="100" required  />
                                </td>
                            </tr>
                            <!-- FILA 3 -->
                            <tr>
                                
                                <td>

                                    &nbsp;Pto de Referencia:  &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="form-control"  name="pto_referencia" id="pto_referencia" value="{{$item->piso_nro_casa}}"  maxlength="200" required />
                                </td>
                                <td>
                                &nbsp;Condicion de la Vivivienda&nbsp;<span style="color:red;">*</span>&nbsp;
                            <select id="condicon_viv" name="condicon_viv"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1" @if($item->condicion_casa_id=='1')  selected @endif>Propia</option>
                                            <option value="2" @if($item->condicion_casa_id=='2')  selected @endif>Alquilada</option>       
                                            <option value="3" @if($item->condicion_casa_id=='3')  selected @endif>Familiar</option>                                     
                                            <option value="4" @if($item->condicion_casa_id=='4')  selected @endif>Otros</option>                                     
                                    </select> 
                                </td>
                                <td>
                            &nbsp;Codigo Postal:  &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" class="form-control"  name="cod_postal" id="cod_postal" value="{{$item->codigo_postal}}"  maxlength="200"  />
                            </td> 
                            </tr>
                            <tr>
                            <td>
                                &nbsp;Telefono de Habitacion&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <div class="input-group">
                                <select id="codhab" name="codhab" style="width:70px;" required>
                                    @foreach ($cod_habs as $cod_habs) var_dump($cod_habs)
                                        <option value="{{ $cod_habs->descripcion }}" @if(Str::substr($item->telfhabitacion,0,4)==$cod_habs->descripcion)  selected @endif >{{ $cod_habs->descripcion }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control" name="telfhabitacion" id="telfhabitacion" value="{{Str::substr($item->telfhabitacion,4,7)}}"  maxlength="100"/>
                                </div>
                                
                               
                            </td>
                            
                            <td>
                                &nbsp;Telefono Móvil(Celular)&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <div class="input-group">
                                <select id="codtelecel" name="codtelecel" style="width:70px;" required>
                                    @foreach ($cod_cels as $cod_cel)
                                        <option value="{{ $cod_cel->descripcion }}" @if(Str::substr($item->telcelular,0,4)==$cod_cel->descripcion)  selected @endif>{{ $cod_cel->descripcion }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control" name="telefonoCel" id="telefonoCel" value="{{Str::substr($item->telcelular,4,7)}}"  maxlength="11" onKeyPress="return valText(this.value, event, 'int');"  class="campoTexto" required/>
                                </div>
                                
                            </td>

                            </tr>
                            <tr>
                            <td>
                            &nbsp;Otra dirección donde se pueda localizar:  &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" class="form-control"  name="dir_contacto" id="dir_contacto" value="{{$item->direccion_contacto}}"  maxlength="200"  />
                            </td>
                            <td>
                                &nbsp;Telefono Persona Contacto&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <div class="input-group">
                                <select id="cod_contacto" name="cod_contacto" style="width:70px;" required>
                                    @foreach ($todos_cod as $todos_cod)
                                        <option value="{{ $todos_cod->descripcion }}"@if(Str::substr($item->telefono_contacto,0,4)==$todos_cod->descripcion)  selected @endif>{{ $todos_cod->descripcion }}</option>
                                    @endforeach
                                    
                                </select>
                                <input type="text" class="form-control" name="telf_contacto" id="telf_contacto" value="{{Str::substr($item->telefono_contacto,4,7)}}" maxlength="100" required/>
                                </div>
                            </td>
                            <td>
                            &nbsp;Persona Contacto:  &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" class="form-control"  name="per_contacto" id="per_contacto" value="{{$item->persona_contacto}}"  maxlength="200"  />
                            </td>
                        </tr>                            
                                                
                      </table>
                      @endforeach
                      <div class="frameContenedor" style="margin:5px;" align="right">
                      <input class='btn btn-info' type="submit" value="Guardar" >
                        </div>
                    @else
                    <div class="frameContenedor" style="margin:5px;"align="center">
                           <h2 aling="center"><b>DEBE COMPLETAR LOS DATOS BÁSICOS</b></h2>
                        </div>
                    @endif     
                         
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