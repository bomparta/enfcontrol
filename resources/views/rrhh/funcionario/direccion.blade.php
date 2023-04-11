@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="d-flex" id="wrapper">
        @include('layouts.apprrhh')
      
        <div id="page-content-wrapper">
        <div class="sidebar-heading text-center">
      <h4 class="text-primary" >CONTROL DE EXPEDIENTES RRHH</h6>   
   
      </a>
      <h6 class="text-dark">Bienvenid@, {{Auth::user()->name}}</h6>
    </div> 

            <div class="container pb-4">
                <div class="row align-items-stretch">

                        <div class="col-12">

                            <div class="card mb-4">
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
                                <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top"> &nbsp;Estado de Residencia&nbsp;</span><span style="color:red;">*</span>&nbsp;                                   
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
                                <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">&nbsp;Municipio de Residencia&nbsp;</span><span style="color:red;">*</span>&nbsp;
                                    <select class="form-control"name="_submunicipio" id="_submunicipio" required>
                                    <option value="0">Seleccione...</option>
                                    @foreach ($municipios as $municipios)
                                    @if($item->estado_domicilio == $municipios->id_entidad)
                                        <option value="{{ $municipios->id }}"
                                        @if($item->municipio_domicilio == $municipios->id)selected @endif >
                                        {{ $municipios->nombre }}</option>
                                    @endif    
                                    @endforeach
                                    </select>
                                </td>
                                <td>
                                <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top"> &nbsp;Parroquia de Residencia&nbsp;</span><span style="color:red;">*</span>&nbsp;
                                    <select class="form-control" name="_subparroquia" id="_subparroquia" required>
                                    <option value="0">Seleccione...</option>
                                    @foreach ($parroquias as $parroquias  )
                                        @if($item->municipio_domicilio == $parroquias->id_municipio)
                                            <option value="{{ $parroquias->id }}"
                                            @if($item->parroquia_domicilio == $parroquias->id)selected @endif >
                                            {{ $parroquias->nombre }}</option>
                                        @endif    
                                    @endforeach
                                    </select>
                                    </select>

                                </td>
                                
                            </tr>
                           
                            <!-- FILA 2 -->
                            <tr>
                                <td>
                                <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">  &nbsp;Ciudad / Urbanizaci&oacute;n &nbsp;&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                    <input type="text" class="form-control" name="urbanizacion" id="urbanizacion" onkeyup="mayusculas(this);"  value="{{$item->sector_urbanizacion}}" maxlength="100" required />
                                </td>
                                <td>
                                <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> &nbsp;Calle/Avenida&nbsp;&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                    <input type="text" class="form-control" name="calleAv" id="calleAv" value="{{$item->calle_avenida}}"onkeyup="mayusculas(this);"  maxlength="100" required />
                                </td>
                               
                            </tr>
                            <tr>
                                 <td>
                                 <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;N° Casa o Apartamento&nbsp;&nbsp;&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                    <input type="text" class="form-control" name="nroCasaApto" id="nroCasaApto" onkeyup="mayusculas(this);"  value="{{$item->nro_casa_apartamento}}"  maxlength="100"  required/>
                                </td>
                                <td>
                                <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Nombre de la Casa o Edificio&nbsp;&nbsp;&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                    <input type="text" class="form-control" name="nombreCasaApto" id="nombreCasaApto" onkeyup="mayusculas(this);"  value="{{$item->nombre_casa_edificio_residencia}}"  maxlength="100" required  />
                                </td>
                            </tr>
                            <!-- FILA 3 -->
                            <tr>
                                
                                <td>

                                <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Punto de Referencia:  &nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                    <input type="text" class="form-control"  name="pto_referencia" id="pto_referencia" onkeyup="mayusculas(this);" value="{{$item->piso_nro_casa}}"  maxlength="200" required />
                                </td>
                                <td>
                                <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top"> &nbsp;Condición de la Vivivienda&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <select id="condicon_viv" name="condicon_viv"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1" @if($item->condicion_casa_id=='1')  selected @endif>Propia</option>
                                            <option value="2" @if($item->condicion_casa_id=='2')  selected @endif>Alquilada</option>       
                                            <option value="3" @if($item->condicion_casa_id=='3')  selected @endif>Familiar</option>                                     
                                            <option value="4" @if($item->condicion_casa_id=='4')  selected @endif>Otros</option>                                     
                                    </select> 
                                </td>
                                <td>
                                <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Código Postal:  &nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
                            <input type="text" class="form-control"  name="cod_postal" id="cod_postal" value="{{$item->codigo_postal}}"  maxlength="200" onkeypress="return isNumberKey(event);"  />
                            </td> 
                            </tr>
                            <tr>
                            <td>
                            <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">  &nbsp;Teléfono de Habitación&nbsp;</span><span style="color:red;">*</span>&nbsp;<br> 
                           <div class="input-group">                              
                                    <select id="codhab" name="codhab" style="width:70px;" required>
                                        @foreach ($cod_habs as $cod_habs) var_dump($cod_habs)
                                            <option value="{{ $cod_habs->descripcion }}" @if(Str::substr($item->telfhabitacion,0,4)==$cod_habs->descripcion)  selected @endif >{{ $cod_habs->descripcion }}</option>
                                        @endforeach
                                    </select>                                    
                                <span data-tooltip="Permite sólo números" sdata-flow="top">
                                    <input type="text" class="form-control" name="telfhabitacion" id="telfhabitacion" 
                                    value="{{Str::substr($item->telfhabitacion,4,7)}}" 
                                    onkeypress="return isNumberKey(event);" maxlength="100"/>
                                </span>   
                          </div>    
                              
                            </td>
                            
                            <td>
                            <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">  &nbsp;Teléfono Móvil(Celular)&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
                                <div class="input-group">
                                <select id="codtelecel" name="codtelecel" style="width:70px;" required>
                                    @foreach ($cod_cels as $cod_cel)
                                        <option value="{{ $cod_cel->descripcion }}" @if(Str::substr($item->telcelular,0,4)==$cod_cel->descripcion)  selected @endif>{{ $cod_cel->descripcion }}</option>
                                    @endforeach
                                </select>
                                <span data-tooltip="Permite sólo numéros" sdata-flow="top">   <input type="text" class="form-control" name="telefonoCel" id="telefonoCel" onkeypress="return isNumberKey(event);" value="{{Str::substr($item->telcelular,4,7)}}"  maxlength="11" onKeyPress="return valText(this.value, event, 'int');"  class="campoTexto" required/></span>
                                </div>
                                
                            </td>

                            </tr>
                            <tr>
                            <td>
                            <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">&nbsp;Otra dirección donde se pueda localizar:  &nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
                            <input type="text" class="form-control"  name="dir_contacto" id="dir_contacto" value="{{$item->direccion_contacto}}"  onkeyup="mayusculas(this);" maxlength="200"  required/>
                            </td>
                            <td>
                            <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">  &nbsp;Teléfono Persona Contacto&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
                                <div class="input-group">
                                <select id="cod_contacto" name="cod_contacto" style="width:70px;" required>
                                    @foreach ($todos_cod as $todos_cod)
                                        <option value="{{ $todos_cod->descripcion }}"@if(Str::substr($item->telefono_contacto,0,4)==$todos_cod->descripcion)  selected @endif>{{ $todos_cod->descripcion }}</option>
                                    @endforeach
                                    
                                </select>
                                <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"><input type="text" class="form-control" name="telf_contacto" id="telf_contacto" onkeypress="return isNumberKey(event);" value="{{Str::substr($item->telefono_contacto,4,7)}}" maxlength="100" required/></span>
                                </div>
                            </td>
                            <td>
                            <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top"> &nbsp;Persona Contacto:  &nbsp;&nbsp;&nbsp;&nbsp;</span><span style="color:red;">*</span>&nbsp;<br>
                            <input type="text" class="form-control"  name="per_contacto" id="per_contacto"  onkeyup="mayusculas(this);" value="{{$item->persona_contacto}}"  maxlength="200" required />
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
                          </div> <!-- /.card -->
                        </div>
                
                </div>
            </div>
        </div> <!-- page-content-wrapper -->
    </div> <!-- wrapper -->
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="{{url('js/funciones_generales.js')}}"></script>

@endsection