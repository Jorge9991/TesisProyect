@extends('layouts.app')

@section('content')
    <div class="card">
        @if (session('info'))
            <div class="alert alert-primary" role="alert">
                {{ session('info') }}
            </div>
        @endif
        <div class="alert alert-danger" role="alert">
            Solo tendra hasta las 11:59 de la noche de la fecha de la actividad creada para subir o modificar la información!
          </div>
        <div class="card-header">
            <h3 class="card-title">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Actividad</font>
                </font>
            </h3>
        </div>
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{ route('activity.create') }}" class="btn btn-primary float-right"><i
                        class="fa fa-plus-square"></i>&nbsp;Registrar Actividad</a>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                            aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Motor de renderizado: activar para ordenar la columna descendente">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Actividad</font>
                                        </font>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Navegador: activar para ordenar la columna de forma ascendente">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Fecha</font>
                                        </font>
                                    </th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Versión del motor: activar para ordenar la columna ascendente" style="">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Convenio</font>
                                        </font>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Versión del motor: activar para ordenar la columna ascendente" style="">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Estado</font>
                                        </font>
                                    </th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Versión del motor: activar para ordenar la columna ascendente" style="">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Editar/Subir Información</font>
                                        </font>
                                    </th>
                                
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Versión del motor: activar para ordenar la columna ascendente" style="">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Eliminar</font>
                                        </font>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                @forelse($actividades as $activity)
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">{{ $activity->descripcion }}
                                                </font>
                                            </font>
                                        </td>
                                        <td>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">{{ $activity->fecha }}
                                                </font>
                                            </font>
                                        </td>
                                        <td style="">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    {{ $activity->asignaciones->entidad_receptora }}</font>
                                            </font>
                                        </td>
                                        <td style="">
                                            @if ($activity->estado == 1)
                                                <span class="right badge badge-danger">
                                                    <font style="vertical-align: inherit;">Por subir Información</font>
                                                </span>
                                            @endif
                                            @if ($activity->estado == 2)
                                                <span class="right badge badge-success">
                                                    <font style="vertical-align: inherit;">Información Subida</font>
                                                </span>
                                            @endif
                                        </td>
                                        <?php date_default_timezone_set('America/Guayaquil'); ?>
                                        <?php
                                        $fecha1 = date_create(date('Y-m-d H:i:s'));
                                        $fecha2 = date_create($activity->fecha);
                                        $dias = date_diff($fecha1, $fecha2)->format('%R%a');
                                        $diass = date_diff($fecha1, $fecha2)->format('%R');
                                        ?>
                                        @if ($dias < 1 and $diass != '+')
                                        <td style="">
                                            <a class="btn btn-warning" style="color: #ffffff;"
                                                href="{{ route('activity.edit', $activity) }}">Editar/Subir Información</a>

                                        </td>
                                        @else
                                        
                                        <td style="">
                                            <button disabled class="btn btn-warning" style="color: #ffffff;"
                                                href="" >Editar/Subir Información</button>

                                        </td>
                                        @endif
                       
                                     
                                        <td style="">
                                            <form action="{{ route('activity.destroy', $activity) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger" type="submit">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
