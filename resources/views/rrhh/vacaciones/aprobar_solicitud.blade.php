@extends('layouts.app')
@section ('content')

<div class="container-fluid">
<div class="row justify-content-start">
@include('layouts.appvacaciones')  
       
        
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
            <div align="center" id="divTituloIndex2" class="text-primary">
              
                <b>APROBAR SOLICITUD DE VACACIONES</b>
                </div>
           
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
                         <tr>
                            <td>
                                <div id="divSubTituloIndex2">
                                   
                                    <hr>
                                    <b> Sumistrar los datos correspondientes a la <span style="color:gray; ">Aprobación de Solicitud de Vacaciones </span>.
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                           
                                </div>
                            </td>

                        </tr>
                    </table>
      
          <form id="formulario" name="formulario" method="POST" action="{{route('store_rrhh')}}">    
          @csrf
          @if(isset($datos_funcionario))
          @foreach($datos_funcionario as $key=>$funcionario)
          <div class="frameContenedor" style="margin:5px;" align="right">
          <input type= "hidden" id="funcionario_id" name="funcionario_id" value="{{$funcionario->funcionario_id}}" class="form-control"  >    
          <input type= "hidden" id="cedula" name="cedula" value="{{$cedula}}" class="form-control"  >                                                        
                
            
                   
                      <table align="center" border="1" cellpadding="2" cellspacing="2" width="100%">
                     
                     <tbody>
                    
                     <tr  class="table-secondary">
                     <th   colspan=9 height="22" align="center"   > <b>  DATOS DEL TRABAJADOR  </b>  </th>
                     </tr>
                     <tr  class="table-primary">
                         <th  rowspan=2  colspan="2"align="center"     >    NACIONALIDAD - CEDULA DE IDENTIDAD </th>
                        
                     </tr>
                     <tr>
                     <td   ><div align="center">  @if($funcionario->id_nacionalidad==1) V 
                     @else E @endif - {{$funcionario->numero_identificacion}}  </div></td>
                     

                     </tr>

                     <tr  class="table-primary">
                     <th  align="center"   >   NOMBRE(s)    </th>
                     <th  align="center"   >   APELLIDO(s)    </th>
                     <th  align="center"   >   TIPO DE TRABAJADOR    </th>
                     <th  align="center"   >   CARGO    </th>
                    </tr>
                    
                     <tr  >
                     <td   >   {{$funcionario->nombre.' '.$funcionario->nombreseg}}   </td>                   
                     <td  >   {{$funcionario->apellido.' '. $funcionario->apellidoseg}}   </td>                     <
                     <td  >   {{$funcionario->trabajador}}   </td>
                     <td     >   {{$funcionario->cargo}}   </td>
                    </tr  >
                    <tr class="table-primary">                     
                        <th  align="center"   >   UNIDAD DE ADSCRIPCIÓN    </th>
                        <th    align="center"   >   FECHA DE INGRESO ADMINISTRACIÓN PÚBLICA    </th>
                        <th   align="center"   >   FECHA DE INGRESO FENFMP    </th>
                        <th  align="center"   >   FECHA DE INGRESO VACACIONES   </th>
                     </tr>
                     <tr  >
                     <td  >   {{$funcionario->administrativa}}   </td>
                     <td  align="center"   >   {{date('d-m-Y',strtotime($funcionario->fecha_ingreso_adm))}}   </td>
                     <td    >    {{date('d-m-Y',strtotime($funcionario->fecha_ingreso_fund))}}   </td>
                     <td   >    {{date('d-m-Y',strtotime($funcionario->fecha_ingreso_vac))}}   </td>
                     </tr>
                     
                   
                     </tbody>
                     
                    </table>
                    <p><p>
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%">
                   <tr>
                   <tr>
                           
                            <td>
                                &nbsp;Lapso de Vacaciones a Solicitar&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="lapso_pendientes" name="lapso_pendientes"  class="form-control" readonly >
                                <option value="0">Seleccione...</option>
                                  
                                </select>
                                @error('id_tipo_trabajador')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>
                            <td>
                                &nbsp;Fecha de Inicio del Disfrute de Vacaciones&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;">*</span><br>
                                <input type="date" name="fechadisfrute" id="fechadisfrute" value=""  readonly/>
                            </td>
                            @error('fechadisfrute')
                                <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror  
                       
                            <td>
                            <td>
                                &nbsp;Dias a Disfrutar <br>
                                <input type= "text" id="dias_disfrute" rows="2" name="dias_disfrute" onkeyup="mayusculas(this);"  value="" class="form-control" readonly  >                              
                                @error('dias_disfrute')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>
                            
                        </tr>
                        <td>
                                &nbsp;Tipo de Aprobación&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="tipo_aprobacion" name="tipo_aprobacion"  class="form-control" required >
                                <option value="0">Seleccione...</option>
                                <option value="1">Aprobado</option>
                                <option value="2">Diferido</option>  
                                <option value="3">Negado</option>
                                </select>
                                @error('tipo_aprobacion')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>
                                               
                            <td>
                                &nbsp;Observaciones <br>
                                <input type= "text" id="observaciones" rows="2" name="observaciones" onkeyup="mayusculas(this);"  value="" class="form-control"  >                              
                                @error('observaciones')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>
                        </tr>
                    
                    <tr> 
                    <td >
                   
                    </td>
                   
                    </table>
  
                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Guardar" >
                        <a class='btn btn-secondary' href="{{URL::route('vacaciones_aprobadas')}}">Regresar</a> 
                    </div>
                    @endforeach
                    @endif 
                    </form>
            

            </div>
            
        </div>
        
    </div>
</div>



@endsection

