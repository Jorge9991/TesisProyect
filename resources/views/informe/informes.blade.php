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
       
        <div class="modal fade" id="modal-default" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Selecione la semana</font>
                            </font>
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">×</font>
                                </font>
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="pdf.php" method="post" target="_blank">
                            <input  name="user" id="user" value="{{ auth()->id() }}" type="hidden"/>
                            <input  name="usuario" id="usuario" value="{{ auth()->user()->name }}" type="hidden"/>
                            <div class="form-group col-md-12">
                                {!! Form::label('semana', 'Semana:') !!}
                                {!! Form::selectRange('semana', 1, 20, null, ['class' => 'custom-select' . ($errors->has('semana') ? ' is-invalid' : '')]) !!}
                                @error('semana')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-warning" style="color: #ffffff;"><i class="fa fa-eye"></i>&nbsp;Visualizar reporte Pdf</button>
                        </form>
            
                    </div>
                   
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.card-body -->
    </div>
@endsection
