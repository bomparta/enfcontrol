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
    <td class="td_encabezado" colspan="9">REPUBLICA BOLIVARIANA DE VENEZUELA <br>
        FUNDACIÓN ESCUELA NACIONAL DE FISCALES DEL MINISTERIO PÚBLICO <br>
        PLANILLA ACTUALIZACIÓN DE DATOS EXPEDIENTES DE PERSONAL 
        <br><br>
        AÑO {{ date('Y') }}   
    </td>
    <td class="td_encabezado" colspan="2"> <img  src="{{public_path('/img/logo2.png')}}"   style="width: 15mm; height: 15mm; " /></td>
</tr>
   <tr class="tr_encabezado"><td  height="22" colspan="13" ><br></td></tr>
        <tbody>
        @foreach($datos_funcionario as $key=>$funcionario)
	<tr>
		<th colspan="6" align="center"   >  FECHA DE ELABORACIÓN</th>
		<th colspan="7" align="center"   >    NACIONALIDAD - CEDULA DE IDENTIDAD </th>
		
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
		
		<td  align="center"  colspan=5  >   07/07/1979   DTTO. CAPITAL  CARACAS   </td>
		
		<td  align="center"   >    42    </td>
	</tr>
	
	<tr>
		<th  colspan=6  align="center"   >   TIPO DE TRABAJADOR    </th>
		<th  colspan=3 align="center"   >   CARGO    </th>
		<th  colspan=4 align="center"   >   UNIDAD DE ADSCRIPCIÓN    </th>
	</tr>
	<tr>
		<td  colspan=6 align="center"   >   EMPLEADO FIJO    </td>
		<td  colspan=3 rowspan=2 align="center"   >   ASESOR    </td>
		<td  colspan=4 rowspan=2 align="center"   >   COORDINACION DE TECNOLOGIA    </td>
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
		<td  colspan=4 rowspan=2  align="center"   >   URB. LA ESTRELLA    </td>
		<td   colspan=3 rowspan=2 align="center"   >   PRINCIPAL    </td>
		<td   align="left"   >   CASA Nº    </td>
		<td  align="left"   >   APARTAMENTO N°      </td>
		<td      align="left"   >    PISO N°    </td>
		<td  colspan=3 align="center"   >   NOMBRE DE LA CASA O EDIFICIO    </td>
	</tr>
	<tr>
		<td  align="left"   >   <br>    </td>
		<td  align="right"  >   51    </td>
		<td  align="right"  >   5    </td>
		<td  colspan=3 align="center"   >   NEPTUNO 4A    </td>
	</tr>
	<tr>
		<th  colspan=4  align="center"   >   PARROQUIA    </th>
		<th  colspan=4 align="center"   >   MUNICIPIO    </th>
		<th       colspan=3 align="center"   >   ESTADO    </th>
		<th       colspan=2 align="center"   >   CODIGO POSTAL    </th>
	</tr>
	<tr>
		<td  colspan=4  align="center"   >   CHARALLAVE    </td>
		<td  colspan=4  align="center"   >   CRISTOBAL ROJAS    </td>
		<td  colspan=3  align="center"   >   MIRANDA    </td>
		<td  colspan=2 align="center"   >   1210    </td>
	</tr>	
	<tr>
		<th  colspan=5  align="center"   >   CONDICIÓN DE LA VIVIENDA    </th>
		<th  colspan=3 align="center"   >   Nº TELEFONO DE HABITACION    </th>
		<th  colspan=2 align="center"   >   Nº TELEFONO MOVIL (CELULAR)    </th>
		<th  colspan=3 align="center"   >   DIRECCION DE CORREO ELECTRÓNICO    </th>
	</tr>
	<tr>
		<td  colspan=5  align="center"   >   PROPIA    </td>		
		<td  colspan=3 align="center"   >    0239-2489201     </td>
		<td  colspan=2 align="center"    >   4166299133    </td>
		<td  colspan=3 align="center"   >YOMAC138.ENF@GMAIL.COM </td>
	</tr>
	
	<tr>
		<th  colspan=6 align="center"   >   OTRA DIRECCION DONDE SE LE PUEDA LOCALIZAR    </th>
		<th  colspan=3 align="center"   >   OTRO Nº TELEFONICO DONDE SE PUEDA LOCALIZAR    </th>
		<th  colspan=4 align="center"   >   PERSONA CONTACTO    </th>
	</tr>
	<tr>
		<td  colspan=6 align="center"   >   <br>    </td>
		<td  colspan=3 align="center"   >   4141065143    </td>
		<td  colspan=4 align="center"   >   RAGUI ULLOA    </td>
		</tr>
	
	<tr>
		<th  colspan=3 rowspan=2 align="center"   >   GRUPO SANGUINEO    </th>
		<th  colspan=5 align="center"   >   TALLAS    </th>
		<th  colspan=5 align="center"   >   PRESENTA ALGUN TIPO DE ALERGIA, ENFERMEDAD CRONICA O PADECIMIENTO ESPECIFIQUE:    </th>
	</tr>
	<tr>
		<th  align="center">   ESTATURA    </th>
		<td  align="center">   PESO    </th>
		<td  align="center">   PANTALON    </th>
		<td  align="center">   CAMISA    </th>
		<td  align="center">   CALZADO    </th>
		<td  colspan=5 rowspan=2 align="center"   >   ALERGIA A: CITRICOS EXCESO MARISCOS POLVO ENFERMEDAD CRONICA: HIPERTENSION Y ASMA    </td>
		</tr>
	<tr>
		<td  colspan=3 height="22" align="center"   >   O+    </td>
		<td  align="center"   >  1.70   </td>
		<td  align="center"  >  64   </td>
		<td  align="center"  >   14-16    </td>
		<td  align="center"  >   M-L    </td>
		<td  align="center"  >   40-41   </td>
		</tr>
	<tr>
		<th  colspan=13  align="center"   >   SI ESTA BAJO ALGUN TRATAMIENTO MEDICO ESPECIFIQUE (ANEXE INFORME MEDICO):    </th>
		</tr>
	<tr>
		<td  colspan=13 height="22" align="center"   >   HIPERTENSION :LOSARTAN POTASICO 100MG    </td>
		</tr>
	<tr>
		<th class="th_encabezado1" colspan=13 height="22" align="center"   >   CUENTAS BANCARIAS    </th>
		</tr>
	<tr>
		<th  colspan=5  align="center"   >   CUENTA BANCARIA Nº    </th>
		<th  colspan=3 align="center"   >   TIPO DE CUENTA    </th>
		<th  colspan=5 align="center"   >   BANCO    </th>
		</tr>
	<tr>
		<td  colspan=5  align="center"    sdnum="8202;0;@">   0102-0501-83-0000491842    </td>
		<td  colspan=3 align="center"   >   CORRIENTE    </td>
		<td  colspan=5 align="center"    sdnum="8202;0;DD-MM-AA">   VENEZUELA    </td>
		</tr>
	
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
	<tr>
		<td   align="center"    sdval="4" sdnum="8202;">   4    </td>
		<td  colspan=2 align="center"   >   NESTOR COLMENARES    </td>
		<td  align="right"    sdval="3146754" sdnum="8202;">   3146754    </td>
		<td  colspan=2 align="center"    sdnum="8202;0;#.##0">   PADRE    </td>
		<td  align="center"    sdnum="8202;0;DD-MM-AA">   75-    </td>
		<td  align="center"    sdval="16583" sdnum="8202;0;DD/MM/AAAA">   26/05/1945    </td>
		<td  colspan=2 align="center"   >   JUBILADO    </td>
		<td  colspan=2 align="center"    sdval="4162099929" sdnum="8202;">   4162099929    </td>
		<td  align="center"   >   NO    </td>
	</tr>
	
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
	<tr>
		<td  colspan=3  align="center"   >   SEXTO GRADO    </td>
		<td  colspan=3 align="center"   >   E.B DR CARLOS AROCHA LUNA    </td>
		<td  colspan=3 align="center"   >   URB. ESTRELLA 2DA ETAPA, CHARALLAVE    </td>
		<td  colspan=2 align="center"    sdval="87" sdnum="8202;">   87    </td>
		<td  colspan=2 align="center"    sdval="92" sdnum="8202;">   92    </td>
		</tr>
	<tr>
		<th  colspan=3  align="center"   >   SECUNDARIA (ULTIMO AÑO CURSADO)    </th>
		<th  colspan=3 align="center"   >   NOMBRE DE LA INSTITUCION    </th>
		<th  colspan=3 align="center"   >   DIRECCIÓN REFERENCIAL    </th>
		<th  colspan=2 align="center"   >   FECHA DE INICIO    </th>
		<th  colspan=2 align="center"   >   FECHA DE CULMINACION    </th>
		</tr>
	<tr>
		<td  colspan=3  align="center"   >   QUINTO AÑO    </td>
		<td  colspan=3 align="center"   >   U.E.N.CREACION CHARALLAVE    </td>
		<td  colspan=3 align="center"   >   URB. ESTRELLA 1ERA ETAPA, CHARALLAVE    </td>
		<td  colspan=2 align="center"    sdval="92" sdnum="8202;">   92    </td>
		<td  colspan=2 align="center"    sdval="96" sdnum="8202;">   96    </td>
		</tr>
	<tr>
		<th  colspan=3 align="center"   >   TECNICA SUPERIOR (ULTIMO AÑO  O SEMESTRE CURSADO)    </th>
		<th  colspan=3 align="center"   >   NOMBRE DE LA INSTITUCION    </th>
		<th  colspan=3 align="center"   >   DIRECCIÓN REFERENCIAL    </th>
		<th  colspan=2 align="center"   >   FECHA DE INICIO    </th>
		<th  colspan=2 align="center"   >   FECHA DE CULMINACION    </th>
		</tr>
	<tr>
		<td  colspan=3 align="center"   >   SEXTO SEMESTRE    </td>
		<td  colspan=3 align="center"   >   IUTV    </td>
		<td  colspan=3 align="center"   >   AV UNIVERSIDAD FRENTE BANCO CARONI CARACAS    </td>
		<td  colspan=2 align="center"    sdval="96" sdnum="8202;">   96    </td>
		<td  colspan=2 align="center"    sdval="99" sdnum="8202;">   99    </td>
		</tr>
	<tr>
		<th  colspan=3 height="22" align="center"   >   UNIVERSITARIA (ULTIMO AÑO  O SEMESTRE CURSADO)    </th>
		<th  colspan=3 align="center"   >   NOMBRE DE LA INSTITUCION    </th>
		<th  colspan=3 align="center"   >   DIRECCIÓN REFERENCIAL    </th>
		<th  colspan=2 align="center"   >   FECHA DE INICIO    </th>
		<th  colspan=2 align="center"   >   FECHA DE CULMINACION    </th>
		</tr>
	<tr>
		<td  colspan=3 align="center"   >   <br>    </td>
		<td  colspan=3 align="center"   >   <br>    </td>
		<td  colspan=3 align="center"   >   <br>    </td>
		<td  colspan=2 align="center"   >        </td>
		<td  colspan=2 align="center"   >   <br>    </td>
		</tr>
	<tr>
		<th  colspan=13  align="center"   >   PROFESIÓN U OCUPACIÓN    </th>
		</tr>
	<tr>
		<td  colspan=13 height="22" align="center"   >   DESARROLLADOR DE SOFTWARE, MANEJADOR DE BASE DE DATOS, PROGRAMACION ORIENTADA OBJETO Y DISEÑOS DE PAGINAS MVC    </td>
		</tr>
	<tr>
		<th  colspan=13  align="center" height="22"  >   EN CASO DE  HABER CULMINADO OTROS ESTUDIOS A NIVEL TECNICO SUPERIOR O UNIVERSITARIO INDIQUE TITULOS OBTENIDOS :    </th>
		</tr>
	<tr>
		<td  colspan=13 height="22" align="center"   >   <br>    </td>
		</tr>
	
	<tr>
		<th  colspan=3 align="center"   >   ESTUDIA ACTUALMENTE (SI / NO)    </th>
		<th  colspan=2 align="center"   >   NIVEL QUE CURSA    </th>
		<th  colspan=3 align="center"    sdnum="8202;0;#.##0">   ESPECIALIDAD    </th>
		<th  colspan=5 align="center"   >   NOMBRE DE LA INSTITUCION DONDE ESTUDIA    </th>
		</tr>
	<tr>
		<td  colspan=3 align="center"   >   NO    </td>
		<td  colspan=2 align="center"   >   <br>    </td>
		<td  colspan=3 align="center"   >   <br>    </td>
		<td  colspan=5 align="center"   >        </td>
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
	<tr>
		<td  colspan=3 align="center"   >   <br>    </td>
		<td  colspan=3 align="center"   >   <br>    </td>
		<td  colspan=3 align="center"   >   <br>    </td>
		<td  colspan=2 align="center"    sdnum="8202;0;DD/MM/AAAA">   <br>    </td>
		<td  colspan=2 align="center"   >   <br>    </td>
		</tr>
	
	
	<tr>
		<th class="th_encabezado1" colspan=13 height="22" align="center"   >   IDIOMAS    </th>
		</tr>
	<tr>
		<th  colspan=3 align="center"   >   IDIOMA    </th>
		<th  colspan=2 align="center"   >   HABLA (REGULAR / BIEN / MUY BIEN)    </th>
		<th  colspan=3 align="center"   >   LEE  (REGULAR / BIEN / MUY BIEN)    </th>
		<th  colspan=5 align="center"   >    ESCRIBE (REGULAR / BIEN / MUY BIEN)    </th>
		</tr>
	<tr>
		<td  colspan=3 align="center"   >   <br>    </td>
		<td  colspan=2 align="center"   >   <br>    </td>
		<td  colspan=3 align="center"   >   <br>    </td>
		<td  colspan=5 align="center"   >   <br>    </td>
		</tr>
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
	<tr>
		<td  colspan=3  align="center"   >   MINISTERIO DEL TRABAJO    </td>
		<td  colspan=2 align="center"   >   PLAZA CARACAS. TORRE SUR PISO 5 OTIC    </td>
		<td  align="center"   >   0212-4014401    </td>
		<td   align="center"   >   FRANCYS OTERO    </td>
		<td   align="center"   >   PROGRAMADOR II    </td>
		<td   align="center"   >   COORDINADOR DE AREA    </td>
		<td  align="right"   >   22/11/1999    </td>
		<td  align="left"    >   EN ACTIVIDAD    </td>
		<td   align="center"   >   -    </td>
		<td align="center"   ">   #¡VALOR!    </td>
     
