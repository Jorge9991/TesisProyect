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
                Informe Final del Estudiante: {{ $informefinal->estudiantes->name }}
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('informe.aprobado', $informefinal) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        {!! Form::label('link', 'Link de la carpeta:') !!}

                        <input class="form-control" placeholder="Link del drive con los documentos..." name="link"
                            type="text" id="link" value="{{ $informefinal->link }}" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        {!! Form::label('fecha', 'Fecha de la entrega de documento:') !!}
                        <input class="form-control" name="fecha" type="date" id="fecha">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="hora">Hora de la entrega de documento:</label>
                        <input class="form-control" name="hora" type="time" id="hora">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lugar">Lugar de la entrega de documento:</label>
                        <input class="form-control" placeholder="Dirección de la entrega" name="lugar" type="text"
                            id="lugar">
                    </div>
                    <div class="form-group col-md-12">
                        {!! Form::label('observacion', 'Observación:') !!}
                        <textarea rows="2" class="form-control" placeholder="Observación...." name="observacion" cols="50"
                            id="observacion"></textarea>
                    </div>
                </div>
                <input class="btn btn-success float-left ml-2" type="submit" value="Aprobado">
            </form>
        </div>
    </div>
@endsection
