<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Datos de la actividad</h1>
    <h2>Nombre del docente/Tutor: {{$user->name}}</h2>
    <h2>Nombre de la actividad: {{ $actividad->descripcion}}</h2>
    <h2>Fecha de la visita: {{ $actividad->fecha}}</h2>
    <a href="http://localhost/TesisProyect/public/">Link del sistema</a>
</body>
</html>