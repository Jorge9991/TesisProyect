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
                    <font style="vertical-align: inherit;">Postulaciones</font>
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
                                            <font style="vertical-align: inherit;">Convenio</font>
                                        </font>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Navegador: activar para ordenar la columna de forma ascendente">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Nombre y Apellido </font>
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
                                            <font style="vertical-align: inherit;">Aprobar</font>
                                        </font>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Versión del motor: activar para ordenar la columna ascendente" style="">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Rechazar</font>
                                        </font>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($postulaciones as $postulation)
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">{{ $postulation->ofertas->convenios->entidad_receptora}}
                                                </font>
                                            </font>
                                        </td>
                                        <td>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">{{ $postulation->estudiantes->name}}
                                                </font>
                                            </font>
                                        </td>
                                        <td style="">
                                            <font style="vertical-align: inherit;">
                                                @if ($postulation->estado == 1)
                                                <span class="right badge badge-warning"><font style="vertical-align: inherit;">Por Aprobar</font></span>
                                                @endif
                                                @if ($postulation->estado == 2)
                                                <span class="right badge badge-success"><font style="vertical-align: inherit;">Aprobado</font></span>
                                                @endif 
                                                {{-- @if ($postulation->estado == 3)
                                                <span class="right badge badge-danger"><font style="vertical-align: inherit;">Rechazado</font></span>
                                                @endif --}}
                                            </font>
                                        </td>
                                        @if ($postulation->estado == 1)
                                        <td style="">
                                            <a class="btn btn-success" style="color: #ffffff;"
                                                href="{{ route('egresado.postulation.aprobar', $postulation) }}">Aprobar</a>
                                        </td>
                                        @endif
                                        @if ($postulation->estado == 2)
                                        <td style="">
                                            <a class="btn btn-success" style="color: #ffffff;"
                                                href="{{ route('egresado.postulation.aprobar', $postulation) }}">Editar</a>
                                        </td>
                                        @endif
                                        <td style="">
                                            <a class="btn btn-danger" style="color: #ffffff;"
                                                href="{{ route('egresado.postulation.rechazar', $postulation) }}" onclick="
                                                return confirm('Está seguro de Rechazar esta postulación?, Se eliminara la postulación para que el cupo quede disponible')">Rechazar</a>
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
