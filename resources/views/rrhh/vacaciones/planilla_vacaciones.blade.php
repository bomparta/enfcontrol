<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PLANILLA SOLICITUD DE VACACIONES</title>
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
        FUNDACIÓN ESCUELA NACIONAL DE FISCALES DEL MINISTERIO PÚBLICO    
    </td>
    <td class="td_encabezado" colspan="2"> <img  src="{{public_path('/img/logo2.png')}}"   style="width: 15mm; height: 15mm; " /></td>
</tr>
<tr class="tr_encabezado">  
    <td class="td_encabezado" colspan="13" style="font-size:150%;"> <b>PLANILLA SOLICITUD DE VACACIONES </b></td>        
</tr>
</table>
<p>
<table border="0" cellpadding="0" cellspacing="5" >
<tbody>


<tr>
		<th class="th_encabezado1"  colspan=12 height="22" align="center"   >   DATOS DEL TRABAJADOR    </th>
		<th class="th_encabezado1"> <div align="right"> <img src="{{storage_path('app/'.$foto[0]->ruta)}}" style="width: 15mm; height: 15mm; margin: 0;" /> 
		</div>
		</th>
	</tr>
        @foreach($datos_funcionario as $key=>$funcionario)
		<tr>
		
			<th colspan="13" align="center"   >    NACIONALIDAD - CEDULA DE IDENTIDAD </th>	
	
		</tr>
	<tr>
	
		<td   colspan="13" ><div align="center">  @if($funcionario->id_nacionalidad==1) V 
            @else E @endif - {{$funcionario->numero_identificacion}}  </div></td>
		
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
		<th  colspan=4 align="center"   >   TIPO DE TRABAJADOR    </th>
		<th  colspan=3 align="center"   >   CARGO    </th>
		<th  colspan=3 align="center"   >   UNIDAD DE ADSCRIPCIÓN    </th>
		<th  colspan=3 align="center"   >   AÑOS DE SERVICIO APN    </th>
	</tr>
	<tr>
		<td  colspan=4 align="center"   >   {{$funcionario->trabajador}}   </td>
		<td  colspan=3  align="center"   >   {{$funcionario->cargo}}   </td>
		<td  colspan=3  align="center"   >   {{$funcionario->adscripcion}}   </td>
		<th  colspan=3 align="center"   >    {{$funcionario->adscripcion}}     </th>
	</tr>
	<tr>
	<th class="th_encabezado1"  colspan=13 height="22" align="center"   >   VACACIONES SOLICITADAS    </th>
	</tr>
    <tr>
		<th  colspan=2  align="center"   >   MES NACIMIENTO DISFRUTE VACACIONAL  </th>
		<th  colspan=3  align="center"   >   FECHA DE SOLICITUD  </th>
		<th  colspan=2 align="center"   >   CANTIDAD DE DIAS A DISFRUTAR    </th>
        <th  colspan=3 align="center"   >   FECHA DE INICIO DE DISFRUTE    </th>
        <th  colspan=3 align="center"   >   FECHA DE REINTEGRO    </th>        
	</tr>
	<tr>
		<td  colspan=2    >   <div align="center">{{date('m',strtotime($funcionario->fecha_ingreso_vac))}}   </div></td>
		<td  colspan=3    >   <div align="center"> {{date('d-m-Y',strtotime($solicitud->fecha_solicitud))}} </div>  </td>
		<td  colspan=2    >   <div align="center"> {{$solicitud->dias_disfrute}}  </div> </td>
        <td  colspan=3    >   <div align="center">{{date('d-m-Y',strtotime($solicitud->fecha_inicio))}}  </div> </td>
        <td  colspan=3    >   <div align="center"> {{date('d-m-Y',strtotime($solicitud->fecha_reintegro))}}  </div> </td> 
	</tr>
</table>
<p>
<table  border="0" cellpadding="0" cellspacing="5"  aling="center">    
	<body>
	<tr>
		<th  colspan=2  align="center"   >   FECHA DE SOLICITUD  </th>
		<th  colspan=2  align="center"   >   LAPSO VACACIONAL    </th>
		<th  colspan=2 align="center"   >   DIAS A DISFRUTAR   </th>
		<th  colspan=3 align="center"   >   DIAS PENDIENTES POR DISFRUTAR     </th>
		<th  colspan=4 align="center"   >   OBSERVACIONES     </th>
	</tr>
	@foreach($disfrutadas as $disfrutadas)
	<tr align="center" >
		<td  colspan=2  align="center"   >  {{date('d-m-Y',strtotime($disfrutadas->fecha_solicitud))}}   </td>
		<td  colspan=2  align="center"   >  {{$disfrutadas->lapso_disfrute}}   </td>
		<td  colspan=2 align="center"   >    {{$disfrutadas->dias_disfrutados}}      </td>
		<td  colspan=3 align="center"  >  {{$disfrutadas->dias_pendientes}}   </td>
        <td  colspan=4 align="center"  >  {{$disfrutadas->observacion_director}} {{$disfrutadas->observacion_presidencia}}   </td>
	</tr>
	@endforeach
	
	
</body>
</table>
<p>
<table  border="0" cellpadding="0" cellspacing="5">
	<tbody>
	<tr >
		
		<th  colspan=4 align="center"  height="22" >   AUTORIZADO POR EL DIRECTOR(A)    </th>
        <th  colspan=4 align="center"   >   APROBACIÓN DEL (DE LA) PRESIDENTE(A)    </th>
        <th  colspan=5 align="center"   >   FIRMA DEL TRABAJADOR (A)    </th>
		
	</tr>
	<tr >
		<td    colspan=4 height="44"    >   <div align="center">{{$aprobado_director->name}}<br>{{$aprobado_director->created_at}} </div>     </td>
        <td    colspan=4    >  <div align="center">{{$aprobado_presidencia->name}}<br>{{$aprobado_director->updated_at}}  </div>     </td>
        <td   colspan=5    >  <div align="center">{{ucfirst(strtolower($funcionario->nombre))}} {{ucfirst(strtolower($funcionario->apellido))}}  </div>    </td>
		
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
		<td  colspan=5 height="44" align="center"   >   <br>    </td>
		<td  colspan=3 align="center"   >   <br>    </td>
		<td  colspan=2 align="center"   >   <br>    </td>
		<td  colspan=3 align="center"   >   <br>    </td>
		</tr>
	
        
        </tbody>
        @endforeach
    </table>

</body>
</html>