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
                    <font style="vertical-align: inherit;">Actividad</font>
                </font>
            </h3>
        </div>
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{ route('information.create') }}" class="btn btn-primary float-right"><i
                        class="fa fa-plus-square"></i>&nbsp;Registrar Actividad</a>
            </h3>
        </div>
        <div class="card-header">
            <h3 class="card-title">
                Total de horas completadas: {{ $total}}
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
                                            <font style="vertical-align: inherit;">Dia</font>
                                        </font>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Navegador: activar para ordenar la columna de forma ascendente">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Semana</font>
                                        </font>
                                    </th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Versión del motor: activar para ordenar la columna ascendente" style="">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Fecha</font>
                                        </font>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Versión del motor: activar para ordenar la columna ascendente" style="">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Cantidad de horas</font>
                                        </font>
                                    </th>

                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Versión del motor: activar para ordenar la columna ascendente" style="">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Editar</font>
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
                                <?php
                                $dia = 0;
                                $semana = 1;
                                ?>
                                @forelse($informaciones as $information)
                                    <?php
                                    $dia = $dia + 1;
                                    if ($dia == 6 or $dia == 11 or $dia == 16 or $dia == 21 or $dia == 26 or $dia == 31 or $dia == 36 or $dia == 41 or $dia == 46 or $dia == 51 or $dia == 56 or $dia == 61 or $dia == 66 or $dia == 71 or $dia == 76 or $dia == 81 or $dia == 86 or $dia == 91 or $dia == 96 or $dia == 101) {
                                        $semana = $semana + 1;
                                    }
                                    ?>
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    {{ $dia }}
                                                </font>
                                            </font>
                                        </td>
                                        <td>
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">
                                                    {{ $semana }}
                                                </font>
                                            </font>
                                        </td>
                                        <td style="">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">{{ $information->fecha }}</font>
                                            </font>
                                        </td>
                                        <?php
                                        $fecha1 = new DateTime($information->horas_inicio); //fecha inicial
                                        $fecha2 = new DateTime($information->horas_fin); //fecha de cierre
                                        $intervalo = $fecha1->diff($fecha2);   
                                        $totalhoras =  $intervalo->format('%H'); //00 años 0 meses 0 días 08 horas 0 minutos 0 segundos
                                        ?>
                                        <td style="">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">{{ $totalhoras }}
                                                </font>
                                            </font>
                                        </td>
                                        <td style="">
                                            <a class="btn btn-success" style="color: #ffffff;"
                                                href="{{ route('information.edit', $information) }}">Editar</a>
                                        </td>
                                        <td style="">
                                            <form action="{{ route('information.destroy', $information) }}" method="POST">
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
