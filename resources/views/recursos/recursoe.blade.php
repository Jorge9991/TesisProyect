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
        @if ($informefinal)
        @if ($informefinal->estado == 5)

        <div class="card-header">
            <form action="certificado.php" method="post" target="_blank">
                <input  name="user" id="user" value="{{ auth()->id() }}" type="hidden"/>
                <input  name="nombre" id="nombre" value="{{ auth()->user()->name }}" type="hidden"/>
                <input  name="codigo" id="codigo" value="{{ $codigo->codigo }}" type="hidden"/>
                <button type="submit" class="btn btn-warning" style="color: #ffffff;"><i class="fa fa-eye"></i>&nbsp;Descargar certificado</button>
            </form>
        </div>  
        @endif
        @endif
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
                                            <font style="vertical-align: inherit;">Nombre</font>
                                        </font>
                                    </th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Versión del motor: activar para ordenar la columna ascendente" style="">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Descargar</font>
                                        </font>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recursos as $recurso)
                                    <tr class="odd">
                                      <td style="">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;"> {{ $recurso->nombre }} </font>
                                            </font>
                                        </td>
                                        <td style="">
                                            <a class="btn btn-success" style="color: #ffffff;"
                                            href="{{asset($recurso->url)}}" target="_blank">Descargar</a>
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
