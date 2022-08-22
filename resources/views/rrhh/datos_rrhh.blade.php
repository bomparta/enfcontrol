<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PLANILLA ACTUALIZACIÓN DE DATOS EXPEDIENTES DE PERSONAL</title>
    <style>
    body {
  font-family: 'Times New Roman';

  font-size: 50%;

}
    table{
       
        border-collapse: collapse;
        width: 100%;
        border: 1px solid ;
       
        
    }
    tr, td {
        border: 1px solid ;
        text-align: left;
        padding: 2px;
        
    }
    tr.tr_encabezado,td.td_encabezado,th.th_encabezado{
        border:hidden; 
        background-color: white;
        text-align: center;
        font-size: 100%;
   }
   tr.tr_encabezado1,td.td_encabezado1,th.th_encabezado1{
        background-color: #dddddd;       
        text-align: center;
        font-size: 100%;
        border: 1px solid ;     
   }
    th{
        border: 1px solid ;       
        padding: 6px; 
        background-color: #f0f0f0;
       
       
    }
    tr.tr_footer,td.td_footer{
        border:hidden; 
        background-color: white;
        text-align: center;
        font-size: 100%;
   }
   
</style>
  </head>

 
<style>
@page { margin-left: 0.1in; margin-right: 0.1in; margin-top: 0.1in; margin-bottom: 0.1in; }
body { margin-left: 0.1in; margin-right: 0.1in; margin-top: 0.1in; margin-bottom: 0.1in; }

</style>
<body>
<table border="0" cellpadding="0" cellspacing="5" >    


<tr class="tr_encabezado">
    <td class="td_encabezado" colspan="2">  <img src="{{public_path('/img/logo1.png')}}" style="width: 15mm; height: 15mm; margin: 0;" /> </td>
    <td class="td_encabezado" colspan="9" style="font-size:150%;"><b>REPUBLICA BOLIVARIANA DE VENEZUELA <br>
        FUNDACIÓN ESCUELA NACIONAL DE FISCALES DEL MINISTERIO PÚBLICO <br>
        PLANILLA ACTUALIZACIÓN DE DATOS EXPEDIENTES DE PERSONAL 
        <br><br>
        AÑO {{ date('Y') }}   </b>
    </td>
    <td class="td_encabezado" colspan="2"> <img  src="{{public_path('/img/logo2.png')}}"   style="width: 15mm; height: 15mm; " /></td>
</tr>
<tr  class="tr_encabezado" ><td colspan=12 height="22" align="center" class="td_encabezado" ></td>
	<td height="22" align="center" class="td_encabezado">
		<div align="center"> <img src="{{storage_path('app/'.$foto[0]->ruta)}}" style="width: 15mm; height: 15mm; margin: 0;" /> 
		</div>
	</td>
