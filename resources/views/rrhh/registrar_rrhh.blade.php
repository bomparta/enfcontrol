@extends('layouts.app')
@section ('content')

<div class="container-fluid">
<div class="row justify-content-start">
@include('layouts.apprrhh')  
       
        
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
            <div align="center" id="divTituloIndex2" class="text-primary">
              
                <b>REGISTRAR MOVIMIENTOS DE PERSONAL</b>
                </div>
           
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%" >
                         <tr>
                            <td>
                                <div id="divSubTituloIndex2">
                                   
                                    <hr>
                                    <b> <span style="color:gray; ">Sumistrar los datos correspondientes al Movimiento del Trabajador(a)</span> en la FENFMP.
                                    <hr>   
                                    @include('rrhh.funcionario.mensaje')  
                           
                                </div>
                            </td>

                        </tr>
                    </table>
      
          <form id="formulario" name="formulario" method="POST" action="{{route('store_rrhh')}}">    
          @csrf
          @if(isset($datos_funcionario))
          @foreach($datos_funcionario as $key=>$funcionario)
          <div class="frameContenedor" style="margin:5px;" align="right">
          <input type= "text" id="funcionario_id" name="funcionario_id" value="{{$funcionario->funcionario_id}}" class="form-control"  >    
          <input type= "text" id="cedula" name="cedula" value="{{$cedula}}" class="form-control"  >                                                        
                
            
                   
                      <table align="center" border="1" cellpadding="2" cellspacing="2" width="100%">
                     
                     <tbody>
                    
                     <tr  class="table-secondary">
                     <th   colspan=9 height="22" align="center"   > <b>  DATOS DEL TRABAJADOR  </b>  </th>
                     </tr>
                     <tr  class="table-primary">
                         <th  rowspan=2 align="center"     >    NACIONALIDAD - CEDULA DE IDENTIDAD </th>
                        
                     </tr>
                     <tr>
                     <td   ><div align="center">  @if($funcionario->id_nacionalidad==1) V 
                     @else E @endif - {{$funcionario->numero_identificacion}}  </div></td>
                     

                     </tr>

                     <tr  class="table-primary">
                     <th  align="center"   >   PRIMER NOMBRE    </th>
                     <th  align="center"   >   SEGUNDO NOMBRE    </th>
                     <th  align="center"   >    PRIMER  APELLIDO    </th>
                     <th  align="center"   >   SEGUNDO APELLIDO    </th>
                     <th  align="center"   >   SEXO    </th>                    
                     <th  align="center"   >   EDAD    </th>
                     <th  align="center"   >   TIPO DE TRABAJADOR    </th>
                     <th  align="center"   >   CARGO    </th>
                     <th  align="center"   >   UNIDAD DE ADSCRIPCIÓN    </th>
                     </tr>
                     <tr  >
                     <td   >   {{$funcionario->nombre}}    </td>
                     <td    >  {{$funcionario->nombreseg}}    </td>
                     <td  >   {{$funcionario->apellido}}     </td>
                     <td   >   {{$funcionario->apellidoseg}}     </td>
                     <td  >   @if($funcionario->id_genero==2) FEMENINO @else MASCULINO @endif    </td>                     
                     <td  >{{$edad}}  AÑOS </td>
                     <td  >   {{$funcionario->trabajador}}   </td>
                     <td     >   {{$funcionario->cargo}}   </td>
                     <td  >   {{$funcionario->administrativa}}   </td>
                     </tr>
                     
                   
                     </tbody>
                     
                    </table>
                    <p><p>
                    <table align="center" border="0" cellpadding="2" cellspacing="2" width="100%">
                   <tr>
                   <tr>
                            <td>
                                &nbsp;Tipo de Trabajador&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="id_tipo_trabajador" name="id_tipo_trabajador"  class="form-control" required >
                                <option value="0">Seleccione...</option>
                                    @foreach ($tipo_trabajador as $tipo_trabajador)
                                    <option value="{{ $tipo_trabajador->id }}"
                                    @if($funcionario->tipo_trabajador == $tipo_trabajador->id) selected @endif >
                                      {{ $tipo_trabajador->descripcion }} </option>
                                    @endforeach
                                </select>
                                @error('id_tipo_trabajador')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>
                            <td>
                                &nbsp;Cargo&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <input type= "text" id="cargo" name="cargo" onkeyup="mayusculas(this);"  value="{{$funcionario->cargo}}" class="form-control" required >                              
                                @error('cargo')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>
                            
                        </tr>
                        <!-- FILA 6 -->
                        <tr>
                            <td>
                                &nbsp;Unidad de Adscripción&nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <select id="id_oficina_administrativa" name="id_oficina_administrativa"class="form-control" required >
                                <option value="0">Seleccione...</option>
                                    @foreach ($uni_adscripcion as $uni_adscripcion)
                                        <option value="{{ $uni_adscripcion->id }}"
                                        @if($funcionario->id_oficina_administrativa == $uni_adscripcion->id)selected @endif >
                                        {{ $uni_adscripcion->descripcion }}</option>
                                    @endforeach
                                </select>
                                @error('id_oficina_administrativa')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                               
                            </td>
                           
                           
                        </tr>
                            <td>
                                &nbsp;Fecha Movimiento&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red;">*</span><br>
                                <input type="date" name="fechamov" id="fechamov" value=""  maxlength="25" required/>
                            </td>
                            @error('fechamov')
                                <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror  
                       
                            <td>
                            &nbsp;Tipo Movimiento de Personal&nbsp;<span style="color:red;">*</span>&nbsp;
                            <select id="tipo_mov" name="tipo_mov"class="form-control" required >
                                <option value="0">Seleccione...</option>
                            @foreach ($tipo_mov as $tipo_mov)
                                        <option value="{{ $tipo_mov->id }}"
                                        @if($funcionario->id_tipo_mov == $tipo_mov->id)selected @endif >
                                        {{ $tipo_mov->descripcion }}</option>
                                    @endforeach
                                    @error('tipo_mov')
                                <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror  
                            </td>
                        </tr>
                        <tr>
                            <td>
                                &nbsp;Nombre de la Institución &nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <input type= "text" id="institucion" name="institucion" onkeyup="mayusculas(this);"  value="" class="form-control" required >                              
                                @error('institucion')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>
                            <td>
                                &nbsp;Observaciones &nbsp;<span style="color:red;">*</span>&nbsp;<br>
                                <input type= "text" id="observaciones" name="observaciones" onkeyup="mayusculas(this);"  value="" class="form-control"  >                              
                                @error('observaciones')
                                    <div class="invalid-feedback">
                                    <span style="color:red;"><strong>{{ $message }}</strong></span>
                                    </div>
                                @enderror
                            </td>
                        </tr>
                    
                    <tr> 
                    <td >
                   
                    </td>
                   
                    </table>
  
                    <div class="frameContenedor" style="margin:5px;" align="right">
                        <input class='btn btn-info' type="submit" value="Guardar" >
                        <a class='btn btn-secondary' href="{{URL::route('mov_rrhh',$funcionario->numero_identificacion)}}">Regresar</a> 
                    </div>
                    @endforeach
                    @endif 
                    </form>
            

            </div>
            
        </div>
        
    </div>
</div>



@endsection

