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
                    <font style="vertical-align: inherit;">Informes finales</font>
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
                                            <font style="vertical-align: inherit;">Estudiante</font>
                                        </font>
                                    </th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Versión del motor: activar para ordenar la columna ascendente" style="">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Link</font>
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
                                            <font style="vertical-align: inherit;">Opción</font>
                                        </font>
                                    </th>
                                
                                </tr>
                            </thead>
                            <tbody>
                             
                                @forelse($informefinales as $informefinal)
                                
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    {{ $informefinal->estudiantes->name }}
                                                </font>
                                            </font>
                                        </td>
                                
                                        <td style="">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;"><a href="{{ $informefinal->link }}" target="_blank">{{ $informefinal->link }}</a></font>
                                            </font>
                                        </td>
                                        <td style="">
                                            <font style="vertical-align: inherit;">
                                                @if ($informefinal->estado == 1)
                                                <span class="right badge badge-warning"><font style="vertical-align: inherit;">Por Revisar</font></span>
                                                @endif
                                                @if ($informefinal->estado == 2)
                                                <span class="right badge badge-success"><font style="vertical-align: inherit;">Aprobado</font></span>
                                                @endif
                                                @if ($informefinal->estado == 3)
                                                <span class="right badge badge-danger"><font style="vertical-align: inherit;">No Aprobado</font></span>
                                                @endif
                                            </font>
                                        </td>
                                  
                                        <td style="">
                                            <a class="btn btn-success" style="color: #ffffff;"
                                                href="{{ route('informe.opcion', $informefinal) }}">Aprobar/No aprobar</a>
                                        </td>
                                    </tr>


                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
