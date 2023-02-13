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
                                    <a class="nav-link active" href="{{route('vacaciones_pendientes')}}">Lapsos Disfrutados</a>
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
                                    <th class="text-primary"> Vacaciones pendientes de disfrutar  del Funcionario  <img src="{{url('/img/vacacion.png')}}" whith="60px" height="60px"/></th>
                                    <th class="text-primary"> Días de Disfrute  <img src="{{url('/img/icon/calendario.png')}}" whith="60px" height="60px"/></th>
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(10,11,12,13) ))
                                        <th class="text-primary" colspan="2">Opción</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                    
                        
                                    
                                    <tr>                                    
                                      
                                       <td>2023</td>
                                       <td>27 días</td>
                                        <td colspan="2">
                                        
                                               <a href src="{{url('img/imagen/documento.png')}}" style="max-width: 50px; max-height: 50px"  alt="Image"/><span class='btn-info badge'><font color='red'>Ver Solicitud</font></span> </a>
                                           

                                        </td>                                                                             
                                    </tr>                     
                               
                         
                                
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