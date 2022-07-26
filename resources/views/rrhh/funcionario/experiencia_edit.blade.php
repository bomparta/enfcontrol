@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
    @include('layouts.apprrhh')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
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
                            &nbsp;Empresa u Organización&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" name="empresa" id="empresa" value="{{$item->nombre_empresa}}" maxlength="200" required/>
                        </td>
                   
                        <td>
                            &nbsp;Cargo de desempeñado&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="text" class="form-control" name="cargo" id="cargo" value="{{$item->cargo}}"  maxlength="150" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;Fecha Ingreso&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" name="fechaingreso" id="fechaingreso" value="{{$item->fecha_ingreso}}" style="width:190px;" maxlength="25" required/>
                        </td>
                   
                        <td>
                            &nbsp;Fecha de Egreso&nbsp;<span style="color:red;">*</span>&nbsp;
                            <input type="date" class="form-control" name="fechaegreso" id="fechaegreso" value="{{$item->fecha_egreso}}" style="width:190px;" maxlength="25" required/>
                        </td>
          
                        <td>
                                &nbsp;Telefono Empresa u Organización&nbsp;<br>
                                <div class="input-group">
                                <select id="cod_telefono" name="cod_telefono" style="width:70px;" required>
                                    @foreach ($todos_cod as $todos_cod)
                                        <option value="{{ $todos_cod->descripcion }}" @if(Str::substr($item->telefono_empresa,0,4)==$todos_cod->descripcion)  selected @endif>{{ $todos_cod->descripcion }}</option>
                                    @endforeach
                                    
                                </select>
                                <input type="text" class="form-control" name="telefono" id="telefono" value="{{Str::substr($item->telefono_empresa,4,7)}}" maxlength="7" />
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

@endsection