@extends('layouts.app')
@section ('content')

<div class="container-fluid">
<div class="row justify-content-start">
@include('layouts.apprrhh')  
       
        
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
            <div align="center" id="divTituloIndex2" class="text-primary">
              
                <b>MOVIMIENTOS DE PERSONAL</b>
                </div>
           
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
                         <tr>
                            <td>
                                <div id="divSubTituloIndex2">
                                   
                                    <hr>
                                    <b> <span style="color:gray; ">Movimientos del Trabajador(a)</span> en la FENFMP.
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                           
                                </div>
                            </td>

                        </tr>
                    </table>
      
          <form id="formulario" name="formulario" action="POST" action="#">    
          @csrf
          <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Registrar Movimiento RRHH " >
                    </div>
                      @if(isset($datos_funcionario))
                      <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%">
                     
                     <tbody>
                     @foreach($datos_funcionario as $key=>$funcionario)
                     <tr  class="table-secondary">
                     <th   colspan=13 height="22" align="center"   >   DATOS DEL TRABAJADOR    </th>
                     </tr>
                     <tr  class="table-primary">

                     <th colspan="13" align="center"     >    NACIONALIDAD - CEDULA DE IDENTIDAD </th>		

                     </tr>
                     <tr>

                     <td   colspan="7" ><div align="center">  @if($funcionario->id_nacionalidad==1) V 
                     @else E @endif - {{$funcionario->numero_identificacion}}  </div></td>

                     </tr>

                     <tr  class="table-primary">
                     <th  colspan=4 align="center"   >   PRIMER NOMBRE    </th>
                     <th  colspan=3 align="center"   >   SEGUNDO NOMBRE    </th>
                     <th  colspan=3 align="center"   >    PRIMER  APELLIDO    </th>
                     <th  colspan=3 align="center"   >   SEGUNDO APELLIDO    </th>
                     </tr>
                     <tr >
                     <td  colspan=4 align="center"   >   {{$funcionario->nombre}}    </td>
                     <td  colspan=3 align="center"  >  {{$funcionario->nombreseg}}    </td>
                     <td  colspan=3 align="center"   >   {{$funcionario->apellido}}     </td>
                     <td  colspan=3 align="center"   >   {{$funcionario->apellidoseg}}     </td>
                     </tr>
                     <tr  class="table-primary">
                     <th  colspan=3  align="center"   >   SEXO    </th>
                     <th  colspan=4 align="center"   >   ESTADO CIVIL      </th>
                     <th  colspan=5 align="center"   >    FECHA Y LUGAR  DE NACIMIENTO    </th>
                     <th  align="center"   >   EDAD    </th>
                     </tr>
                     <tr>
                     <td  colspan=3  align="center"   >   @if($funcionario->id_genero==2) FEMENINO @else MASCULINO @endif    </td>

                     <td  align="center" colspan="4"  > {{$funcionario->est_civil}}   </td>

                     <td  align="center"  colspan=5  >   {{date('d-m-Y', strtotime($funcionario->edad))}}   {{$funcionario->ciudad_nac}}  {{$funcionario->estado_nac}}   </td>

                     <td  align="center"   >{{$edad}}  AÑOS </td>
                     </tr>

                     <tr  class="table-primary">
                     <th  colspan=6  align="center"   >   TIPO DE TRABAJADOR    </th>
                     <th  colspan=3 align="center"   >   CARGO    </th>
                     <th  colspan=4 align="center"   >   UNIDAD DE ADSCRIPCIÓN    </th>
                     </tr>
                     <tr>
                     <td  colspan=6 align="center"   >   {{$funcionario->trabajador}}   </td>
                     <td  colspan=3 rowspan=2 align="center"   >   {{$funcionario->cargo}}   </td>
                     <td  colspan=4 rowspan=2 align="center"   >   {{$funcionario->administrativa}}   </td>
                     </tr>
                     </tbody>
                     @endforeach
                    @endif     
                    </table>
                    <div class="table-responsive mt-3">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">                        
                            <thead>
                                <tr>
                                    <th>Tipo de Movimiento</th>
                                    <th>Unidad Administrativa</th>
                                    <th>Fecha de Movimiento</th>                                   
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                        <th>Opcion</th>
                                    @endif
                                </tr>
                            </thead>   
                            <tbody>   
                                @if(isset($movimiento)   )
                                @foreach($movimiento as $movimiento)                         
                                <tr>      
                                <td></td>
                                <td></td>
                                <td></td>
                                        @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                            <td class="text-center">
                                            <a href= "#" class="btn btn-info" data-tip="Detalle" title="Actualizar" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/modify.ico" class="icon-sm" alt="Listado">
                                            <a href= "#" class="btn btn-info" data-tip="Detalle" title="Contrato" data-toggle="tooltip" data-original-title="Editar">
                                            <img src="/img/icon/list.ico" class="icon-sm" alt="Listado">
                                            </a>
                                            </td>
                                        @endif                                                            
                                    </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                    <th>Tipo de Movimiento</th>
                                    <th>Unidad Administrativa</th>
                                    <th>Fecha de Movimiento</th>                                   
                                    @if(in_array( Auth::user()->id_usuariogrupo, array(9,12,10) ))
                                        <th>Opcion</th>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    @endif
                    </form>


            </div>
            
        </div>
        
    </div>
</div>



@endsection

