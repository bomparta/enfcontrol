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
               <form id="formulario" name="formulario" method="post" action="{{route('actualizaridiomas')}}">
         @foreach($idiomas as $key=>$item)  
                <input id="id_idioma" type="hidden" name="id_idioma" value="{{$item->id}}" >
                @csrf
               
                    <tr> 
                        
                        <td>
                            &nbsp;Idioma&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="nommbre_idioma" id="nommbre_idioma" value="{{$item->nommbre_idioma}}" maxlength="25"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        &nbsp;Habla&nbsp;<span style="color:red;">*</span>&nbsp;
                            <select id="habla" name="habla"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1" @if ($item->habla==1) selected @endif>REGULAR</option>
                                            <option value="2"  @if ($item->habla==2) selected @endif>BIEN</option>                                        
                                            <option value="3"  @if ($item->habla==3) selected @endif>MUY BIEN</option>                                        
                                    </select>   
                        </td>
                        <td>
                        &nbsp;Lee&nbsp;<span style="color:red;">*</span>&nbsp;
                            <select id="lee" name="lee"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1"  @if ($item->lee==1) selected @endif>REGULAR</option>
                                            <option value="2" @if ($item->lee==2) selected @endif>BIEN</option>                                        
                                            <option value="3" @if ($item->lee==3) selected @endif>MUY BIEN</option>                                        
                                    </select> 
                        </td>
                     
                        <td>
                        &nbsp;Escribe&nbsp;<span style="color:red;">*</span>&nbsp;
                            <select id="escribe" name="escribe"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1" @if ($item->escribe==1) selected @endif>REGULAR</option>
                                            <option value="2" @if ($item->escribe==2) selected @endif>BIEN</option>                                        
                                            <option value="3" @if ($item->escribe==3) selected @endif>MUY BIEN</option>                                        
                                    </select> 
                        </td>
                        
                    </tr>                  
                   
                    </table>

                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Registrar Idioma" >
                        <a class='btn btn-secondary' href="{{URL::route('idiomas_funcionario')}}">Regresar</a> 
                    </div>

                    
                    @endforeach
                </form>

            </div>
        </div>
    </div>
</div>

@endsection