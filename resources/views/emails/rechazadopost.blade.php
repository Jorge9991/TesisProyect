<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Rechazado</h1>
    <h3>Hola, {{$postulation->estudiantes->name}} Se há rechazado tu postulación</h3>
    <h2>Detalle de la postulación</h2>
    <h3>Nombre del convenio:{{ $postulation->ofertas->convenios->entidad_receptora}}</h3>
    <a href="http://localhost/TesisProyect/public/">Link del sistema</a>
</body>
</html>