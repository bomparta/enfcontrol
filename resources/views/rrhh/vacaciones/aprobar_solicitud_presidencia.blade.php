@extends('layouts.app')
@section('styles')
@endsection
@section('content')
<div class="d-flex" id="wrapper">
        @include('layouts.appvacaciones')      
    <div id="page-content-wrapper">
        <div class="sidebar-heading text-center">
            <h4 class="text-primary" >VACACIONES</h6>      
            <h6 class="text-dark">Bienvenid@, {{Auth::user()->name}}</h6>
        </div>   
            <div class="container pb-4">
                 <div class="row align-items-stretch">
                        <div class="col-12">
                            <div class="card mb-4">
            <div align="center" id="divTituloIndex2" class="text-primary">
              
                <b>APROBAR SOLICITUD DE VACACIONES PRESIDENTE(A)</b>
                </div>
           
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
                         <tr>
                            <td>
                                <div id="divSubTituloIndex2">
                                   
                                    <hr>
                                    <b> Sumistrar los datos correspondientes a la <span style="color:gray; ">Aprobación de Solicitud de Vacaciones </span>haga clic en "Guardar" para registrar su información.
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                           
                                </div>
                            </td>

                        </tr>
                    </table>
      
          <form id="formulario" name="formulario" method="POST" action="{{route('store_aprobacion_presidencia')}}">    
          @csrf
          @if(isset($solicitudes))
        
          <div class="frameContenedor" style="margin:5px;" align="right">
          <input type= "hidden" id="funcionario_id" name="funcionario_id" value="{{$solicitudes->funcionario_id}}" class="form-control"  >    
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
                     <td   ><div align="center">  @if($solicitudes->id_nacionalidad==1) V 
                     @else E @endif - {{$solicitudes->numero_identificacion}}  </div></td>
                     

                     </tr>

                     <tr  class="table-primary">
                     <th  align="center"   >   NOMBRE(s)    </th>
                     <th  align="center"   >   APELLIDO(s)    </th>
                     <th  align="center"   >   TIPO DE TRABAJADOR    </th>
                     <th  align="center"   >   CARGO    </th>
                    </tr>
                    
                     <tr  >
                     <td   >   {{$solicitudes->nombre.' '.$solicitudes->nombreseg}}   </td>                   
                     <td  >   {{$solicitudes->apellido.' '. $solicitudes->apellidoseg}}   </td>                    
                     <td  >   {{$solicitudes->trabajador}}   </td>
                     <td     >   {{$solicitudes->cargo}}   </td>
                    </tr  >
                    <tr class="table-primary">                     
                        <th  align="center"   >   UNIDAD DE ADSCRIPCIÓN    </th>
                        <th    align="center"   >   FECHA DE INGRESO ADMINISTRACIÓN PÚBLICA    </th>
                        <th   align="center"   >   FECHA DE INGRESO FENFMP    </th>
                        <th  align="center"   >   FECHA DE INGRESO VACACIONES   </th>
                     </tr>
                     <tr  >
                     <td  >   {{$solicitudes->administrativa}}   </td>
                     <td  align="center"   >   {{date('d-m-Y',strtotime($solicitudes->fecha_ingreso_adm))}}   </td>
                     <td    >    {{date('d-m-Y',strtotime($solicitudes->fecha_ingreso_fund))}}   </td>
                     <td   >    {{date('d-m-Y',strtotime($solicitudes->fecha_ingreso_vac))}}   </td>
                     </tr>
                     
                   
                     </tbody>
                     
                    </table>
                   
                 
                    <p><p>
              
        
          <input type= "hidden" id="id_solicitud" name="id_solicitud" value="{{$solicitudes->id_solicitud}}" class="form-control"  >   
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%">
                   <tr>
                        <td>
                            &nbsp;Dias a Disfrutar:&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="number" name="diasadisfrutar" id="diasadisfrutar" value="{{$solicitudes->dias_disfrute}}" readonly />                           
                        </td>
                        <td>
                            &nbsp;Fecha de Inicio del Disfrute de Vacaciones&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;">*</span><br>
                            <input type="date" name="fechadisfrute" id="fechadisfrute" value="{{$solicitudes->fecha_inicio}}"  readonly/>
                        </td>
                        <td>
                            &nbsp;Fecha de Reintegro de Vacaciones&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;">*</span><br>
                            <input type="date" name="fechadisfrute" id="fechadisfrute" value="{{$solicitudes->fecha_reintegro}}"  readonly/>
                        </td>                           
                   </tr>   
                 
                   <hr>
                   <tr>                    
                          
                        <td>
                                &nbsp;Tipo de Aprobación&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="tipo_aprobacion" name="tipo_aprobacion"  class="form-control" required >
                                <option value="">Seleccione...</option>
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
                        <a class='btn btn-secondary' href="{{URL::route('vacaciones_pendientes_aprobacion_director')}}">Regresar</a> 
                    </div>
                 
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
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="{{url('js/funciones_vacaciones.js')}}"></script>
<script src="{{url('js/funciones_generales.js')}}"></script>

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


@endsection

