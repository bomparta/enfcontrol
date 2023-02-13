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
                                <b>VACACIONES APROBADAS</b>
                    </div>
                    <table  align="center" border="0" cellpadding="5" cellspacing="2" width="100%" >
                    <tr>
                            <td colspan="4">
                            <div class="col-12 text-center">
                
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{route('vacaciones_pendientes_aprobacion')}}">Vacaciones Pendientes por Aprobar</a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link "  href="{{route('vacaciones_aprobadas')}}">Vacaciones Aprobadas</a>
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
                                    <th class="text-primary" > Cédula de Identidad </th>                                   
                                    <th class="text-primary"> Nombre(s) y Apellido(s) </th>
                                    <th class="text-primary"><div>  <img src="{{url('/img/vacacion.png')}}" whith="60px" height="60px"/>Días de Disfrute</div></th>
                                    <th class="text-primary"><div>  <img src="{{url('/img/icon/calendario.png')}}" whith="60px" height="60px"/> Fecha de Solicitud</div></th>
                                    <th class="text-primary"><div> <img src="{{url('/img/icon/calendario.png')}}" whith="60px" height="60px"/>Fecha de Inicio</div></th>
                                    <th class="text-primary"> <div><img src="{{url('/img/icon/regreso.png')}}" whith="80px" height="60px"/>Fecha de Reintegro</div></th>
                                    <th class="text-primary"> Aprobada/Diferida/Negada </th>
                                   @if(in_array( Auth::user()->id_usuariogrupo, array(10,11,12,13) ))
                                        <th class="text-primary" colspan="3" > <div aling="center">Verificaciones de Aprobación</div></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>                                    
                                      
                                       <td>V-13885175 </td>
                                       <td> Yomaira Colmenares</td>
                                       <td>27 días</td>
                                       <td>01-01-2023</td>
                                       <td>01-02-2023</td>
                                       <td>07-03-2023</td>
                                       <td><img src="{{url('img/icon/check.png')}}" style="max-width: 40px; max-height: 40px"  alt="Image">  Aprobada</td>
                                       <td >                                       
                                                <div><img src="{{url('img/icon/check.png')}}" style="max-width: 40px; max-height: 40px"  alt="Image"> 
                                                    <span class='btn-info badge'><font color=#F2F3F8>Jefe(a) Inmediato</font></span> 
                                                </div>
                                        </td>
                                        <td >
                                                <div> <img src="{{url('img/icon/cerrar.png')}}" style="max-width: 25px; max-height: 25px"  alt="Image"> 
                                                    <span class='btn-info badge'><font color=#F2F3F8>Director(a)</font></span>     
                                                </div>
                                        </td>
                                        <td >
                                                <div>
                                                 <img src="{{url('img/icon/cerrar.png')}}" style="max-width: 25px; max-height: 25px"  alt="Image">
                                                 <span class='btn-info badge'><font color=#F2F3F8>Presidente(a)</font></span>                                            
                                                </div>

                                        </td>                                                                             
                                    </tr>     
                                    <tr>                                    
                                      
                                       <td>V-13885175 </td>
                                       <td> Yomaira Colmenares</td>
                                       <td>27 días</td>
                                       <td>01-01-2023</td>
                                       <td>01-02-2023</td>
                                       <td>07-03-2023</td>
                                       <td><img src="{{url('img/icon/check.png')}}" style="max-width: 40px; max-height: 40px"  alt="Image">  Aprobada</td>
                                        <td >                                       
                                                <div><img src="{{url('img/icon/check.png')}}" style="max-width: 40px; max-height: 40px"  alt="Image"> 
                                                    <span class='btn-info badge'><font color=#F2F3F8>Jefe(a) Inmediato</font></span> 
                                                </div>
                                        </td>
                                        <td >
                                                <div> <img src="{{url('img/icon/cerrar.png')}}" style="max-width: 25px; max-height: 25px"  alt="Image"> 
                                                    <span class='btn-info badge'><font color=#F2F3F8>Director(a)</font></span>     
                                                </div>
                                        </td>
                                        <td >
                                                <div>
                                                 <img src="{{url('img/icon/cerrar.png')}}" style="max-width: 25px; max-height: 25px"  alt="Image">
                                                 <span class='btn-info badge'><font color=#F2F3F8>Presidente(a)</font></span>                                            
                                                </div>

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