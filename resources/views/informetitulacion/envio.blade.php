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
                    <font style="vertical-align: inherit;">Informe Titulación</font>
                </font>
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('titulacion.enviocorreotitulacion') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <div class="form-group col-md-12">
                        {!! Form::label('file', 'Informe:') !!}
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="file" name="file" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                          <label class="custom-file-label" for="customFile">Seleccione el archivo..</label>
                        </div>
                      </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Enviar</font>
                    </font>
                </button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
