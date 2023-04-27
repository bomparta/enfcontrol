
@extends('layouts.app')
@section('styles')
@endsection
@section('content')
<div class="d-flex" id="wrapper">
        @include('layouts.apprrhh')      
    <div id="page-content-wrapper">
        <div class="sidebar-heading text-center">
            <h4 class="text-primary" >CONTROL DE EXPEDIENTES RRHH</h6>      
            <h6 class="text-dark">Bienvenid@, {{Auth::user()->name}}</h6>
        </div>   
            <div class="container pb-4">
                 <div class="row align-items-stretch">
                        <div class="col-12">
                            <div class="card mb-4">
                    <div align="center" id="divTituloIndex2" class="text-primary">
                                <b> REQUISITOS DIGITALIZADOS POR EL TRABAJADOR(A)</b>
                    </div>
                    <div id="divSubTituloIndex2">
                                   
                                    @include('rrhh.funcionario.mensaje')  
                                </div>
                    <div class="table-responsive mt-3">
                        <table class="table datatable">
                            <thead>
                                <tr>                                   
                                    <th class="text-primary"> Requisitos Cargados del Funcionario  <img src="{{url('/img/datos.png')}}" whith="60px" height="60px"/>
                                    <br>
                                    <b><span style="color:gray;">Cédula de Identidad N°: </span><b>{{$nacionalidad}}-{{$cedula_usuario}}<br><b><span style="color:gray;">Nombre(s) y Apellido(s) del Trabajador(a): </span><b>{{$nombres}} {{$apellidos}}</th>
                                    <th class="text-primary" ></th>
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(10,11,12) ))
                                        <th class="text-primary" >Requisitos</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                    
                        
                                    
                                    <tr>
                                    
                                        <td   >FOTOGRAFÏA TIPO CARNET FONDO BLANCO</td>
                                        <td >
                                        @if( empty($foto[0]) ) 
                                                <img src="{{url('img/imagen/foto.jpeg')}}" style="max-width: 250px; max-height: 150px"  alt="Image"/><span class='btn-info badge'><font color='red'>Pendiente</font></span> 
                                            @else
                                                <img src="{{url('img/icon/check.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"><a href= "{{ Storage::url( $foto[0]->ruta) }}" target="_new">
                                                   Ver Documento   <span class='btn-info badge'><font color=#F2F3F8>Cargado</font></span>                                        
                                            @endif

                                        </td>                                 
                                        
                                            
                                    </tr>
                                    <tr>
                                    
                                        <td  >CEDULA DE IDENTIDAD AMPLIADA Y A COLOR</td>
                                        <td >@if (empty($cedula[0]) )
                                                <img src="{{url('img/imagen/cedula.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"/><span class='btn-info badge'><font color='red'>Pendiente</font></span> 
                                            @else
                                            <img src="{{url('img/icon/check.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"> <a href= "{{ Storage::url( $cedula[0]->ruta) }}" target="_new">
                                                   Ver Documento <span class='btn-info badge'><font color=#F2F3F8>Cargado</font></span> 
                                          
                                            @endif
                                        </td>
                                      
                                       
                                     
                                            
                                    </tr>
                                    
                                    <tr>
                                    
                                        <td  >PARTIDA DE NACIMIENTO DEL TRABAJADOR</td>
                                        <td>
                                        @if(empty($partida[0]) )
                                            <img src="{{url('img/imagen/documento.jpg')}}" style="max-width: 250px; max-height: 150px"  alt="Image"/><span class='btn-info badge'><font color='red'>Pendiente</font></span> 
                                        @else
                                        <img src="{{url('img/icon/check.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"> <a href= "{{ Storage::url( $partida[0]->ruta) }}" target="_new">
                                                   Ver Documento <span class='btn-info badge'><font color=#F2F3F8>Cargado</font></span> 
                                        @endif
                                    </td>
                                    
                                  
                                            
                                    </tr>
                                    <tr>
                                    
                                        <td  >ACTA DE MATRIMONIO Y/O CONCUBINATO</td>
                                        <td>
                                            @if(empty($matrimonio[0]) )
                                                <img src="{{url('img/imagen/documento.jpg')}}" style="max-width: 250px; max-height: 150px"  alt="Image"/><span class='btn-info badge'><font color='red'>Pendiente</font></span> 
                                                @else
                                                <img src="{{url('img/icon/check.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"> <a href= "{{ Storage::url( $cedula[0]->ruta) }}" target="_new">
                                                   Ver Documento <span class='btn-info badge'><font color=#F2F3F8>Cargado</font></span> 
                                            @endif
                                        </td>
                                  
                                     
                                   
                                            
                                    </tr>
                                    <tr>
                                    
                                    <td  >COMPROBANTE DE REGISTRO ÚNICO DE INFORMACIÓN FISCAL (RIF) ACTUALIZADO</td>
                                    <td>
                                    @if(empty($rif[0]->ruta) )
                                        <img src="{{url('img/imagen/rif.png')}}" style="max-width: 150px; max-height: 150px"  alt="Image"/><span class='btn-info badge'><font color='red'>Pendiente</font></span> 
                                    @else
                                    <img src="{{url('img/icon/check.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"> <a href= "{{ Storage::url( $rif[0]->ruta) }}" target="_new">
                                                   Ver Documento<span class='btn-info badge'><font color=#F2F3F8>Cargado</font></span> 
                                    @endif
                                    </td>

                              
                                   
                                        
                                </tr>
                                <tr>
                                    
                                <td  >CARNET DE TRABAJO DEL MINISTERIO PÚBLICO</td>
                                    <td>
                                    @if(empty($carnet[0]->ruta) )
                                        <img src="{{url('img/imagen/foto_carnet_mp.png')}}" style="max-width: 150px; max-height: 150px"  alt="Image"/><span class='btn-info badge'><font color='red'>Pendiente</font></span> 
                                    @else
                                    <img src="{{url('img/icon/check.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"> <a href= "{{ Storage::url( $carnet[0]->ruta) }}" target="_new">
                                                   Ver Documento<span class='btn-info badge'><font color=#F2F3F8>Cargado</font></span> 
                                    @endif
                                    </td>                                        
                                </tr>
                                    <tr>
                                    
                                    <td  >ÚLTIMO TITULO ACADÉMICO REGISTRADO OBTENIDO (BACHILLER, TECNICO, UNIVERSITARIO)</td>
                                    <td>
                                    @if(empty($titulo[0]->ruta) )
                                        <img src="{{url('img/imagen/documento.jpg')}}" style="max-width: 250px; max-height: 150px"  alt="Image"/><span class='btn-info badge'><font color='red'>Pendiente</font></span> 
                                    @else
                                    <img src="{{url('img/icon/check.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"> <a href= "{{ Storage::url( $titulo[0]->ruta) }}" target="_new">
                                                   Ver Documento<span class='btn-info badge'><font color=#F2F3F8>Cargado</font></span> 
                                    @endif
                                    </td>

                              
                                   
                                        
                                </tr>
                                    <tr >                               
                                        <td  rowspan="2">EN CASO DE ESTAR CURSANDO ESTUDIOS ANEXE CONSTANCIA DE ESTUDIOS Y HORARIO DE CLASES</td>
                                      
                                  
                                            <td><b>Constancia de Estudios</b>
                                                @if(empty($constancia[0]) )
                                                    <img src="{{url('img/imagen/documento.jpg')}}" style="max-width: 250px; max-height: 150px"  alt="Image"/><span class='btn-info badge'><font color='red'>Pendiente</font></span> 
                                                @else
                                                <img src="{{url('img/icon/check.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"> <a href= "{{ Storage::url( $constancia[0]->ruta) }}" target="_new">
                                                   Ver Documento <span class='btn-info badge'><font color=#F2F3F8>Cargado</font></span> 
                                                @endif
                                            </td> 
                                 
                                              
                                            <tr >
                                                <td><b> Horario de Clases</b>
                                                        @if(empty($horario[0]) )
                                                            <img src="{{url('img/imagen/horario.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"/><span class='btn-info badge'><font color='red'>Pendiente</font></span> 
                                                        @else
                                                        <img src="{{url('img/icon/check.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"> <a href= "{{ Storage::url( $horario[0]->ruta) }}" target="_new">
                                                    Ver Documento <span class='btn-info badge'><font color=#F2F3F8>Cargado</font></span> 
                                                        @endif
                                                    </td>
                                            
                                                   
                                            </tr> 
                                       
                                    <tr>
                                    
                                    <td  >CURRICULUM VITAE ACTUALIZADO</td>
                                    <td>
                                    @if(empty($curriculum[0]->ruta) )
                                        <img src="{{url('img/imagen/curriculum.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"/><span class='btn-info badge'><font color='red'>Pendiente</font></span> 
                                    @else
                                    <img src="{{url('img/icon/check.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"> <a href= "{{ Storage::url( $curriculum[0]->ruta) }}" target="_new">
                                                   Ver Documento <span class='btn-info badge'><font color=#F2F3F8>Cargado</font></span> 
                                    @endif
                                    </td>

                              
                                        
                                </tr>
                         
                                
                            </tbody>
                        </table>
                       
                                    
                    </div>
                    <div class="table-responsive mt-3">
                    <table class="table datatable">               
                                            <thead>
                                            <tr>                                   
                                                 <th class="text-primary" colspan="4"> Requisitos Cargados de los Familiares  <img src="{{url('/img/familia.jpeg')}}" whith="60px" height="60px"/></th>
                                    
                                            </tr>
                                                <tr class="text-primary">
                                                    <th>Cédula de Identidad</th>
                                                    <th>Nombre(s) y Apellido(s)</th>
                                                    <th>Parentesco</th>                               
                                                        <th>Requisitos</th>                                                 
                                                </tr>
                                            </thead>                                  
                                            @foreach($familiar as $familiar)
                                                    <tr>                                                    
                                                    <td>{{ $familiar->nacionalidad }}-{{ $familiar->numero_identificacion }}</td>
                                                        <td>{{ $familiar->nombre }} {{ $familiar->nombreseg }} {{ $familiar->apellido }} {{ $familiar->apellidoseg }}</td>
                                                        <td>{{ $familiar->parentezco }}</td>     

                                                            <td>
                                                            @if($familiar->parentezco_id==2)
                                                            <a href= "/rrhh/ver_documento_familiar/{{$familiar->id_familiar}}/{{$tipo_ducumento='partida_nac_familiar'}}" class="btn btn-success" data-tip="Detalle" title="Cargar Partida de Nacimiento" data-toggle="tooltip" data-original-title="documento">
                                                            <img src="/img/icon/constancia.png" class="icon-sm" alt="Listado">
                                                            </a>
                                                            @endif
                                                            <a href= "/rrhh/ver_documento_familiar/{{$familiar->id_familiar}}/{{$tipo_ducumento='cedula_familiar'}}" class="btn btn-warning" data-tip="Detalle" title="Cargar Cédula de Identidad" data-toggle="tooltip" data-original-title="documento">
                                                            <img src="/img/icon/cedula.png" class="icon-sm" alt="Listado">                                                            
                                                            </a>
                                                            </td>
                                                                                                               
                                                    </tr>
                                            @endforeach     
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                    <div class="table-responsive mt-3">
                                    <table class="table datatable">               
                                            <thead>
                                            <tr>                                   
                                                 <th class="text-primary" colspan="4"> Requisitos Cargados de los Cursos Realizados  <img src="{{url('/img/estudio.png')}}" whith="60px" height="60px"/></th>
                                    
                                            </tr>
                                <tr class="text-primary">
                                    <th>Nombre del Curso</th>
                                    <th>Nombre de la Institución</th>                                  
                                    <th>Fecha de Inicio / Culminación</th>                                                            
                                    <th>Requisitos</th>
                                </tr>
                            </thead>    
                            <tbody>   
                            @foreach($cursos as $cursos)                           
                                <tr>                                                    
                                        <td>{{$cursos->nommbre_curso}}</td>
                                        <td>{{$cursos->institucion_curso}}</td>
                                       
                                        <td>Inicio: {{$cursos->fechainicio_curso}} / Culminación: {{$cursos->fechaculminacion_curso}}</td>
                                        
                                        
                                        <td>
                                        <a href= "/rrhh/ver_documento_cursos/{{$cursos->id}}/{{$tipo_documento='curso'}}" class="btn btn-success" data-tip="Detalle" title="Cargar Curso" data-toggle="tooltip" data-original-title="documento">
                                                            <img src="/img/icon/constancia.png" class="icon-sm" alt="Listado">
                                        </a>
                                        </td>                                                             
                                    </tr>
                            @endforeach
                            </tbody>
                            
                        </table>


                </div>
                <div class="table-responsive mt-3">
                                    <table class="table datatable">               
                                            <thead>
                                            <tr>                                   
                                                 <th class="text-primary" colspan="4"> Requisitos Cargados de Experiencia Laboral <img src="{{url('/img/laboral.png')}}" whith="60px" height="60px"/> </th>
                                    
                                            </tr>
                                <tr class="text-primary">
                                    <th>Empresa u Organización</th>
                                    <th>Cargo Desempeñado</th>                                   
                                    <th colspan="3">Fecha de Ingreso / Egreso</th>                                   
                                    <th>Requisitos</th>
                                </tr>
                            </thead>  
                            @foreach($laboral as $laboral)
                                                    
                             <tr>                                                    
                                        <td>{{$laboral->nombre_empresa}}</td>
                                        <td>{{$laboral->cargo}}</td>                                  
                                        <td colspan="3">Ingreso: {{date('d-m-Y', strtotime($laboral->fecha_ingreso))}} / Egreso: {{date('d-m-Y', strtotime($laboral->fecha_egreso))}}</td>                                        
                                        <td>
                                        <a href= "/rrhh/ver_documento_laboral/{{$laboral->id}}/{{$tipo_ducumento='carta_trab'}}" class="btn btn-success" data-tip="Detalle" title="Cargar Carta de Trabajo o Antecedentes de Servicios" data-toggle="tooltip" data-original-title="documento">
                                                            <img src="/img/icon/constancia.png" class="icon-sm" alt="Listado">
                                        </a>
                                        </td>                                                           
                            </tr>
                            
                          
                            @endforeach                           
                        </table>
                
                    
            </div> <!-- card -->
        </div>
    </div> <!-- row -->
</div>

</div> <!-- row -->
</div>
@endsection