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
                                    <b>Suministre sus datos de los <span style="color:gray;">Idiomas</span> que domina, haga clic en "Guardar" para registrar su información <b>
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
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">   &nbsp;Idioma&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" required name="nommbre_idioma" id="nommbre_idioma" onkeyup="mayusculas(this);" value="{{$item->nommbre_idioma}}" maxlength="25"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top"> &nbsp;Habla&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <select id="habla" name="habla"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1" @if ($item->habla==1) selected @endif>REGULAR</option>
                                            <option value="2"  @if ($item->habla==2) selected @endif>BIEN</option>                                        
                                            <option value="3"  @if ($item->habla==3) selected @endif>MUY BIEN</option>                                        
                                    </select>   
                        </td>
                        <td>
                        <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">  &nbsp;Lee&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <select id="lee" name="lee"class="form-control"  style="width:190px;" required >
                                            <option value="0">Seleccione...</option>
                                            <option value="1"  @if ($item->lee==1) selected @endif>REGULAR</option>
                                            <option value="2" @if ($item->lee==2) selected @endif>BIEN</option>                                        
                                            <option value="3" @if ($item->lee==3) selected @endif>MUY BIEN</option>                                        
                                    </select> 
                        </td>
                     
                        <td>
                        <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top">  &nbsp;Escribe&nbsp;</span><span style="color:red;">*</span>&nbsp;
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
                        <input class='btn btn-info' type="submit" value="Guardar" >
                        <a class='btn btn-secondary' href="{{URL::route('idiomas_funcionario')}}">Regresar</a> 
                    </div>

                    
                    @endforeach
                    
                   
                    @endif
                </form>
                </div>
    </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{url('js/funciones_generales.js')}}"></script>
@endsection