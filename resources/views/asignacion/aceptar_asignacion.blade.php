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
                    <font style="vertical-align: inherit;">Asignaciones por convenio</font>
                </font>
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
                                            <font style="vertical-align: inherit;">ID</font>
                                        </font>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Navegador: activar para ordenar la columna de forma ascendente">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Entidad receptora</font>
                                        </font>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Navegador: activar para ordenar la columna de forma ascendente">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Estado</font>
                                        </font>
                                    </th>
                                   
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Versión del motor: activar para ordenar la columna ascendente" style="">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Aceptar/Rechazar</font>
                                        </font>
                                    </th>
                               
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($asignaciones as $asignacion)
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">{{ $asignacion->id_convenio }}
                                                </font>
                                            </font>
                                        </td>
                                        <td>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">{{ $asignacion->convenios->entidad_receptora }}
                                                </font>
                                            </font>
                                        </td>
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            <font style="vertical-align: inherit;">
                                                @if ($asignacion->estado == 1)
                                                <span class="right badge badge-warning"><font style="vertical-align: inherit;">Por Aceptar/Rechazar</font></span>
                                                @endif
                                                @if ($asignacion->estado == 2)
                                                <span class="right badge badge-success"><font style="vertical-align: inherit;">Aceptado</font></span>
                                                @endif
                                            </font>
                                        </td>
                                   
                                        <td style="">
                                            
                                            <a class="btn btn-success" style="color: #ffffff;"
                                                href="{{ route('asignacion.detalle', $asignacion->id_convenio ) }}">Observar
                                            </a>
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
