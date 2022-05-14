<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DConstancia de Estudio - ENFMP</title>
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
    <h2>Constancia de Estudio</h2>
    <h2>Bienvenida</h2>
Hola a todos, como han deducido por el titulo esta es la primera pagina web que hago, espero que les guste. Fdo. Jorge
<h2>Proposito</h2>
En esta página iré practicando con los conocimientos que adquiera en el curso de HTML
<table>
    <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Name</th>
        <th>Email</th>
        <th>verificado</th>
        <th>Passowrd</th>
        <th>Creado</th>
    </tr>
    @foreach ($datos_estudiante as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->username}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->email_verified_at}}</td>
        <td>{{$item->password}}</td>
        <td>{{$item->created_at}}</td>
    </tr>
    @endforeach
</table>

</body>
</html>