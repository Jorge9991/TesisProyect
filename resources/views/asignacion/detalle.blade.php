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
                    <font style="vertical-align: inherit;">Aceptación o Rechazo de Asignación al convenio
                        "{{ $asignacion->entidad_receptora }}"</font>
                </font>
            </h3>
        </div>
        <div class="card-header">
            {{-- <a href="{{ route('asignacion.aceptar_asignacion', $asignacion) }}" class="btn btn-success">Aceptar</a> --}}

            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-defaul">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        Aceptar
                    </font>
                </font>
            </button>

            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        Rechazar
                    </font>
                </font>
            </button>

        </div>
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Estudiantes asignados </font>
                                </font>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asignaciones as $asignacion)
                            <tr>
                                <td>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">{{ $asignacion->estudiantes->name }}
                                        </font>
                                    </font>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <div class="modal fade" id="modal-default" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Motivo del Rechazo</font>
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
                        <form action="{{ route('asignacion.rechazar_asignacion', $asignation) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Observación</font>
                                    </font>
                                </label>
                                <textarea class="form-control" rows="3" id="observacion" name="observacion"
                                    placeholder="Escriba el motivo de su rechazo" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Rechazar Asignación</font>
                                </font>
                            </button>
                        </form>

                    </div>
                   
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <div class="modal fade" id="modal-defaul" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Documento asignación de tutor</font>
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
                        <form action="{{ route('asignacion.aceptar_asignacion', $asignation) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    {!! Form::label('file', 'Archivo:') !!}
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="file" name="file" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                      <label class="custom-file-label" for="customFile">Seleccione el archivo..</label>
                                    </div>
                                  </div>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Aceptar Asignación</font>
                                </font>
                            </button>
                        </form>

                    </div>
                   
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
@endsection
