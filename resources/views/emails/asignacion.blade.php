<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Credenciales, {{$docente->name}}</h1>
    <h2>Usuario: {{$docente->email}} </h2>
    <h2>Contraseña: 12345678 </h2>
    {{-- <h2>Contraseña: {{$docente->cedula}}</h2> --}}
    <a href="http://localhost/TesisProyect/public/">Link del sistema</a>

    <h2>Detalle del convenio</h2>
    <h3>Nombre del convenio:{{ $postulation->ofertas->convenios->entidad_receptora}}</h3>
    <h2>Estudiantes</h2>
    @foreach ($postulaciones as $postulacion)
        <i>{{ $postulacion->estudiantes->name}}</i> <br>
    @endforeach
</body>
</html>