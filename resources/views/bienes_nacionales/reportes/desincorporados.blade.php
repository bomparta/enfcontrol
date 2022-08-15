<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BIENES NACIONALES DESINCORPORADOS</title>
<style>
    body {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 50%;

}
    table{
       
        border-collapse: collapse;
        width: 100%;
       
        
    }
    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    tr:nth-child(even){
        
        background-color: #dddddd;
    }
</style>
</head>
<body>
    <h2>BIENES NACIONALES DESINCORPORADOS</h2>
    <h2>Fecha de Emisión: {{ date('d-m-Y H:i:s') }}</h2>
 <table>

 <thead>
                                <tr>
                                    <th>N° Bien</th>
                                    <th>Descripción</th>
                                    <th>Ubicación Administrativa</th>
                                    <th>Responsable</th>
                                    <th>Tipo de Movimiento</th>
                                </tr>
                            </thead>  
                            {{$total=0}}
                            @foreach($bienes as $bienes)
                            <tbody>                              
                                <tr>                                                    
                                        <td>{{$bienes->num_bien}}</td>
                                        <td>{{$bienes->tipo_bien_id}}</td>
                                        <td>{{$bienes->ubic_adm_id}}</td>
                                        <td>{{$bienes->responsable_asignado}}</td>
                                        <td>@if($bienes->tipo_movimiento_id==1) INCORPORACIÖN 
                                            @elseif($bienes->tipo_movimiento_id==2) ASIGNACIÓN 
                                            @elseif($bienes->tipo_movimiento_id==3) TRASLADO 
                                            @elseif($bienes->tipo_movimiento_id==4) ENAJENACIÓN
                                            @elseif($bienes->tipo_movimiento_id==5) PRÉSTAMO 
                                            @elseif($bienes->tipo_movimiento_id==6) DESINCORPORACIÖN @endif
                                        </td>

                                                                                      
                                    </tr>
                                    {{$total=$total+1}}
                              @endforeach
</table>
<h2 aling="rigth">TOTAL DE BIENES NACIONALES DESINCORPORADOS ------> &nbsp; &nbsp;  {{$total}}</h2>
</body>
</html>