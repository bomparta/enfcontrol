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
                                <b>PRESIDENTE(A)</b>                              
                    </div>
                    <div align="center" id="divTituloIndex2" class="text-primary">
                                <b>VACACIONES APROBADAS</b>
                    </div>
                    <table  align="center" border="0" cellpadding="5" cellspacing="2" width="100%" >
                    <tr>
                            <td colspan="4">
                            <div class="col-12 text-center">
                
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('vacaciones_pendientes_aprobacion_presidencia')}}">Vacaciones Pendientes por Aprobar</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link active"  href="{{route('vacaciones_aprobadas_presidencia')}}">Vacaciones Aprobadas</a>
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
                                    <th class="text-primary" > N° </th>  
                                    <th class="text-primary" > Cédula de Identidad </th>                                   
                                    <th class="text-primary"> Nombre(s) y Apellido(s) </th>
                                    <th class="text-primary"><div>  <img src="{{url('/img/vacacion.png')}}" whith="60px" height="60px"/>Días de Disfrute</div></th>
                                    <th class="text-primary"><div>  <img src="{{url('/img/icon/calendario.png')}}" whith="60px" height="60px"/> Fecha de Solicitud</div></th>
                                    <th class="text-primary"><div> <img src="{{url('/img/icon/calendario.png')}}" whith="60px" height="60px"/>Fecha de Inicio</div></th>
                                    <th class="text-primary"> <div><img src="{{url('/img/icon/regreso.png')}}" whith="80px" height="60px"/>Fecha de Reintegro</div></th>
                                    <th class="text-primary"> Revisada/Aprobada/Diferida/Negada </th>
                                   @if(in_array( Auth::user()->id_usuariogrupo, array(9,10,11,12,13) ))
                                        <th class="text-primary" colspan="3" > <div aling="center">Verificaciones de Aprobación</div></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($vacaciones_solicitudes as $vacaciones_solicitudes)
                                    <tr>                                    
                                    <td>1 </td>
                                    <td>@if($vacaciones_solicitudes->id_nacionalidad==1) V    @else E @endif - {{$vacaciones_solicitudes->numero_identificacion}} </td>
                                       <td>  {{$vacaciones_solicitudes->nombre.' '.$vacaciones_solicitudes->nombreseg}}  {{$vacaciones_solicitudes->apellido.' '. $vacaciones_solicitudes->apellidoseg}}  </td>
                                       <td> {{$vacaciones_solicitudes->dias_disfrute}}</td>
                                       <td>{{$vacaciones_solicitudes->fecha_solicitud}}</td>
                                       <td>{{$vacaciones_solicitudes->fecha_inicio}}</td>
                                       <td>{{$vacaciones_solicitudes->fecha_reintegro}}</td>
                                       <td>
                                        <div align="center">
                                            @if($vacaciones_solicitudes->tipo_aprobacion_director==1)   
                                            <img src="{{url('img/icon/check.png')}}" style="max-width: 40px; max-height: 40px"  alt="Image">  Aprobada</td>
                                           @endif
                                            @if($vacaciones_solicitudes->tipo_aprobacion_director==2)
                                            <img src="{{url('img/icon/reloj.png')}}" style="max-width: 40px; max-height: 40px"  alt="Image">  Diferido</td>
                                            @endif
                                            @if($vacaciones_solicitudes->tipo_aprobacion_director==3)
                                            <img src="{{url('img/icon/erase.ico')}}" style="max-width: 40px; max-height: 40px"  alt="Image">  Denegado</td>
                                            @endif
                                        </div>   
                                    </td>  
                                       @if($vacaciones_solicitudes->aprobado_coordinador==1)
                                            <td>   
                                                                                 
                                                <div align="center"><img src="{{url('img/icon/check.png')}}" style="max-width: 40px; max-height: 40px"  alt="Image"> 
                                                    <span class='btn-info badge'><font color=#F2F3F8>Jefe(a) Inmediato o Coordinador(a)</font></span> 
                                                </div>
                                            </td>
                                        @else
                                        <td >                                       
                                                <div align="center"><img src="{{url('img/icon/erase.ico')}}" style="max-width: 40px; max-height: 40px"  alt="Image"> 
                                                    <span class='btn-info badge'><font color=#F2F3F8>Jefe(a) Inmediato o Coordinador(a)</font></span> 
                                                </div>
                                        </td>
                                        @endif
                                        @if($vacaciones_solicitudes->aprobado_director==1)
                                            <td>   
                                                                                 
                                                <div align="center"><img src="{{url('img/icon/check.png')}}" style="max-width: 40px; max-height: 40px"  alt="Image"> 
                                                    <span class='btn-info badge'><font color=#F2F3F8>Director</font></span> 
                                                </div>
                                            </td>
                                        @else
                                        <td >                                       
                                                <div align="center"><img src="{{url('img/icon/erase.ico')}}" style="max-width: 40px; max-height: 40px"  alt="Image"> 
                                                    <span class='btn-info badge'><font color=#F2F3F8>Director(a)</font></span> 
                                                </div>
                                        </td>
                                        @endif
                                        @if($vacaciones_solicitudes->aprobado_presidencia==1)
                                            <td>                                                                                    
                                                <div align="center"><img src="{{url('img/icon/check.png')}}" style="max-width: 40px; max-height: 40px"  alt="Image"> 
                                                    <span class='btn-info badge'><font color=#F2F3F8>Presidente(a)</font></span> 
                                                </div>
                                            </td>
                                        @else
                                        <td >                                       
                                                <div align="center"><img src="{{url('img/icon/erase.ico')}}" style="max-width: 40px; max-height: 40px"  alt="Image"> 
                                                    <span class='btn-info badge'><font color=#F2F3F8>Presidente(a)</font></span> 
                                                </div>
                                        </td>
                                        @endif                                                                         
                                    </tr>     
                                   @endforeach
                            </tbody>                            
                            
                        </table>
                       
                                    
            
                   
                    
            </div> <!-- card -->
        </div>
    </div> <!-- row -->
</div>

</div> <!-- row -->
</div>
@endsection