</tr>

        <tbody>
        @foreach($datos_funcionario as $key=>$funcionario)
		<tr>
			<th colspan="6" align="center"   >  FECHA DE ELABORACIÓN</th>
			<th colspan="6" align="center"   >    NACIONALIDAD - CEDULA DE IDENTIDAD </th>		
			
		</tr>
	<tr>
		<td   colspan="6" align="center"  > <div align="center"> {{ date('d-m-Y') }}   </div></td>
		<td   colspan="7" ><div align="center">  @if($funcionario->id_nacionalidad==1) V 
            @else E @endif - {{$funcionario->numero_identificacion}}  </div></td>
		
	</tr>
	<tr>
		<th class="th_encabezado1"  colspan=13 height="22" align="center"   >   DATOS DEL TRABAJADOR    </th>
	</tr>
	<tr>
		<th  colspan=4 align="center"   >   PRIMER NOMBRE    </th>
		<th  colspan=3 align="center"   >   SEGUNDO NOMBRE    </th>
		<th  colspan=3 align="center"   >    PRIMER  APELLIDO    </th>
		<th  colspan=3 align="center"   >   SEGUNDO APELLIDO    </th>
	</tr>
	<tr>
		<td  colspan=4 align="center"   >   {{$funcionario->nombre}}    </td>
		<td  colspan=3 align="center"  >  {{$funcionario->nombreseg}}    </td>
		<td  colspan=3 align="center"   >   {{$funcionario->apellido}}     </td>
		<td  colspan=3 align="center"   >   {{$funcionario->apellidoseg}}     </td>
		</tr>
	<tr>
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
	
	<tr>
		<th  colspan=6  align="center"   >   TIPO DE TRABAJADOR    </th>
		<th  colspan=3 align="center"   >   CARGO    </th>
		<th  colspan=4 align="center"   >   UNIDAD DE ADSCRIPCIÓN    </th>
	</tr>
	<tr>
		<td  colspan=6 align="center"   >   {{$funcionario->trabajador}}   </td>
		<td  colspan=3 rowspan=2 align="center"   >   {{$funcionario->cargo}}   </td>
		<td  colspan=4 rowspan=2 align="center"   >   {{$funcionario->administrativa}}   </td>
	</tr>
	<tr>
		<th class="th_encabezado1"  colspan=13  height="22" align="center"   >   DIRECCIÓN DE HABITACIÓN     </th>
	</tr>
	<tr>
		<th   colspan=4  align="center"   >   SECTOR O URBANIZACION    </th>
		<th   colspan=3 align="center"   >   CALLE O AVENIDA    </th>
		<th  colspan=6 align="center"   >   TIPO DE VIVIENDA    </th>
	</tr>
	<tr>
		<td  colspan=4 rowspan=2  align="center"   >  {{$funcionario->sector_urbanizacion}}     </td>
		<td   colspan=3 rowspan=2 align="center"   >    {{$funcionario->calle_avenida}}     </td>
		<th   align="left"   colspan="2">   CASA - APARTAMENTO Nº    </th>	
		<th      align="left"   >    PISO N°    </th>
		<th  colspan=3 align="center"   >   NOMBRE DE LA CASA O EDIFICIO    </th>
	</tr>
	<tr>
		
		<td  align="right" colspan="2"  >       {{$funcionario->nro_casa_apartamento}}    </td>
		<td  align="left"   > {{$funcionario->piso_nro_casa}}    </td>
		<td  colspan=3 align="center"   >{{$funcionario->piso_nro_casa}}  {{$funcionario->nombre_casa_edificio_residencia}}     </td>
	</tr>
	<tr>
		<th  colspan=4  align="center"   >   PARROQUIA    </th>
		<th  colspan=4 align="center"   >   MUNICIPIO    </th>
		<th       colspan=3 align="center"   >   ESTADO    </th>
		<th       colspan=2 align="center"   >   CODIGO POSTAL    </th>
	</tr>
	<tr>
		<td  colspan=4  align="center"   >   {{$funcionario->parr_domi}}   </td>
		<td  colspan=4  align="center"   >   {{$funcionario->muni_domi}}   </td>
		<td  colspan=3  align="center"   >    {{$funcionario->ent_domi}}    </td>
		<td  colspan=2 align="center"   >   {{$funcionario->codigo_postal}}     </td>
	</tr>	
	<tr>
		<th  colspan=5  align="center"   >   CONDICIÓN DE LA VIVIENDA    </th>
		<th  colspan=3 align="center"   >   Nº TELEFONO DE HABITACION    </th>
		<th  colspan=2 align="center"   >   Nº TELEFONO MOVIL (CELULAR)    </th>
		<th  colspan=3 align="center"   >   DIRECCION DE CORREO ELECTRÓNICO    </th>
	</tr>
	<tr>
		<td  colspan=5  align="center"   >    @if($funcionario->condicion_casa_id=='1')Propia @endif
                                            @if($funcionario->condicion_casa_id=='2')  Alquilada   @endif  
                                            @if($funcionario->condicion_casa_id=='3')  Familiar       @endif                            
                                          @if($funcionario->condicion_casa_id=='4') Otros @endif
		<td  colspan=3 align="center"   > {{$funcionario->telfhabitacion}}    </td>
		<td  colspan=2 align="center"    >   {{$funcionario->telcelular}}     </td>
		<td  colspan=3 align="center"   >{{$funcionario->email}}  </td>
	</tr>
	
	<tr>
		<th  colspan=6 align="center"   >   OTRA DIRECCION DONDE SE LE PUEDA LOCALIZAR    </th>
		<th  colspan=3 align="center"   >   OTRO Nº TELEFONICO DONDE SE PUEDA LOCALIZAR    </th>
		<th  colspan=4 align="center"   >   PERSONA CONTACTO    </th>
	</tr>
	<tr>
		<td  colspan=6 align="center"   > {{$funcionario->direccion_contacto}}   </td>
		<td  colspan=3 align="center"   >   {{$funcionario->telefono_contacto}}     </td>
		<td  colspan=4 align="center"   >  {{$funcionario->persona_contacto}}   </td>
		</tr>
	
	<tr>
		<th  colspan=3 rowspan=2 align="center"   >   GRUPO SANGUINEO    </th>
		<th  colspan=5 align="center"   >   TALLAS    </th>
		<th  colspan=5 align="center"   >   PRESENTA ALGUN TIPO DE ALERGIA, ENFERMEDAD CRONICA O PADECIMIENTO ESPECIFIQUE:    </th>
	</tr>
	<tr>
		<th  align="center">   ESTATURA    </th>
		<th  align="center">   PESO    </th>
		<th  align="center">   PANTALON    </th>
		<th  align="center">   CAMISA    </th>
		<th  align="center">   CALZADO    </th>
		<td  colspan=5 rowspan=2 align="center"   >   @if ($funcionario->es_alergico==1) SI @else NO @endif POSEE ALERGIA <br>{{$funcionario->tipo_alergia}}     </td>
		</tr>
	<tr>
		<td  colspan=3 height="22" align="center"   >  {{$funcionario->grupo_sanguineo}}    </td>
		<td  align="center"   >  {{$funcionario->estatura}}  </td>
		<td  align="center"  >  {{$funcionario->peso}}   </td>
		<td  align="center"  >  {{$funcionario->pantalon}}    </td>
		<td  align="center"  >   {{$funcionario->camisa}}    </td>
		<td  align="center"  >  {{$funcionario->calzado}}   </td>
		</tr>
	<tr>
		<th  colspan=13  align="center"   >   SI ESTA BAJO ALGUN TRATAMIENTO MEDICO ESPECIFIQUE (ANEXE INFORME MEDICO):    </th>
		</tr>
	<tr>
		<td  colspan=13 height="22" align="center"   > @if ($funcionario->posee_enfermedad==1) SI @else NO @endif POSEE ENFERMEDAD <br>{{$funcionario->tipo_enfermedad}}    </td>
		</tr>
	<tr>
		<th class="th_encabezado1" colspan=13 height="22" align="center"   >   CUENTAS BANCARIAS    </th>
		</tr>
	<tr>
		<th  colspan=5  align="center"   >   CUENTA BANCARIA Nº    </th>
		<th  colspan=3 align="center"   >   TIPO DE CUENTA    </th>
		<th  colspan=5 align="center"   >   BANCO    </th>
		</tr>
	@foreach($cuentas as $cuentas)
	<tr>
		<td  colspan=5  align="center"   >  {{$cuentas->cuenta}}   </td>
		<td  colspan=3 align="center"   >    {{$cuentas->tipo_cuenta}}      </td>
		<td  colspan=5 align="center"  >  {{$cuentas->nombre_banco}}   </td>
	</tr>
	@endforeach
	<tr>
		<th  class="th_encabezado1"colspan=13 height="27" align="center"   >   DATOS DEL GRUPO FAMILIAR    </th>
		</tr>
	<tr>
		<th  colspan=3  align="center"   >   NOMBRES Y APELLIDOS    </th>
		<th  align="center"   >   CÉDULA DE IDENTIDAD    </th>
		<th  colspan=2 align="center"   >   PARENTESCO     </th>
		<th  align="center"   >   EDAD    </th>
		<th  align="center"   >   FECHA DE NACIMIENTO    </th>
		<th  colspan=2 align="center"   >   OCUPACION O PROFESIÓN (EN CASO DE SER ESTUDIANTES INDIQUE EL NIVEL DE ESTUDIO)    </th>
		<th  colspan=2 align="center"   >   Nº TELEFONICO    </th>
		<th  align="center"   >   VIVEN CON USTED                    (SI / NO)    </th>
	</tr>
	@php $i = 1; @endphp
	@foreach($familiar as $familiar) 
	<tr>
		<td   align="center"    sdval="4" sdnum="8202;"> {{$i}}  </td>
		<td  colspan=2 align="center"   >  {{$familiar->nombre}} {{$familiar->apellido}}    </td>
		<td  align="right"    sdval="3146754" sdnum="8202;"> {{$familiar->nacionalidad}}  {{$familiar->numero_identificacion}}   </td>
		<td  colspan=2 align="center"    sdnum="8202;0;#.##0">   {{$familiar->parentezco}}     </td>
		<td  align="center"    sdnum="8202;0;DD-MM-AA"> 		</td>
		<td  align="center"    sdval="16583" sdnum="8202;0;DD/MM/AAAA">   {{$familiar->edad}}    </td>
		<td  colspan=2 align="center"   >    {{$familiar->ocupacion_fam}}    </td>
		<td  colspan=2 align="center"   >    {{$familiar->telefono}}       </td>
		<td  align="center"   >   @if ($familiar->vive_id==1) SI @else NO @endif      </td>
	</tr>
	@php $i++; @endphp
	@endforeach
	<tr>
		<th  class="th_encabezado1" colspan=13 height="22" align="center"   >   INSTRUCCIÓN FORMAL Y COMPLEMENTARIA    </th>
		</tr>
	<tr>
		<th  colspan=13 height="22" align="center"   >   NIVEL DE INSTRUCCIÓN    </th>
		</tr>
		
	<tr>
		<th  colspan=3 align="center"   >   PRIMARIA (ULTIMO AÑO CURSADO)    </th>
		<th  colspan=3 align="center"   >   NOMBRE DE LA INSTITUCION    </th>
		<th  colspan=3 align="center"   >   DIRECCIÓN REFERENCIAL    </th>
		<th  colspan=2 align="center"   >   FECHA DE INICIO    </th>
		<th  colspan=2 align="center"   >   FECHA DE CULMINACION    </th>
		</tr>
		@if(isset($educacion))
		@foreach($educacion as $educacion) 
	<tr>
		<td  colspan=3  align="center"   >   {{$educacion-> pri_ult_anio}}   </td>
		<td  colspan=3 align="center"   >  {{$educacion-> institucion_pri}}    </td>
		<td  colspan=3 align="center"   >  {{$educacion-> dir_ref_pri}}    </td>
		<td  colspan=2 align="center"   >    {{$educacion-> fecha_ini_pri}}     </td>
		<td  colspan=2 align="center"    >    {{$educacion-> fecha_fin_pri}}     </td>
		</tr>
	<tr>
		<th  colspan=3  align="center"   >   SECUNDARIA (ULTIMO AÑO CURSADO)    </th>
		<th  colspan=3 align="center"   >   NOMBRE DE LA INSTITUCION    </th>
		<th  colspan=3 align="center"   >   DIRECCIÓN REFERENCIAL    </th>
		<th  colspan=2 align="center"   >   FECHA DE INICIO    </th>
		<th  colspan=2 align="center"   >   FECHA DE CULMINACION    </th>
		</tr>
	<tr>
	<td  colspan=3  align="center"   >   {{$educacion-> sec_ult_anio}}   </td>
		<td  colspan=3 align="center"   >  {{$educacion-> institucion_sec}}    </td>
		<td  colspan=3 align="center"   >  {{$educacion-> dir_ref_sec}}    </td>
		<td  colspan=2 align="center"   >    {{$educacion-> fecha_ini_sec}}     </td>
		<td  colspan=2 align="center"    >    {{$educacion-> fecha_fin_sec}}     </td>
		</tr>
	<tr>
		<th  colspan=3 align="center"   >   TECNICA SUPERIOR (ULTIMO AÑO  O SEMESTRE CURSADO)    </th>
		<th  colspan=3 align="center"   >   NOMBRE DE LA INSTITUCION    </th>
		<th  colspan=3 align="center"   >   DIRECCIÓN REFERENCIAL    </th>
		<th  colspan=2 align="center"   >   FECHA DE INICIO    </th>
		<th  colspan=2 align="center"   >   FECHA DE CULMINACION    </th>
		</tr>
	<tr>
	<td  colspan=3  align="center"   >   {{$educacion-> tec_ult_anio}}   </td>
		<td  colspan=3 align="center"   >  {{$educacion-> institucion_tec}}    </td>
		<td  colspan=3 align="center"   >  {{$educacion-> dir_ref_tec}}    </td>
		<td  colspan=2 align="center"   >    {{$educacion-> fecha_ini_tec}}     </td>
		<td  colspan=2 align="center"    >    {{$educacion-> fecha_fin_tec}}     </td>
		</tr>
	<tr>
		<th  colspan=3 height="22" align="center"   >   UNIVERSITARIA (ULTIMO AÑO  O SEMESTRE CURSADO)    </th>
		<th  colspan=3 align="center"   >   NOMBRE DE LA INSTITUCION    </th>
		<th  colspan=3 align="center"   >   DIRECCIÓN REFERENCIAL    </th>
		<th  colspan=2 align="center"   >   FECHA DE INICIO    </th>
		<th  colspan=2 align="center"   >   FECHA DE CULMINACION    </th>
		</tr>
	<tr>
	<td  colspan=3  align="center"   >   {{$educacion->uni_ult_anio}}   </td>
		<td  colspan=3 align="center"   >  {{$educacion-> institucion_uni}}    </td>
		<td  colspan=3 align="center"   >  {{$educacion-> dir_ref_uni}}    </td>
		<td  colspan=2 align="center"   >    {{$educacion-> fecha_ini_uni}}     </td>
		<td  colspan=2 align="center"    >    {{$educacion-> fecha_fin_uni}}     </td>
		</tr>
	<tr>
		<th  colspan=13  align="center"   >   PROFESIÓN U OCUPACIÓN    </th>
		</tr>
	<tr>
		<td  colspan=13 height="22" align="center"   >  {{$educacion-> profesion_ocup}}</td>
		</tr>
	<tr>
		<th  colspan=13  align="center" height="22"  >   EN CASO DE  HABER CULMINADO OTROS ESTUDIOS A NIVEL TECNICO SUPERIOR O UNIVERSITARIO INDIQUE TITULOS OBTENIDOS :    </th>
		</tr>
	<tr>
		<td  colspan=13 height="22" align="center"   >   {{$educacion-> otros_estudios}}    </td>
		</tr>
	@endforeach
	@endif
	<tr>
		<th  colspan=3 align="center"   >   ESTUDIA ACTUALMENTE (SI / NO)    </th>
		<th  colspan=2 align="center"   >   NIVEL QUE CURSA    </th>
		<th  colspan=3 align="center"    sdnum="8202;0;#.##0">   ESPECIALIDAD    </th>
		<th  colspan=5 align="center"   >   NOMBRE DE LA INSTITUCION DONDE ESTUDIA    </th>
		</tr>
	<tr>
		<td  colspan=3 align="center"   >  @if($funcionario-> estudia==1)SI @else NO @endif   </td>
		<td  colspan=2 align="center"   >  {{$funcionario->nivel_cursa}}    </td>
		<td  colspan=3 align="center"   >   {{$funcionario->especialidad}}     </td>
		<td  colspan=5 align="center"   >     {{$funcionario->institucion_estudia}}    </td>
		</tr>
	<tr>
		<th class="th_encabezado1" colspan=13 height="22" align="center"   >   CURSOS DE ADIESTRAMIENTO, SEMINARIOS, ENTRENAMIENTOS ESPECIALES    </th>
		</tr>
	<tr>
		<th  colspan=3 height="22" align="center"   >   NOMBRE DEL CURSO    </th>
		<th  colspan=3 align="center"   >   NOMBRE DE LA INSTITUCION    </th>
		<th  colspan=3 align="center"   >   DIRECCIÓN REFERENCIAL    </th>
		<th  colspan=2 align="center"   >   FECHA DE INICIO    </th>
		<th  colspan=2 align="center"   >   FECHA DE CULMINACION    </th>
		</tr>
		@foreach($cursos as $cursos)
	<tr>
		<td  colspan=3 align="center"   >  {{$cursos->nommbre_curso}}    </td>
		<td  colspan=3 align="center"   >  {{$cursos->institucion_curso}}       </td>
		<td  colspan=3 align="center"   >    {{$cursos->dir_ref_curso}}   </td>
		<td  colspan=2 align="center"    >  {{$cursos->fechainicio_curso}}     </td>
		<td  colspan=2 align="center"   >    {{$cursos->fechaculminacion_curso}}    </td>
		</tr>
   		@endforeach
	
	<tr>
		<th class="th_encabezado1" colspan=13 height="22" align="center"   >   IDIOMAS    </th>
		</tr>

	<tr>
		<th  colspan=3 align="center"   >   IDIOMA    </th>
		<th  colspan=2 align="center"   >   HABLA (REGULAR / BIEN / MUY BIEN)    </th>
		<th  colspan=3 align="center"   >   LEE  (REGULAR / BIEN / MUY BIEN)    </th>
		<th  colspan=5 align="center"   >    ESCRIBE (REGULAR / BIEN / MUY BIEN)    </th>
		</tr>
		@foreach($idiomas as $idiomas)
		<tr>
			<td  colspan=3 align="center"   >  {{$idiomas->nommbre_idioma}}      </td>
			<td  colspan=2 align="center"   >  @if ($idiomas->habla==1)  BIEN   @endif  @if ($idiomas->habla==2) MUY BIEN   @endif  @if ($idiomas->habla==3)  REGULAR   @endif</td>
			<td  colspan=3 align="center"   >    @if ($idiomas->lee==1)  BIEN   @endif  @if ($idiomas->lee==2) MUY BIEN   @endif  @if ($idiomas->lee==3)  REGULAR   @endif</td>
			<td  colspan=5 align="center"   >    @if ($idiomas->escribe==1)  BIEN   @endif  @if ($idiomas->escribe==2) MUY BIEN   @endif  @if ($idiomas->escribe==3)  REGULAR   @endif</td>

			
		</tr>
		@endforeach
	<tr>
		<th class="th_encabezado1"  colspan=13 height="22" align="center"   >   EMPLEOS ANTERIORES     </td>
		</tr>
	<tr>
		<th  colspan=3 align="center"   >   NOMBRE DE LA EMPRESA / INSTITUCIÓN    </td>
		<th  colspan=2 align="center"   >   DIRECCIÓN    </th>
		<th  align="center"   >   TELÉFONO    </th>
		<th   align="center"   >   PERSONA CONTACTO    </th>
        <th   align="center"   >   CARGO INICIAL    </th>
		<th   align="center"   >   CARGO FINAL    </th>
		<th  align="center"   >   FECHA DE INGRESO    </th>
		<th  align="center"   >   FECHA DE RETIRO    </th>
		<th  align="center"   >   MOTIVO DEL RETIRO    </th>
        <th  align="center"   >   TAREAS O ACTIVIDADES DESEMPEÑADAS    </th>
		</tr>
		@foreach($laboral as $laboral)
	<tr>
		<td  colspan=3  align="center"   >  {{$laboral->nombre_empresa}}   </td>
		<td  colspan=2 align="center"   >     {{$laboral->direccion_empresa}} </td>
		<td  align="center"   >   {{$laboral->telefono_empresa}}    </td>
		<td   align="center"   > {{$laboral->persona_contacto}}   </td>
		<td   align="center"   >  {{$laboral->cargo}}        </td>
		<td   align="center"   >    {{$laboral->cargo_final}}     </td>
		<td  align="right"   >    {{$laboral->fecha_ingreso}}     </td>
		<td  align="left"    >    {{$laboral->fecha_egreso}}    </td>
		<td   align="center"   >  {{$laboral->motivo_retiro}}     </td>
		<td align="center"   >   {{$laboral->tareas}}     </td>     
	</tr>
		@endforeach
	
	<tr>
		<th class="th_encabezado1"  colspan=13 height="22" align="center"   >   NORMATIVA PLANILLA DE ACTUALIZACIÓN DE DATOS EXPEDIENTE DEL PERSONAL    </th>
		</tr>
	<tr>
		<td  colspan=13 height="22" align="justify"   >   1.- LLENE LA PLANILLA CON TODOS LOS DATOS SOLICITADOS.    </td>
		</tr>
	<tr>
		<td  colspan=13 height="22" align="justify"   >   2.- NO DEBE PRESENTAR TACHADURAS NI ENMENDADURAS.    </td>
		</tr>
	<tr>
		<td  colspan=13 height="22" align="justify"   >   3.- DEBE ESTAR FIRMADA Y SELLADA POR EL (LA) TRABAJADOR (A)    </td>
		</tr>
	<tr>
		<td  colspan=13 height="22" align="justify"   >   4.- DEBE ANEXAR LOS SOPORTES SIGUIENTES:     </td>
		</tr>
	<tr>
		<td  height="22" align="center"   >   <br>    </td>
		<td  colspan=12 align="left"   >   COPIA AMPLIADA Y A COLOR DE LA CEDULA DE IDENTIDAD    </td>
		</tr>
	<tr>
		<td  height="22" align="center"   >   <br>    </td>
		<td  colspan=12 align="left"   >   COPIA DE LA PARTIDA DE NACIMIENTO DEL TRABAJADOR    </td>
		</tr>
	<tr>
		<td  height="22" align="center"   >   <br>    </td>
		<td  colspan=12 align="left"   >   COPIA DEL ACTA DE MATRIMONIO Y/O CONCUBINATO    </td>
		</tr>
	<tr>
		<td  height="27" align="center"   >   <br>    </td>
		<td  colspan=12 align="left"   >   COPIA DE LA PARTIDA DE NACIMIENTO DE SUS HIJOS    </td>
		</tr>
        <tr>
		<td  height="22" align="center"   >   <br>    </td>
		<td  colspan=12 align="left"   >   COPIA DEL ÜlTIMO TITULO OBTENIDO REGISTRADO (BACHILLER,TÉCNICO,UNIVERSITARIO)    </td>
		</tr>
	<tr>
		<td  height="22" align="center"   >   <br>    </td>
		<td  colspan=12 align="left"   >   EN CASO DE ESTAR CURSANDO ESTUDIOS ANEXE CONSTANCIA DE ESTUDIOS Y HORARIO DE CLASES    </td>
		</tr>
	<tr>
		<td  height="22" align="center"   >   <br>    </td>
		<td  colspan=12 align="left"   >   CERTIFICADOS DE CURSOS DE CAPACITACION Y ADIESTRAMIENTO.     </td>
		</tr>
	<tr>
		<td  height="22" align="center"   >   <br>    </td>
		<td  colspan=12 align="left"   >   CONSTANCIAS DE TRABAJOS ANTERIORES O ANTECEDENTES DE SERVICIOS ORIGINALES O COPIAS CERTIFICADAS    </td>
		</tr>
	
	<tr >
		<td   colspan=13  height="15" align="center"   >   <br>    </td>
		
	</tr>
	<tr >
		
		<th  colspan=13 align="center"   >   FIRMA DEL TRABAJADOR (A)    </th>
		
	</tr>
	<tr >
		<td   colspan=13  height="15" align="center"   >   <br>    </td>
		
	</tr>
	<tr>
		<th class="th_encabezado1"  colspan=13 height="22" align="center"   >   SOLO PARA USO DE LA COORDINACION DE RECURSOS HUMANOS    </th>
		</tr>
	<tr>
		<th  colspan=5 height="22" align="center"   >    FECHA DE RECIBIDO COORDINACION DE RECURSOS HUMANOS    </th>
		<th  colspan=3 align="center"   >   NOMBRES Y APELLIDOS    </th>
		<th  colspan=2 align="center"   >   CEDULA DE IDENTIDAD    </th>
		<th  colspan=3 align="center"   >   CARGO    </th>
		</tr>
	<tr>
		<td  colspan=5 height="22" align="center"   >   <br>    </td>
		<td  colspan=3 align="center"   >   <br>    </td>
		<td  colspan=2 align="center"   >   <br>    </td>
		<td  colspan=3 align="center"   >   <br>    </td>
		</tr>
	<tr>
		<th class="th_encabezado1"   colspan=13 height="22" align="center"   >   OBSERVACIONES    </th>
		</tr>
	<tr>
		<td  colspan=13 height="22" align="center"   >   <br>    </td>
		</tr>
        
        </tbody>
        @endforeach
    </table>

</body>
</html>