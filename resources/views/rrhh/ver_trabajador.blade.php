@extends('layouts.app')
@section('styles')
@endsection
@section('content')
<div class="d-flex" id="wrapper">
        @include('layouts.apprrhh')      
    <div id="page-content-wrapper">
        <div class="sidebar-heading text-center">
            <h4 class="text-primary" >CONTROL DE EXPEDIENTES RRHH</h6>      
            <h6 class="text-dark">Bienvenid@, {{Auth::user()->name}}</h6>
        </div> 
        <div class="container pb-4">
            <div class="row align-items-stretch">
                <div class="col-12">
                    <div class="card mb-4">
                        <div align="center" id="divTituloIndex2" class="text-primary">
                            <b>MOVIMIENTOS DE PERSONAL</b>
                        </div>
                
                            <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
                                <tr>
                                    <td>
                                        <div id="divSubTituloIndex2">
                                        
                                            <hr>
                                            <b>Suministre el  <span style="color:gray; ">N° de Cédula de Identidad del Trabajador(a)</span> a consultar, haga clic en "Buscar" para realizar su consulta. <b>
                                            <hr>   
                                            @include('rrhh.funcionario.mensaje')  
                                
                                        </div>
                                    </td>

                                </tr>
                            </table>
            
                        <form id="formulario" name="formulario" role="search" action="{{url('/rrhh/searchredirect')}}">     
                        @csrf                        
                        <table>               
                            <tr  aling="center">
                            <td colspan="13"  >
                                    &nbsp;Cédula de Identidad&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                    <select id="nacionalidad" name="nacionalidad" style="width:50px;" required>
                                        @foreach ($nacionalidades as $nacionalidad)
                                            <option value="{{ $nacionalidad->id  }}">{{ $nacionalidad->cod }}</option>
                                        @endforeach
                                    </select>
                                    <input type="text" name="search" id="search" value=""  maxlength="12" required/>
                                    @error('cedula')
                                        <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    <input class='btn btn-info' type="submit" value="Buscar"  >
                                </td>                
                            </tr>    
                            </table>                   
                            <p></p>
                            @if(isset($datos_funcionario))                     
                            <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%">                     
                                <tbody>
                                @foreach($datos_funcionario as $key=>$funcionario)
                                <input type="hidden" name="cedula" id="cedula" value="{{$funcionario->numero_identificacion}}"  maxlength="12" required/>
                                <tr  class="table-secondary">
                                <th   colspan=13 height="22" align="center"   >   DATOS DEL TRABAJADOR    </th>
                                </tr>
                                <tr  class="table-primary">

                                <th colspan="13" align="center"     >    NACIONALIDAD - CEDULA DE IDENTIDAD </th>		

                                </tr>
                                <tr>

                                <td   colspan="7" ><div align="center">  @if($funcionario->id_nacionalidad==1) V 
                                @else E @endif -  {{$funcionario->numero_identificacion}} </div></td>

                                </tr>

                                <tr  class="table-primary">
                                <th  colspan=4 align="center"   >   PRIMER NOMBRE    </th>
                                <th  colspan=3 align="center"   >   SEGUNDO NOMBRE    </th>
                                <th  colspan=3 align="center"   >    PRIMER  APELLIDO    </th>
                                <th  colspan=3 align="center"   >   SEGUNDO APELLIDO    </th>
                                </tr>
                                <tr >
                                <td  colspan=4 align="center"   >   {{$funcionario->nombre}}    </td>
                                <td  colspan=3 align="center"  >  {{$funcionario->nombreseg}}    </td>
                                <td  colspan=3 align="center"   >   {{$funcionario->apellido}}     </td>
                                <td  colspan=3 align="center"   >   {{$funcionario->apellidoseg}}     </td>
                                </tr>
                                <tr  class="table-primary">
                                <th  colspan=3  align="center"   >   SEXO    </th>
                                <th  colspan=4 align="center"   >   ESTADO CIVIL      </th>
                                <th  colspan=5 align="center"   >    FECHA Y LUGAR  DE NACIMIENTO    </th>
                                <th  align="center"   >   EDAD    </th>
                                </tr>
                                <tr>
                                <td  colspan=3  align="center"   >   @if($funcionario->id_genero==2) FEMENINO @else MASCULINO @endif    </td>

                                <td  align="center" colspan="4"  > {{$funcionario->est_civil}}   </td>

                                <td  align="center"  colspan=5  >   {{date('d-m-Y', strtotime($funcionario->edad))}}   {{$funcionario->ciudad_nac}}  {{$funcionario->estado_nac}}   </td>

                                <td  align="center"   >{{$edad}}  AÑOS </td>
                                </tr>

                                <tr  class="table-primary">
                                <th  colspan=6  align="center"   >   TIPO DE TRABAJADOR    </th>
                                <th  colspan=3 align="center"   >   CARGO    </th>
                                <th  colspan=4 align="center"   >   UNIDAD DE ADSCRIPCIÓN    </th>
                                </tr>
                                <tr>
                                <td  colspan=6 align="center"   >   {{$funcionario->trabajador}}   </td>
                                <td  colspan=3 rowspan=2 align="center"   >   {{$funcionario->cargo}}   </td>
                                <td  colspan=4 rowspan=2 align="center"   >   {{$funcionario->administrativa}}   </td>
                                </tr>
                                </tbody>

                                @endforeach            
                            </table>  
                            
                        <hr>
                        <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('datos_rrhh',$funcionario->numero_identificacion)}}"><img src="/img/icon/zoom.ico"/>Ver Planilla del Trabajador</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('requisitos_rrhh',$funcionario->numero_identificacion)}}"><img src="/img/icon/asistencia.png" width="40px" hight="40px"/>Ver Requisitos Trabajador</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link"  href="{{URL::route('antecedentes_rrhh',$funcionario->numero_identificacion)}}"><img src="/img/icon/reloj.png" width="40px" hight="40px"/>Antiguedad Adm. Púb.</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{URL::route('mov_rrhh',$funcionario->numero_identificacion)}}"><img src="/img/icon/list.ico"/>Ver Movimientos RRHH</a>
                                    </li>
                                   
                        </ul>
                        <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('vac_pendientes_rrhh',$funcionario->numero_identificacion)}}"><img src="/img/vacacion.png"  width="40px" hight="40px"/>Control de Vacaciones Pendientes</a>
                                    </li>
                        </ul>
                        @endif
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>
            
</div>

@endsection

