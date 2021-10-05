@extends('layouts.app')

@section('content')
    <div class="card">
        @if (session('info'))
            <div class="alert alert-primary" role="alert">
                {{ session('info') }}
            </div>
        @endif
        <div class="card-header">
            <h3 class="card-title">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Estudiante {{ $user->name }}</font>
                </font>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="" src=" {{ asset('img/card.png') }}">
                            </div>

                            <h3 class="profile-username text-center">
                                <font style="vertical-align: inherit;">{{ $user->name }}</font>
                            </h3>
                            <p class="text-muted text-center">
                                <font style="vertical-align: inherit;">Cedula: {{ $user->cedula }}</font>
                            </p>
                            <p class="text-muted text-center">
                                <font style="vertical-align: inherit;">Carrera: Desarrollo de software</font>
                            </p>
                            <p class="text-muted text-center">
                                <font style="vertical-align: inherit;">Correo: {{ $user->email }}</font>
                            </p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>
                                        <font style="vertical-align: inherit;">Horas Cumplidas</font>
                                    </b> <a class="float-right">
                                        <font style="vertical-align: inherit;">{{ $total }}</font>
                                    </a>
                                </li>

                            </ul>
@if ($link)
<a href="{{ $link->link }}" target="_blank" class="btn btn-primary btn-block"><b>
    <font style="vertical-align: inherit;">Carpeta</font>
</b></a>
@else
<a href="#" target="_blank" class="btn btn-primary btn-block"><b>
    <font style="vertical-align: inherit;">Carpeta</font>
</b></a>
@endif
                            
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <div class="col-md-9">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <font style="vertical-align: inherit;">Detalle</font>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"> Estado del estudiante:</font>
                                </font>
                            </strong>
                            @if ($link)
                            @if ($link->estado == 1)
                            <span class="right badge badge-success"><font style="vertical-align: inherit;">Por Revisar</font></span>
                            @endif
                            @if ($link->estado == 2)
                            <span class="right badge badge-success"><font style="vertical-align: inherit;">Aprobado por tutor</font></span>
                            @endif
                            @if ($link->estado == 3)
                            <span class="right badge badge-success"><font style="vertical-align: inherit;">En correción</font></span>
                            @endif
                            @if ($link->estado == 4)
                            <span class="right badge badge-success"><font style="vertical-align: inherit;">Correción por revición</font></span>
                            @endif
                            @if ($link->estado == 5)
                            <span class="right badge badge-success"><font style="vertical-align: inherit;">Aprobado por tutor y Gestor</font></span>
                            @endif
                            @endif
                           
                            <hr>
                            <strong><i class="fas fa-user mr-1"></i>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"> Tutor Academico:</font>
                                </font>
                            </strong>
                            @if ($tutor)
                                {{ $tutor->docentes->name }}
                            @endif

                            <hr>
                            <strong><i class="fas fa-building mr-1"></i>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"> Nombre del convenio:</font>
                                </font>
                            </strong>
                            @if ($tutor)
                                {{ $tutor->convenios->entidad_receptora }}
                            @endif
                            <hr>
                            <strong><i class="fas fa-check-square mr-1"></i>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"> Visitas por parte del tutor:</font>
                                </font>
                            </strong>
                            <br>
                            @if ($visitas)
                            @foreach ($visitas as $visita)
                            <hr>
                            Nombre de la visita: {{ $visita->descripcion }}
                            <br>
                            Fecha de la visita: {{ $visita->fecha }}
                            <br>
                            Descripción: {{ $visita->descripcion_visita }}
                        @endforeach 
                            @endif
                            
                            <hr>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
