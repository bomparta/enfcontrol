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
                                <b>LAPSOS VACACIONALES PENDIENTES POR DISFRUTAR</b>
                    </div>
                    <table  align="center" border="0" cellpadding="5" cellspacing="2" width="100%" >
                    <tr>
                            <td colspan="4">
                            <div class="col-12 text-center">
                
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('funcionario_vacaciones')}}">Solicitudes Realizadas</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link active"  href="{{route('vacaciones_pendientes')}}">Lapsos Pendientes de Disfrute</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('vacaciones_disfrutadas')}}">Lapsos Disfrutados</a>
                                </li>                                
                                </ul>
                                     
                                </div>
                               
                            </td>
                        </tr>
                        </table>
                        
                    <div class="table-responsive mt-6">
                        <table class="table datatable" width="60%">
                            <thead>
                                <tr>                                   
                                    <th class="text-primary"> Vacaciones pendientes de disfrutar  del Funcionario  <img src="{{url('/img/vacacion.png')}}" whith="60px" height="60px"/></th>
                                    <th class="text-primary"> Días de Disfrute  <img src="{{url('/img/icon/calendario.png')}}" whith="60px" height="60px"/></th>
                                    <th class="text-primary"> Días de Pendoentes por disfrutar  <img src="{{url('/img/icon/adv.jpg')}}" whith="60px" height="60px"/></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @if(isset($pendientes))
                        
                            @foreach($pendientes as $pendientes) 
                                    <tr>                                    
                                      
                                       <td>{{$pendientes->lapso_disfrute}}</td>
                                       <td>{{$pendientes->dias_adisfrutar}} días</td> 
                                       <td>{{$pendientes->dias_pendientes}} días</td>                                                                                                                 
                                    </tr>                     
                               @endforeach
                         @endif
                                
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