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
              
                <b>REGISTRAR SOLICITUD DE VACACIONES</b>
                </div>
           
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
                         <tr>
                            <td>
                                <div id="divSubTituloIndex2">
                                   
                                    <hr>
                                    <b> Sumistrar los datos correspondientes a la <span style="color:gray; ">Solicitud de Vacaciones </span> a disfrutar en la FENFMP.
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                           
                                </div>
                            </td>

                        </tr>
                    </table>
      
          <form id="formulario" name="formulario" method="POST" action="{{route('store_vacaciones')}}">    
          @csrf
          @if(isset($datos_funcionario))
          @foreach($datos_funcionario as $key=>$funcionario)
          <div class="frameContenedor" style="margin:5px;" align="right">
          <input type= "hidden" id="funcionario_id" name="funcionario_id" value="{{$funcionario->funcionario_id}}" class="form-control"  >    
          <input type= "hidden" id="id_tipo_trabajador" name="id_tipo_trabajador" value="{{$funcionario->id_tipo_trabajador}}" class="form-control"  >    
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
                     <td  >   {{$funcionario->apellido.' '. $funcionario->apellidoseg}}   </td>                    
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
                    @if ($annos_solicitud == '0')
                        <tr>
                        <td  >
                        <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Solicitud de Vacaciones</h4>
                        <p>Mi estimado(a),usted no tiene más de un (1) año de servicio para realizar solicitud de vacaciones.</p>
                        <hr>
                        <p class="mb-0">En caso de tener dudas en relación a sus vacaciones dirijase a la Coordinación de Recursos Humanos de la ENFMP.</p>
                        </div>
                        </td>
                        </tr>
                        </table>
                        <div class="frameContenedor" style="margin:5px;" align="right">                      
                            <a class='btn btn-secondary' href="{{URL::route('funcionario_vacaciones')}}">Regresar</a> 
                        </div>                      
                    @else
                        @if ($annos_solicitud =='sin_adm'&& count($lapso)==0)
                                <tr>
                                <td  >
                                <div class="alert alert-warning" role="alert">
                                <h4 class="alert-heading">Solicitud de Vacaciones</h4>
                                <p>Mi estimado(a),usted no puede realizar solicitud de vacaciones, ya su registro de ingreso RRHH no se encuentra incorporado.</p>
                                <hr>
                                <p class="mb-0">Debe dirijirse a la Coordinación de Recursos Humanos de la ENFMP.</p>
                                </div>
                                </td>
                                </tr>
                                </table>
                                <div class="frameContenedor" style="margin:5px;" align="right">                      
                                    <a class='btn btn-secondary' href="{{URL::route('funcionario_vacaciones')}}">Regresar</a> 
                                </div>
                               
                    @endif
                   @endif
                   @if (count($lapso)==0 && $annos_solicitud > 0 )
                                    <tr>
                                    <td  >
                                    <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading">Solicitud de Vacaciones</h4>
                                    <p>Mi estimado(a),usted no tiene solicitudes de vacaciones pendientes por disfrutar.</p>
                                    <hr>
                                    <p class="mb-0">En caso de tener dudas en relación a sus vacaciones dirijase a la Coordinación de Recursos Humanos de la ENFMP.</p>
                                    </div>
                                    </td>
                                    </tr>
                                  
                                    <div class="frameContenedor" style="margin:5px;" align="right">                      
                                        <a class='btn btn-secondary' href="{{URL::route('funcionario_vacaciones')}}">Regresar</a> 
                                    </div>
                                    </table>
                   @endif
                   @if (count($lapso)>0 && $annos_solicitud > 0 )
                                     <tr>
                                            <td>
                                                &nbsp;Lapso de Vacaciones a Solicitar&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                                <div class="form-group">
                                                @foreach($lapso as $lapso)
                                                    @if($lapso->dias_pendientes==0)
                                                    <label><input type="checkbox" name="lapso_pendientes[]" value=" {{ $lapso->id }}" onclick="sumar_dias(this,document.getElementById('dias_pendientes[]').value);">  {{ $lapso->lapso_disfrute }}</label>
                                                    <input type="text" id="dias_pendientes[]" name="dias_pendientes[]" readonly size=4 value ="{{$lapso->dias_adisfrutar}}"> días
                                                    @else
                                                    <label><input type="checkbox" name="lapso_pendientes[]" value=" {{ $lapso->id }}" onclick="sumar_dias(this,document.getElementById('dias_pendientes1[]').value);">  {{ $lapso->lapso_disfrute }}</label>
                                                    <input type="text" id="dias_pendientes1[]" name="dias_pendientes1[]" readonly size=4 value ="{{$lapso->dias_pendientes}}"> días
                                                    @endif
                                                    <br>
                                                @endforeach
                                            
                                                @error('lapso_pendientes')
                                                    <div class="invalid-feedback">
                                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                                    </div>
                                                @enderror
                                                <input type="text" id="total_dias_disfrute" name="total_dias_disfrute" value ="" size=4 readonly> <label><b>Total días a Disfrutar</b></label>
                                                </div>
                                            </td>  
                                            <td>
                                                <div class="form-group">
                                                    <label class="radio-inline">¿Desea solicitar los días completos de disfrute? &nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;">*</span>
                                                    <input type="radio"  id="completos" name="completos" value="1"  onclick="validar_dias(this);" cheked>Si</label>
                                                    <input type="radio" id="completos" name="completos" value="2" checked onclick="validar_dias(this);">No</label>
                                                    &nbsp;Dias a Disfrutar:&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <input type="number" name="diasadisfrutar" id="diasadisfrutar" value="" size=4 onkeypress='validar_dias_completos(this,event);' />
                                                </div>
                                            </td>
                                            <td>
                                                &nbsp;Fecha de Inicio del Disfrute de Vacaciones&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;">*</span><br>
                                                <input type="date" name="fechadisfrute" id="fechadisfrute" value=""  required/>
                                            </td>
                                            @error('fechadisfrute')
                                                <div class="invalid-feedback">
                                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                                    </div>
                                                @enderror  
                                    
                                            <td>                            
                                        </tr>                       
                                        <tr>                            
                                            <td colspan=3>
                                                &nbsp;Observaciones <br>
                                                <input type= "text" id="observaciones" rows="2" name="observaciones" size =100 onkeyup="mayusculas(this);"  value="" class="form-control"  >                              
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
                                        <a class='btn btn-secondary' href="{{URL::route('funcionario_vacaciones')}}">Regresar</a> 
                        @endif            </div>
                  
                            
                           
                    
                   
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
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="{{url('js/funciones_vacaciones.js')}}"></script>
<script src="{{url('js/funciones_generales.js')}}"></script>

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


@endsection
