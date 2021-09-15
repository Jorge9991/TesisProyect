<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Credenciales</h1>
    <h3>Se han completado los cupos de una oferta, es necesario que apruebe y realize los procesos necesarios</h3>
    <h2>Detalle de la oferta</h2>
    <h3>Nombre del convenio:{{ $oferta->convenios->entidad_receptora}}</h3>
    <h3>Horas diarias:{{ $oferta->horas_diarias}}</h3>
    <h3>Cupos:{{ $oferta->cupos}}</h3>
    <a href="http://localhost/TesisProyect/public/">Link del sistema</a>
</body>
</html>