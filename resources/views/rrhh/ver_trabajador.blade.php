@extends('layouts.app')
@section ('content')

<div class="container-fluid">
<div class="row justify-content-start">
@include('layouts.apprrhh')  
       
        
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
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
        <table>
          <form id="formulario" name="formulario" role="search" action="{{url('/rrhh/searchredirect')}}">     
              
       
          @csrf
                        
                        <tr>
                        <td colspan="3">
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

                   
                        <hr>
                      @if(isset($datos_funcionario))
                    
                      <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%">
                     
                            <tbody>
                            @foreach($datos_funcionario as $key=>$funcionario)
                            <tr  class="table-secondary">
                            <th   colspan=13 height="22" align="center"   >   DATOS DEL TRABAJADOR    </th>
                            </tr>
                            <tr  class="table-primary">

                            <th colspan="13" align="center"     >    NACIONALIDAD - CEDULA DE IDENTIDAD </th>		

                            </tr>
                            <tr>

                            <td   colspan="7" ><div align="center">  @if($funcionario->id_nacionalidad==1) V 
                            @else E @endif - {{$funcionario->numero_identificacion}}  </div></td>

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
                           <tr height="22" rowspan=3><td ></td></tr>
                           <tr class="table-secondary">
                            <td colspan=6 style="margin:5px;" align="center">
                                <a class='btn btn-primary' href="{{route('datos_rrhh',$funcionario->numero_identificacion)}}"><img src="/img/icon/zoom.ico"/>Ver Planilla Completa</a>  
                            </td>
                            <td colspan=7 style="margin:5px;" align="center">       
                                 <a class='btn btn-primary' href="{{URL::route('mov_rrhh',$funcionario->numero_identificacion)}}"><img src="/img/icon/list.ico"/>Ver Movimientos RRHH</a> 
                            </td>                       
                            </tr>
                            @endforeach
                            @endif
                           

                    </table>
             
                     

                   
                   
                         
                    </form>

            </div>
            
        </div>
        
    </div>
</div>



@endsection

