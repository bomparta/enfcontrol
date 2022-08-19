<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FICHA BIENES NACIONALES</title>
<style>
    body {
  font-family: Arial, Helvetica, sans-serif;
  font-size: 50%;

}
    table{
       
        border-collapse: collapse;
        width: 100%;
        break-after: page;
        
    }
    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    tr.encabezado){
        
        background-color: #dddddd;
    }
</style>
</head>
<body>
    <h2>PLANILLA ASIGNACIÖN DE BIENES NACIONALES</h2>
    <table id="example" class="table table-striped table-bordered" style="width:100%"> 
 @foreach ($bienes as $item)
    <tr>
        <th>Fecha de Asignación</th><th>Funcionario Asignado</th>
    </tr>
    <tr>
        <td>{{$item->fecha_registro}}</td><td>{{$item->responsable_asignado}}</td>
    </tr>
    <tr><th colspan="8">DATOS DEL BIEN</th></tr>
    <tr> <th>N° BIEN</th><th>DESCRIPCION</th> <th>MARCA</th><th>MODELO</th><th>SERIAL</th><th>COLOR</th><th>OBSERVACIONES</th></tr>
  
    <tr>
        <td>{{$item->num_bien}}</td>
        <td>{{$item->tipo_bien_id}}</td>
        <td>{{$item->marca_id}}</td>
        <td>{{$item->modelo}}</td>
        <td>{{$item->serial}}</td>
        <td>{{$item->color}}</td>
        <td>{{$item->observaciones}}</td>
        
    </tr>
    @endforeach
</table>

</body>
</html>