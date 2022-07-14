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
          <form id="formulario" name="formulario" method="POST" action="#">       
         
          @csrf
                            <tr>
                                <td>
                                    &nbsp;Estado de Residencia&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <select name="estado" id="_estado"   style="width:190px;" class="form-control">
                                        @foreach($estados as $estado)
                                        <option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    &nbsp;Municipio de Residencia&nbsp;<span style="color:red;" >*</span>&nbsp;
                                    <select name="" id="_submunicipio" class="form-control" style="width:190px;"></select>                                        
                                </td>
                                <td>
                                    &nbsp;Parroquia de Residencia&nbsp;<span style="color:red;" >*</span>&nbsp;
                                    <select name="" id="_subparroquia" class="form-control" style="width:190px;"></select>
                                </td>                                
                            </tr>
                           
                            <!-- FILA 2 -->
                            <tr>
                                <td>
                                    &nbsp;Ciudad / Urbanizaci&oacute;n&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="form-control" name="urbanizacion" id="urbanizacion" value="" maxlength="100"  />
                                </td>
                                <td>
                                    &nbsp;Calle/Avenida&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="form-control" name="calleAv" id="calleAv" value="" maxlength="100"  />
                                </td>
                               
                            </tr>
                            <tr>
                                 <td>
                                    &nbsp;N° Casa o Apartamento&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="form-control" name="nombreCasaApto" id="nombreCasaApto" value=""  maxlength="100"  />
                                </td>
                                <td>
                                    &nbsp;Nombre de la Casa o Edificio&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="form-control" name="nombreCasaApto" id="nombreCasaApto" value=""  maxlength="100"  />
                                </td>
                            </tr>
                            <!-- FILA 3 -->
                            <tr>
                                <td>

                                    &nbsp;Pto de Referencia:  &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="text" class="form-control"  name="urbanizacion" id="urbanizacion" value=""  maxlength="200"  />
                                </td>
                                <td>
                                &nbsp;Condicion de la Vivivienda&nbsp;<span style="color:red;">*</span>&nbsp;
                            <select id="condicon_viv" name="condicon_viv"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1">Propia</option>
                                            <option value="2">Alquilada</option>       
                                            <option value="3">Familiar</option>                                     
                                            <option value="4">Otros</option>                                     
                                    </select> 
                                </td>
                                <td>
                            &nbsp;Codigo Postal:  &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" class="form-control"  name="cod_postal" id="cod_postal" value=""  maxlength="200"  />
                            </td> 
                            </tr>
                            <tr>
                            <td>
                                &nbsp;Telefono de Habitacion&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="codtele" name="codtele" style="width:70px;" required>
                                    @foreach ($cod_habs as $cod_hab)
                                        <option value="{{ $cod_hab->descripcion }}">{{ $cod_hab->descripcion }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control" name="telfhabitacion" id="telfhabitacion" value=""  maxlength="100"/>
                            </td>
                            
                            <td>
                                &nbsp;Telefono Móvil(Celular)&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="codtelecel" name="codtelecel" style="width:70px;" required>
                                    @foreach ($cod_cels as $cod_cel)
                                        <option value="{{ $cod_cel->descripcion }}">{{ $cod_cel->descripcion }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control" name="telefonoCel" id="telefonoCel" value=""  maxlength="11" onKeyPress="return valText(this.value, event, 'int');"  class="campoTexto" required/>
                            </td>

                            </tr>
                            <tr>
                            <td>
                            &nbsp;Otra dirección donde se pueda localizar:  &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" class="form-control"  name="dir_contacto" id="dir_contacto" value=""  maxlength="200"  />
                            </td>
                            <td>
                                &nbsp;Telefono Persona Contacto&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="cod_what" name="cod_what" style="width:70px;" required>
                                    @foreach ($cod_cels as $cod_what)
                                        <option value="{{ $cod_what->descripcion }}">{{ $cod_what->descripcion }}</option>
                                    @endforeach
                                     @foreach ($cod_habs as $cod_hab)
                                        <option value="{{ $cod_hab->descripcion }}">{{ $cod_hab->descripcion }}</option>
                                    @endforeach
                                </select>
                                <input type="text" class="form-control" name="telf_contacto" id="telf_contacto" value="" maxlength="100" required/>
                            </td>
                            <td>
                            &nbsp;Persona Contacto:  &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="text" class="form-control"  name="per_contacto" id="per_contacto" value=""  maxlength="200"  />
                            </td>
                        </tr>                            
                                                
                      </table>
                          
                         <div class="frameContenedor" style="margin:5px;" align="right">
                            <a class='btn btn-info' href="" >Guardar</a>
                        </div>
                    </form>

            </div>
            
        </div>
        <script>
            const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
            document.getElementById('_estado').addEventListener('change',(e)=>{
                fetch('submunicipio',{
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
                fetch('subparroquia',{
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