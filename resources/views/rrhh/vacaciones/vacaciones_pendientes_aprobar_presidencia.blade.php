@extends('layouts.app')
@section ('content')
<div class="container-fluid">
    <div class="row justify-content-start">
        @include('layouts.appvacaciones')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
            <div class="card">
                <div class="card-body">
                    <div align="center" id="divTituloIndex2" class="text-primary">
                                <b>PRESIDENTE(A)</b>
                    </div>
                    <div align="center" id="divTituloIndex2" class="text-primary">
                                <b>VACACIONES PENDIENTES POR APROBAR </b>
                    </div>
                    <table  align="center" border="0" cellpadding="5" cellspacing="2" width="100%" >
                    <tr>
                            <td colspan="4">
                            <div class="col-12 text-center">
                
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{route('vacaciones_pendientes_aprobacion_presidencia')}}">Vacaciones Pendientes por Aprobar</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link "  href="{{route('vacaciones_aprobadas_presidencia')}}">Vacaciones Aprobadas</a>
                                </li>
                              
                                </ul>
                                     
                                </div>
                               
                            </td>
                        </tr>
                        </table>
                        
                        <div class="table-responsive mt-3">
                    <table id="example1" class="table table-striped table-bordered" style="width:100%"> 
                            <thead>
                                <tr>
                                    <th class="text-primary"> Cédula de Identidad </th>                                   
                                    <th class="text-primary"> Nombre(s) y Apellido(s) </th>
                                    <th class="text-primary"> <img src="{{url('/img/vacacion.png')}}" whith="60px" height="60px"/>Días de Disfrute  </th>
                                    <th class="text-primary"> <img src="{{url('/img/icon/calendario.png')}}" whith="60px" height="60px"/>Fecha de Solicitud  </th>
                                    <th class="text-primary"> <img src="{{url('/img/icon/calendario.png')}}" whith="60px" height="60px"/>Fecha de Incio de Vacaciones  </th>
                                    <th class="text-primary"> <img src="{{url('/img/icon/regreso.png')}}" whith="60px" height="60px"/>Fecha de Reintegro de Vacaciones  </th>
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(10,11,12,13) ))
                                        <th class="text-primary" colspan="2">Opción</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            <div id="divSubTituloIndex2">                                   
                                    @include('rrhh.funcionario.mensaje')  
                                    </div>
                        @foreach($vacaciones_solicitudes as $vacaciones_solicitudes)
                                    
                                    <tr>                                    
                                  
                                       <td>@if($vacaciones_solicitudes->id_nacionalidad==1) V    @else E @endif - {{$vacaciones_solicitudes->numero_identificacion}} </td>
                                       <td>  {{$vacaciones_solicitudes->nombre.' '.$vacaciones_solicitudes->nombreseg}}  {{$vacaciones_solicitudes->apellido.' '. $vacaciones_solicitudes->apellidoseg}}  </td>
                                       <td> {{$vacaciones_solicitudes->dias_disfrute}}</td>
                                       <td>{{$vacaciones_solicitudes->fecha_solicitud}}</td>
                                       <td>{{$vacaciones_solicitudes->fecha_inicio}}</td>
                                       <td>{{$vacaciones_solicitudes->fecha_reintegro}}</td>
                                        <td colspan="2">
                                       
                                                <img src="{{url('img/imagen/documento.jpg')}}" style="max-width: 50px; max-height: 50px"  alt="Image"> <a href="{{route('vacaciones_aprobacion_presidencia',$vacaciones_solicitudes->id)}}" target="_new">
                                                 <span class='btn-info badge'><font color=#F2F3F8>Aprobar Vacaciones</font></span>                                        
                                          

                                        </td>                                                                             
                                    </tr>                     
                               
                                    @endforeach
                                
                            </tbody>
                        </table>
                       
                                    
                    </div>
                   
                    
            </div> <!-- card -->
        </div>
    </div> <!-- row -->
</div>

</div> <!-- row -->
</div>
@endsection