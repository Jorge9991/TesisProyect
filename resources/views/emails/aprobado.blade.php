<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Aprobado la documentación por el gestor</h1>
    <h2>Lugar de entrega de documentación fisica: {{$request['lugar']}}</h2>
    <h2>Fecha de entrega de documentación fisica: {{$request['fecha']}}</h2>
    <h2>Hora de entrega de documentación fisica: {{$request['hora']}}</h2>
    <h2>Otras Observaciones: {{ $request['observacion']}}</h2>
    <h3>Dirigase al sistema en recursos para descargar su certificado</h3>
    <a href="http://localhost/TesisProyect/public/">Link del sistema</a>
</body>
</html>