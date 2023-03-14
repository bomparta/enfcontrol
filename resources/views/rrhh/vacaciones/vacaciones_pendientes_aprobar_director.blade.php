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
                                <b>DIRECTOR(A)</b>
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
                                    <a class="nav-link active" href="{{route('vacaciones_pendientes_aprobacion_director')}}">Vacaciones Pendientes por Aprobar</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link "  href="{{route('vacaciones_aprobadas_director')}}">Vacaciones Aprobadas</a>
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
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,10,11,12,13) ))
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
                                       
                                                <img src="{{url('img/imagen/documento.jpg')}}" style="max-width: 50px; max-height: 50px"  alt="Image"> <a href="{{route('vacaciones_aprobacion_director',$vacaciones_solicitudes->id_solicitud)}}" target="_new">
                                                 <span class='btn-info badge'><font color=#F2F3F8>Aprobar Vacaciones</font></span>                                        
                                          

                                        </td>                                                                             
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