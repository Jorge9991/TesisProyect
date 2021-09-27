<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Rechazo de la Asignación</h1>
    <h2>Nombre del docente/Tutor: {{$docente}}</h2>
    <h2>Nombre del convenio: {{ $asignation->entidad_receptora}}</h2>
    <h1>Motivo del Rechazo</h1>
    <p>{{$observacion}}</p>
    <a href="http://localhost/TesisProyect/public/">Link del sistema</a>
</body>
</html>