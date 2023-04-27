@extends('layouts.app')
@section('styles')

@endsection

@section('content')
    <div class="d-flex" id="wrapper">
        @include('layouts.apprrhh')
      
        <div id="page-content-wrapper">
        <div class="sidebar-heading text-center">
      <h4 class="text-primary" >CONTROL DE EXPEDIENTES RRHH</h6>   
   
      </a>
      <h6 class="text-dark">Bienvenid@, {{Auth::user()->name}}</h6>
    </div> 

            <div class="container pb-4">
                <div class="row align-items-stretch">

                        <div class="col-12">

                            <div class="card mb-4">
                    <div align="center" id="divTituloIndex2" class="text-primary">
                                <b> REQUISITOS DIGITALIZADOS</b>
                    </div>
                    <div id="divSubTituloIndex2">
                                    <hr>
                                    <b>Suministre los <span style="color:gray;">Requisitos </span>y/o documentos de forma digitalizada más recientes y con nitidez , haga clic en "Cargar o Editar" en cada requisito para registrar su información <b>
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                                </div>
                    <div class="table-responsive mt-3">
                        <table class="table datatable">
                            <thead>
                                <tr>                                   
                                    <th class="text-primary"> Requisitos Cargados del Funcionario  <img src="{{url('/img/datos.png')}}" whith="60px" height="60px"/></th>
                                    <th class="text-primary" ></th>
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(10,11,12,13) ))
                                        <th class="text-primary" colspan="3">Opción</th>
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
                                                <img src="{{url('img/icon/check.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"> <a href= "{{ Storage::url( $foto[0]->ruta) }}" target="_new">
                                                   Ver Documento   <span class='btn-info badge'><font color=#F2F3F8>Cargado</font></span>                                        
                                            @endif

                                        </td>                                  
                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,10,11,12,13) ))
                                            @if( empty($foto[0]) ) 
                                            <td class="text-center">
                                            <a href= "{{route('creardocumento',$tipo_documento='foto')}}" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Cargar
                                            </a>
                                            </td>
                                            @else
                                            <td class="text-center">
                                                <a href= "{{route('creardocumento',$tipo_documento='foto')}}" class="btn btn-success" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                                <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Editar
                                                </a>
                                                </td>
                                            @endif
                                        @endif
                                            
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
                                      
                                        @if (empty($cedula[0]) )
                                            <td class="text-center">
                                            <a href= "{{route('creardocumento',$tipo_documento='cedula')}}" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Cargar
                                            </a>
                                            </td>
                                            @else
                                            <td class="text-center">
                                                <a href= "{{route('creardocumento',$tipo_documento='cedula')}}" class="btn btn-success" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                                <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Editar
                                                </a>
                                                </td>
                                            @endif
                                     
                                            
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
                                    
                                    @if(empty($partida[0]->ruta ))
                                            <td class="text-center">
                                            <a href= "{{route('creardocumento',$tipo_documento='partida_nac')}}" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Cargar
                                            </a>
                                            </td>
                                            @else
                                            <td class="text-center">
                                                <a href= "{{route('creardocumento',$tipo_documento='partida_nac')}}" class="btn btn-success" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                                <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Editar
                                                </a>
                                                </td>
                                            @endif
                                     
                                            
                                    </tr>
                                    <tr>
                                    
                                        <td  >ACTA DE MATRIMONIO Y/O CONCUBINATO</td>
                                        <td>
                                            @if(empty($matrimonio[0]) )
                                                <img src="{{url('img/imagen/documento.jpg')}}" style="max-width: 250px; max-height: 150px"  alt="Image"/><span class='btn-info badge'><font color='red'>Pendiente</font></span> 
                                                @else
                                                <img src="{{url('img/icon/check.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"> <a href= "{{ Storage::url( $matrimonio[0]->ruta) }}" target="_new">
                                                   Ver Documento <span class='btn-info badge'><font color=#F2F3F8>Cargado</font></span> 
                                            @endif
                                        </td>
                                  
                                            @if(empty($matrimonio[0]->ruta ))
                                            <td class="text-center">
                                            <a href= "{{route('creardocumento',$tipo_documento='matrimonio')}}" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Cargar
                                            </a>
                                            </td>
                                            @else
                                            <td class="text-center">
                                                <a href= "{{route('creardocumento',$tipo_documento='matrimonio')}}" class="btn btn-success" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                                <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Editar
                                                </a>
                                                </td>
                                            @endif
                                   
                                            
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

                              
                                    @if(empty($rif[0]->ruta) )
                                        <td class="text-center">
                                        <a href= "{{route('creardocumento',$tipo_documento='rif')}}" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                        <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Cargar
                                        </a>
                                        </td>
                                        @else
                                        <td class="text-center">
                                            <a href= "{{route('creardocumento',$tipo_documento='rif')}}" class="btn btn-success" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Editar
                                            </a>
                                            </td>
                                        @endif
                                 
                                        
                                </tr>
                                <td  >CARNET DE TRABAJO DEL MINISTERIO PÚBLICO</td>
                                    <td>
                                    @if(empty($carnet[0]->ruta) )
                                        <img src="{{url('img/imagen/foto_carnet_mp.png')}}" style="max-width: 150px; max-height: 150px"  alt="Image"/><span class='btn-info badge'><font color='red'>Pendiente</font></span> 
                                    @else
                                    <img src="{{url('img/icon/check.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"> <a href= "{{ Storage::url( $carnet[0]->ruta) }}" target="_new">
                                                   Ver Documento<span class='btn-info badge'><font color=#F2F3F8>Cargado</font></span> 
                                    @endif
                                    </td>

                              
                                    @if(empty($carnet[0]->ruta) )
                                        <td class="text-center">
                                        <a href= "{{route('creardocumento',$tipo_documento='carnet_mp')}}" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                        <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Cargar
                                        </a>
                                        </td>
                                        @else
                                        <td class="text-center">
                                            <a href= "{{route('creardocumento',$tipo_documento='carnet_mp')}}" class="btn btn-success" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Editar
                                            </a>
                                            </td>
                                        @endif
                                 
                                        
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

                              
                                    @if(empty($titulo[0]->ruta) )
                                        <td class="text-center">
                                        <a href= "{{route('creardocumento',$tipo_documento='titulo')}}" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                        <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Cargar
                                        </a>
                                        </td>
                                        @else
                                        <td class="text-center">
                                            <a href= "{{route('creardocumento',$tipo_documento='titulo')}}" class="btn btn-success" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Editar
                                            </a>
                                            </td>
                                        @endif
                                 
                                        
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
                                                                             
                                                @if(empty($constancia[0]->ruta) )
                                                <td class="text-center">
                                                    <a href= "{{route('creardocumento',$tipo_documento='constancia_est')}}" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                                    <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Cargar
                                                    </a>
                                                </td>
                                                @else
                                                <td class="text-center">
                                                    <a href= "{{route('creardocumento',$tipo_documento='constancia_est')}}" class="btn btn-success" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                                    <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Editar
                                                    </a>
                                                </td>
                                                @endif
                                              
                                            <tr >
                                                <td><b> Horario de Clases</b>
                                                        @if(empty($horario[0]) )
                                                            <img src="{{url('img/imagen/horario.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"/><span class='btn-info badge'><font color='red'>Pendiente</font></span> 
                                                        @else
                                                        <img src="{{url('img/icon/check.png')}}" style="max-width: 250px; max-height: 150px"  alt="Image"> <a href= "{{ Storage::url( $horario[0]->ruta) }}" target="_new">
                                                    Ver Documento <span class='btn-info badge'><font color=#F2F3F8>Cargado</font></span> 
                                                        @endif
                                                    </td>
                                            
                                                    @if(empty($horario[0]->ruta) )
                                                    <td class="text-center">
                                                        <a href= "{{route('creardocumento',$tipo_documento='horario')}}" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                                        <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Cargar
                                                        </a>
                                                    </td>
                                                    @else
                                                    <td class="text-center">
                                                        <a href= "{{route('creardocumento',$tipo_documento='horario')}}" class="btn btn-success" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                                        <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Editar
                                                        </a>
                                                    </td>
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

                              
                                    @if(empty($curriculum[0]->ruta) )
                                        <td class="text-center">
                                        <a href= "{{route('creardocumento',$tipo_documento='curriculum')}}" class="btn btn-info" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                        <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Cargar
                                        </a>
                                        </td>
                                        @else
                                        <td class="text-center">
                                            <a href= "{{route('creardocumento',$tipo_documento='curriculum')}}" class="btn btn-success" data-tip="Detalle" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">Editar
                                            </a>
                                            </td>
                                        @endif
                                 
                                        
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
                                                    <th>Parentezco</th>                               
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
                                                            <a href= "creardocumento_familiar/{{$tipo_documento='partida_nac_familiar'}}/{{$familiar->id_familiar}}/{{$ir='requisitos'}}" class="btn btn-success" data-tip="Detalle" title="Cargar Partida de Nacimiento" data-toggle="tooltip" data-original-title="documento">
                                                            <img src="/img/icon/constancia.png" class="icon-sm" alt="Listado">
                                                            </a>
                                                            @endif
                                                            <a href= "creardocumento_familiar/{{$tipo_documento='cedula_familiar'}}/{{$familiar->id_familiar}}/{{$ir='requisitos'}}" class="btn btn-warning" data-tip="Detalle" title="Cargar Cédula de Identidad" data-toggle="tooltip" data-original-title="documento">
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
                                        <a href= "creardocumento_curso/{{$tipo_documento='curso'}}/{{$cursos->id}}/{{$ir='requisitos'}}" class="btn btn-success" data-tip="Detalle" title="Cargar Curso" data-toggle="tooltip" data-original-title="documento">
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
                                        <a href= "creardocumento_laboral/{{$tipo_documento='carta_trab'}}/{{$laboral->id}}/{{$ir='requisitos'}}" class="btn btn-success" data-tip="Detalle" title="Cargar Carta de Trabajo o Antecedentes de Servicios" data-toggle="tooltip" data-original-title="documento">
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