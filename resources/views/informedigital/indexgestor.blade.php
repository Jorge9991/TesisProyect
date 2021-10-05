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
                    <font style="vertical-align: inherit;">Informes Digitales</font>
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
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Motor de renderizado: activar para ordenar la columna descendente">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Cedula</font>
                                        </font>
                                    </th>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Motor de renderizado: activar para ordenar la columna descendente">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Correo</font>
                                        </font>
                                    </th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Versión del motor: activar para ordenar la columna ascendente" style="">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Link</font>
                                        </font>
                                    </th>
                                
                                </tr>
                            </thead>
                            <tbody>
                             
                                @forelse($informes as $informefinal)
                                
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    {{ $informefinal->estudiantes->name }}
                                                </font>
                                            </font>
                                        </td>
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    {{ $informefinal->estudiantes->cedula }}
                                                </font>
                                            </font>
                                        </td>
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    {{ $informefinal->estudiantes->email }}
                                                </font>
                                            </font>
                                        </td>
                                
                                        <td style="">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;"><a href="{{ $informefinal->link }}" target="_blank">{{ $informefinal->link }}</a></font>
                                            </font>
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