</tr>
	
	<tr>
		<th class="th_encabezado1"  colspan=13 height="27" align="center"   >   NORMATIVA PLANILLA DE ACTUALIZACIÓN DE DATOS EXPEDIENTE DEL PERSONAL    </th>
		</tr>
	<tr>
		<td  colspan=13 height="27" align="justify"   >   1.- LLENE LA PLANILLA CON TODOS LOS DATOS SOLICITADOS.    </td>
		</tr>
	<tr>
		<td  colspan=13 height="27" align="justify"   >   2.- NO DEBE PRESENTAR TACHADURAS NI ENMENDADURAS.    </td>
		</tr>
	<tr>
		<td  colspan=13 height="27" align="justify"   >   3.- DEBE ESTAR FIRMADA Y SELLADA POR EL (LA) TRABAJADOR (A)    </td>
		</tr>
	<tr>
		<td  colspan=13 height="27" align="justify"   >   4.- DEBE ANEXAR LOS SOPORTES SIGUIENTES:     </td>
		</tr>
	<tr>
		<td  height="27" align="center"   >   <br>    </td>
		<td  colspan=12 align="left"   >   COPIA AMPLIADA Y A COLOR DE LA CEDULA DE IDENTIDAD    </td>
		</tr>
	<tr>
		<td  height="27" align="center"   >   <br>    </td>
		<td  colspan=12 align="left"   >   COPIA DE LA PARTIDA DE NACIMIENTO DEL TRABAJADOR    </td>
		</tr>
	<tr>
		<td  height="27" align="center"   >   <br>    </td>
		<td  colspan=12 align="left"   >   COPIA DEL ACTA DE MATRIMONIO Y/O CONCUBINATO    </td>
		</tr>
	<tr>
		<td  height="27" align="center"   >   <br>    </td>
		<td  colspan=12 align="left"   >   COPIA DE LA PARTIDA DE NACIMIENTO DE SUS HIJOS    </td>
		</tr>
        <tr>
		<td  height="27" align="center"   >   <br>    </td>
		<td  colspan=12 align="left"   >   COPIA DEL ÜlTIMO TITULO OBTENIDO REGISTRADO (BACHILLER,TÉCNICO,UNIVERSITARIO)    </td>
		</tr>
	<tr>
		<td  height="27" align="center"   >   <br>    </td>
		<td  colspan=12 align="left"   >   EN CASO DE ESTAR CURSANDO ESTUDIOS ANEXE CONSTANCIA DE ESTUDIOS Y HORARIO DE CLASES    </td>
		</tr>
	<tr>
		<td  height="27" align="center"   >   <br>    </td>
		<td  colspan=12 align="left"   >   CERTIFICADOS DE CURSOS DE CAPACITACION Y ADIESTRAMIENTO.     </td>
		</tr>
	<tr>
		<td  height="27" align="center"   >   <br>    </td>
		<td  colspan=12 align="left"   >   CONSTANCIAS DE TRABAJOS ANTERIORES O ANTECEDENTES DE SERVICIOS ORIGINALES O COPIAS CERTIFICADAS    </td>
		</tr>
	
	<tr >
		<td   colspan=13  height="27" align="center"   >   <br>    </td>
		
	</tr>
	<tr >
		
		<th  colspan=13 align="center"   >   FIRMA DEL TRABAJADOR (A)    </th>
		
	</tr>
	<tr >
		<td   colspan=13  height="27" align="center"   >   <br>    </td>
		
	</tr>
	<tr>
		<th class="th_encabezado1"  colspan=13 height="27" align="center"   >   SOLO PARA USO DE LA COORDINACION DE RECURSOS HUMANOS    </th>
		</tr>
	<tr>
		<th  colspan=5 height="27" align="center"   >    FECHA DE RECIBIDO COORDINACION DE RECURSOS HUMANOS    </th>
		<th  colspan=3 align="center"   >   NOMBRES Y APELLIDOS    </th>
		<th  colspan=2 align="center"   >   CEDULA DE IDENTIDAD    </th>
		<th  colspan=3 align="center"   >   CARGO    </th>
		</tr>
	<tr>
		<td  colspan=5 height="27" align="center"   >   <br>    </td>
		<td  colspan=3 align="center"   >   <br>    </td>
		<td  colspan=2 align="center"   >   <br>    </td>
		<td  colspan=3 align="center"   >   <br>    </td>
		</tr>
	<tr>
		<th class="th_encabezado1"   colspan=13 height="27" align="center"   >   OBSERVACIONES    </th>
		</tr>
	<tr>
		<td  colspan=13 height="27" align="center"   >   <br>    </td>
		</tr>
        
        </tbody>
        @endforeach
    </table>

</body>
</html>