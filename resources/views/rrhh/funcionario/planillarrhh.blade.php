<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Planilla de Actualización RRHH</title>
<style>
    table{
        font-family: arial, sans-serif;
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
    <h2>PLANILLA ACTUALIZACIÓN DE DATOS EXPEDIENTES DE PERSONAL</h2>
 <table>
 @foreach ($datos_funcionario as $item)
    <tr>
        <th>Fecha de Elaboración</th><th>Cedula de Identidad</th>
    </tr>
    <tr>
        <td>2022</td><td>{{$item->numero_identificacion}}</td>
    </tr>
    <tr><th colspan="8">DATOS DEL TRABAJADOR</th></tr>
    <tr> <th>PRIMER NOMBRE</th><th>SEGUNDO NOMBRE</th> <th>PRIMER APELLIDO</th><th>SEGUNDO APELLIDO</th></tr>
  
    <tr>
        <td>{{$item->nombre}}</td>
        <td>{{$item->nombreseg}}</td>
        <td>{{$item->apellido}}</td>
        <td>{{$item->apellidoseg}}</td>
        
    </tr>
    @endforeach
</table>

</body>
</html>