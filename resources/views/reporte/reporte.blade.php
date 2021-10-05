@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-6 col-12">
            <a href="estudiantes.php" target="_blank">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;"></font>
                            </font><sup style="font-size: 20px">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Reporte</font>
                                </font>
                            </sup>
                        </h3>

                        <p>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Todos los estudiantes</font>
                            </font>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </a>

        </div>
        <div class="col-lg-6 col-12">
            <a href="estudiantes_culminados.php" target="_blank">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;"></font>
                            </font><sup style="font-size: 20px">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Reporte</font>
                                </font>
                            </sup>
                        </h3>

                        <p>
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Estudiantes que han culminado el proceso</font>
                            </font>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                </div>
            </a>
        </div>

    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">Reporte por Convenio</font>
                </font>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="card-header">
                <form action="reporte_por_convenio.php" method="post" target="_blank">
                    <div class="form-group col-md-12">
                        {!! Form::label('convenio', 'Nombre del Convenio:') !!}
                        <select name="convenio" id="convenio" class="custom-select">
                            @foreach ($convenios as $convenio)
                                <option value="{{ $convenio->id }}">{{ $convenio->entidad_receptora }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-warning" style="color: #ffffff;"><i
                                class="fa fa-file-pdf"></i>&nbsp;Generar Reporte</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
