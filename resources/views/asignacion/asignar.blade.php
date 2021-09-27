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
                    <font style="vertical-align: inherit;">Asignación de tutor</font>
                </font>
            </h3>
        </div>
        <div class="card-header">

            <form action="{{ route('asignacion.asignar_tutor', $postulacion) }}" method="POST">
                @csrf
                <label for="select" class=" form-control-label">Docentes:</label>
                <div class="row">
                    <div class="form-group col-md-6">
                        <select name="id_docente" id="id_docente" class="custom-select">
                            @if (!empty($asignado))
                                @foreach ($docentes as $docente)
                                    <option value="{{ $docente->id }}" @if ($docente->id == $asignado->id_docente) selected='selected' @endif>{{ $docente->name }}
                                    </option>
                                @endforeach
                            @else
                                @foreach ($docentes as $docente)
                                    <option value="{{ $docente->id }}">{{ $docente->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    @if (!empty($asignado))
                        <input type="hidden" name="opcion" id="opcion" value="actualizar" />
                        <div class="form-group col-md-3 float-right">
                            <button class="btn btn-success float-right" type="submit">Actualizar asignación</button>
                        </div>
                    @else
                        <input type="hidden" name="opcion" id="opcion" value="asignar" />
                        <div class="form-group col-md-3 float-right">
                            <button class="btn btn-success float-right" type="submit">Asignar</button>
                        </div>
                    @endif

                </div>
            </form>


        </div>
        <div class="card">
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Estudiante que postularon al convenio
                                        "{{ $postulation->ofertas->convenios->entidad_receptora }}"</font>
                                </font>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($postulaciones as $postulacion)
                            <tr>
                                <td>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">{{ $postulacion->estudiantes->name }}
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
    </div>
@endsection
