@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
    @include('layouts.apprrhh')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
            <div align="center" id="divTituloIndex2" class="text-primary">
               
                <b>INSTRUCCIÓN FORMAL Y COMPLEMENTARIA</b>
                </div>
              
                    <table  align="center" border="0" cellpadding="5" cellspacing="2" width="100%" >
                    <tr>
                            <td colspan="4">
                            <div class="col-12 text-center">
                
                                <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('educacionfuncionario')}}">Nivel de Instrucción</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link "  href="{{route('estudios_actfuncionario')}}">Estudios Actuales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('cursos_funcionario')}}">Cursos Realizados</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{route('idiomas_funcionario')}}">Idiomas</a>
                                </li>
                                </ul>
                                     
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <b>Suministre sus datos de los <span style="color:gray;">Idiomas</span> que domina, haga clic en "Registrar Idioma" para registrar su información <b>
                                    <hr>   
                                </div>
                            </td>
                        </tr>
                        </table>
                       
                       <table>
               <form id="formulario" name="formulario" method="post" action="{{route('idiomasregistrar')}}">
               @if(isset($funcionario_id))     
                <input id="id_funcionario" type="hidden" name="id_funcionario" value="{{$funcionario_id}}" >
                @csrf
               
                    <tr> 
                        
                        <td>
                            &nbsp;Idioma&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="nommbre_idioma" id="nommbre_idioma" value="" maxlength="25"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        &nbsp;Habla&nbsp;<span style="color:red;">*</span>&nbsp;
                            <select id="habla" name="habla"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1">REGULAR</option>
                                            <option value="2">BIEN</option>                                        
                                            <option value="3">MUY BIEN</option>                                        
                                    </select>   
                        </td>
                        <td>
                        &nbsp;Lee&nbsp;<span style="color:red;">*</span>&nbsp;
                            <select id="lee" name="lee"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1">REGULAR</option>
                                            <option value="2">BIEN</option>                                        
                                            <option value="3">MUY BIEN</option>                                        
                                    </select> 
                        </td>
                     
                        <td>
                        &nbsp;Escribe&nbsp;<span style="color:red;">*</span>&nbsp;
                            <select id="escribe" name="escribe"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1">REGULAR</option>
                                            <option value="2">BIEN</option>                                        
                                            <option value="3">MUY BIEN</option>                                        
                                    </select> 
                        </td>
                        
                    </tr>                  
                   
                    </table>

                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Registrar Idioma" >
                    </div>

                    <div class="table-responsive mt-3">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">                        
                            <thead>
                                <tr>
                                    <th>Idioma</th>
                                    <th>Habla</th>
                                    <th>Lee</th>
                                    <th>Escribe</th>
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                        <th>Opcion</th>
                                    @endif
                                </tr>
                            </thead>   
                            <tbody>      
                                @foreach($idiomas as $idiomas)                         
                                <tr>      
                                <td>{{$idiomas->nommbre_idioma}}</td>                                              
                                <td>@if($idiomas->habla==1)REGULAR @elseif($idiomas->habla==2)BIEN @elseif($idiomas->habla==3)MUY BIEN @endif  </td>
                      
                                <td>@if($idiomas->lee==1)REGULAR @elseif($idiomas->lee==2)BIEN @elseif($idiomas->lee==3)MUY BIEN @endif  </td>
                                <td>@if($idiomas->escribe==1)REGULAR @elseif($idiomas->escribe==2)BIEN @elseif($idiomas->escribe==3)MUY BIEN @endif  </td>
                                      
                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                            <td class="text-center">
                                            <a href= "idiomas_edit/{{$idiomas->id}}" class="btn btn-info" data-tip="Detalle" title="Actualizar Idioma" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
                                            </a>
                                            </td>
                                        @endif                                                            
                                    </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Idioma</th>
                                    <th>Habla</th>
                                    <th>Lee</th>
                                    <th>Escribe</th>
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                        <th>Opcion</th>
                                    @endif
                                    
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    @endif
                </form>

            </div>
        </div>
    </div>
</div>

@endsection