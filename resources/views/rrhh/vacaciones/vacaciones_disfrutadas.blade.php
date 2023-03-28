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
                                <b>LAPSOS VACACIONALES DISFRUTADOS</b>
                    </div>
                    <table  align="center" border="0" cellpadding="5" cellspacing="2" width="100%" >
                    <tr>
                            <td colspan="4">
                            <div class="col-12 text-center">
                
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('funcionario_vacaciones')}}">Solicitudes Realizadas</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link "  href="{{route('vacaciones_pendientes')}}">Lapsos Pendientes de Disfrute</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{route('vacaciones_disfrutadas')}}">Lapsos Disfrutados</a>
                                </li>                                
                                </ul>
                                     
                                </div>
                               
                            </td>
                        </tr>
                        </table>
                        
                    <div class="table-responsive mt-3">
                        <table class="table datatable">
                            <thead>
                                <tr>                                   
                                    <th class="text-primary"> Vacaciones Disfrutadas del Funcionario  <img src="{{url('/img/vacacion.png')}}" whith="60px" height="60px"/></th>
                                    <th class="text-primary"> Días de Disfrute  <img src="{{url('/img/icon/calendario.png')}}" whith="60px" height="60px"/></th>
                                    <th class="text-primary"> Fecha de Solicitud<img src="{{url('/img/icon/calendario.png')}}" whith="60px" height="60px"/></th>
                                    <th class="text-primary"> Fecha de Inicio del Disfrute  <img src="{{url('/img/icon/calendario.png')}}" whith="60px" height="60px"/></th>
                                    <th class="text-primary"> Fecha de Reintegro  <img src="{{url('/img/icon/calendario.png')}}" whith="60px" height="60px"/></th>
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,10,11,12,13) ))
                                        <th class="text-primary" colspan="2">Opción</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                    
                        @foreach($disfrutadas as $disfrutadas)
                                    
                                    <tr>                                    
                                      
                                       <td>{{$disfrutadas->lapso_disfrute}}</td>
                                       <td>{{$disfrutadas->dias_disfrutados}} días disfrutados</td>
                                       <td>{{$disfrutadas->fecha_solicitud}}</td>
                                       <td>{{$disfrutadas->fecha_inicio}}</td>
                                       <td>{{$disfrutadas->fecha_reintegro}}</td>
                                        <td colspan="2">                                        
                                               <a href="{{route('planilla',$disfrutadas->Id_solicitud)}}" style="max-width: 50px; max-height: 50px"  alt="Image"/><span class='btn-info badge'><font color='red'>Ver Solicitud {{$disfrutadas->solicitud_vacaciones_id}}</font></span> </a>                                           
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