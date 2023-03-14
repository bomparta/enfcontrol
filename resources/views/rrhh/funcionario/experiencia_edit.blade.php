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
              
                <b>EXPERIENCIA LABORAL</b>
                </div>
                <form id="formulario" name="formulario" method="post" action="{{route('actualizarlaboral')}}">
              
                    @foreach($laboral as $key=>$item)
                <input id="id_experiencia" type="hidden" name="id_experiencia" value="{{$item->id}}" >
          @csrf
                    <table align="center" border="0" cellpadding="2" cellspacing="5" width="100%" >
                    <tr>
                            <td colspan="4">
                            <div class="col-12 text-center">
                                     
                                </div>
                                <div id="divSubTituloIndex2">
                                    <hr>
                                    <b>Suministre sus datos de su <span style="color:gray;">Experiencia Laboral</span> más reciente, haga clic en "Guardar" para registrar su información <b>
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                                </div>
                            </td>
                        </tr>
                    
                    <tr>
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">    &nbsp;Empresa u Organización&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" name="empresa" id="empresa" value="{{$item->nombre_empresa}}" onkeyup="mayusculas(this);"maxlength="200" required/>
                        </td>
                   
                        <td>
                        <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">     &nbsp;Cargo de desempeñado&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" name="cargo" id="cargo" value="{{$item->cargo}}"  onkeyup="mayusculas(this);" maxlength="150" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <span data-tooltip="Indique una fecha del calendario" sdata-flow="top">  &nbsp;Fecha Ingreso&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" name="fechaingreso" id="fechaingreso" value="{{$item->fecha_ingreso}}" style="width:190px;" maxlength="25" required/>
                        </td>
                   
                        <td>
                        <span data-tooltip="Indique una fecha del calendario" sdata-flow="top">  &nbsp;Fecha de Egreso&nbsp;</span><span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" name="fechaegreso" id="fechaegreso" value="{{$item->fecha_egreso}}" style="width:190px;" maxlength="25" required/>
                        </td>
          
                        <td>
                                &nbsp;Telefono Empresa u Organización&nbsp;<br>
                                <div class="input-group">
                                <span data-tooltip="Seleccione un valor de la lista" sdata-flow="top"> 
                                    <select id="cod_telefono" name="cod_telefono" style="width:70px;" required>
                                    @foreach ($todos_cod as $todos_cod)
                                        <option value="{{ $todos_cod->descripcion }}" @if(Str::substr($item->telefono_empresa,0,4)==$todos_cod->descripcion)  selected @endif>{{ $todos_cod->descripcion }}</option>
                                    @endforeach
                                    
                                </select>
                                </span>
                                <span data-tooltip="Permite sólo caracteres alfanuméricos" sdata-flow="top">
                                     <input type="text" class="form-control" name="telefono" id="telefono"  onkeypress="return isNumberKey(event);" value="{{Str::substr($item->telefono_empresa,4,7)}}" maxlength="7" />
                                </span>
                                </div>
                            </td>
                        <td></td>
                    </tr>
                    </table>
                    @endforeach
                    <div class="frameContenedor" style="margin:5px;" align="right">
                    <input class='btn btn-info' type="submit" value="Guardar" >
                    <a class='btn btn-secondary' href="{{URL::route('laboralfuncionario')}}">Regresar</a> 
                    </div>
                
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