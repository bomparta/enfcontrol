@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
    @include('layouts.appcontrol')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">

            <div class="col-12 text-center">
                        <h1>Informacion</h1>
                    </div>
                    <form id="formulario" name="formulario" method="post" action="#">
                        <input name="continuar" id="continuar" type="hidden" value=""/>
                    <!--	<div class="frame3">-->
                        <table align="center" border="0" cellpadding="2" cellspacing="5" width="100%" >
                            <!-- FILA 1 + FOTO -->
                            <tr>
                                <td colspan="4">
                                    <div align="center" id="divTituloIndex2">
                                           <b> DIRECCION</b>
                                    </div>
                                    <div id="divSubTituloIndex2">
                                        Suministre sus direccion, haga clic en "Guardar y Continuar" .
                                    </div>
                                    <br><br>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;Estado de Residencia&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <select name="_estado" id="_estado"   style="width:190px;">
                                        @foreach($estados as $estado)
                                        <option value="{{$estado->id}}">{{$estado->descripcion}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    &nbsp;Municipio de Residencia&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <select name="" id="_submunicipio"></select>
                                        
                                </td>
                                <td>
                                    &nbsp;Parroquia de Residencia&nbsp;<span style="color:red;">*</span>&nbsp;
                                    <select name="" id="_subparroquia"></select>

                                </td>
                                
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <!-- FILA 2 -->
                            <tr>
                                <td>
                                    &nbsp;Ciudad / Urbanizaci&oacute;n&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="urbanizacion" id="urbanizacion" value="" style="width:190px;" maxlength="100"  />
                                </td>
                                <td>
                                    &nbsp;Calle/Avenida&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="calleAv" id="calleAv" value="" style="width:190px;" maxlength="100"  />
                                </td>
                                <td>
                                    &nbsp;Nombre Casa o Edificio&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="nombreCasaApto" id="nombreCasaApto" value=""  style="width:190px;" maxlength="100"  />
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <!-- FILA 3 -->
                            <tr>
                                <td>
                                    &nbsp;Pto de Referencia:  &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="text" name="urbanizacion" id="urbanizacion" value="" style="width:190px;" maxlength="200"  />
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                                                
                      </table>
                          
                         <div class="frameContenedor" style="margin:5px;" align="right">
                            <a class='btn btn-info' href="" >Guardar y Continuar</a>
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