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
                    <font style="vertical-align: inherit;">Recursos</font>
                </font>
            </h3>
        </div>
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{ route('tutor.recurso.create') }}" class="btn btn-primary float-right"><i
                        class="fa fa-plus-square"></i>&nbsp;Registrar un nuevo formato</a>
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
                                            <font style="vertical-align: inherit;">Link</font>
                                        </font>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                    aria-label="Versión del motor: activar para ordenar la columna ascendente" style="">
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Categoria</font>
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
                                @forelse($recursos as $recurso)
                                    <tr class="odd">
                                      <td style="">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;"> <a href="{{asset($recurso->url)}}">{{ $recurso->nombre }}</a> </font>
                                            </font>
                                        </td>
                                        <td style="">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;"> 
                                                    @if ($recurso->proceso == 2)
                                                    Recurso Para Administración   
                                                    @else
                                                    Recurso General
                                                    @endif
                                                   
                                                </font>
                                            </font>
                                        </td>

                                        <td style="">
                                            <form action="{{ route('tutor.recurso.destroy', $recurso) }}" method="POST">
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
