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
                    <font style="vertical-align: inherit;">Registro de Recurso</font>
                </font>
            </h3>
        </div>
        <div class="card-body">
            <form  action="{{route('tutor.recurso.store')}}" method="POST" enctype="multipart/form-data">
               @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        {!! Form::label('file', 'Archivo:') !!}
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="file" name="file" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                          <label class="custom-file-label" for="customFile">Seleccione el archivo..</label>
                        </div>
                      </div>
                    <div class="form-group col-md-6" >
                        <label for="select" class=" form-control-label">Categoria:</label>
                            <select name="proceso" id="proceso" class="custom-select">
                             
                                <option value="1">Egresado</option>
                                <option value="2">Administración</option>
                               
                            </select>
                            <p>Seleccione a que tipo de usuario presentar el documento</p>
                    </div>
                </div>

                <input class="btn btn-success" type="submit" value="Registrar" >
            </form>

        </div>
    </div>
@endsection