@extends('layouts.app')

@section('content')
    <div class="card">
        @if (session('info'))
            <div class="alert alert-primary" role="alert">
                {{ session('info') }}
            </div>
        @endif
        @if ($informefinal)
            @if ($informefinal->estado == 2)
                <div class="alert alert-success" role="alert">
                    Estado Aprobado
                </div>
            @endif
            @if ($informefinal->estado == 3)
                <div class="alert alert-danger" role="alert">
                    Estado Correción
                </div>
            @endif
        @endif
        <div class="card-header">
            <h3 class="card-title">
                Informe Final del Estudiante: {{$informefinal->estudiantes->name}}
            </h3>
        </div>

        
        <!-- /.card-header -->
        <div class="card-body">

            <form action="{{ route('informe.aprobar', $informefinal) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        {!! Form::label('link', 'Link de la carpeta:') !!}

                        <input class="form-control" placeholder="Link del drive con los documentos..." name="link"
                            type="text" id="link" value="{{ $informefinal->link }}"  disabled>
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label('fecha', 'Fecha de firma:') !!}
                        <input class="form-control" name="fecha" type="date" id="fecha" @if ($informefinal->estado == 2) value="{{$informefinal->fecha}}" @endif ></div>
                    <div class="form-group col-md-6">
                        {!! Form::label('observacion', 'Observación:') !!}
                        <textarea rows="3" class="form-control" placeholder="Observación...." name="observacion" cols="50" id="observacion">@if ($informefinal->estado == 2) {{$informefinal->observaciones}} @endif</textarea> </div>  
                </div>
                    <input class="btn btn-success float-left ml-2" type="submit" value="Aprobar Todos los formatos">
            </form>

            <button type="button" class="btn btn-danger float-left ml-2" data-toggle="modal" data-target="#modal-default">
                <font style="vertical-align: inherit;">
                      No aprobar
                   
                </font>
            </button>
            @if ($informefinal->estado == 2 or $informefinal->estado == 3)
            <a href="{{ route('informe.cancelar',$informefinal) }}" class="btn btn-primary float-left ml-2">Cancelar</a>
          
            @endif
       </div>
        <div class="modal fade" id="modal-default" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Observación</font>
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
                        <form action="{{ route('informe.noaprobar', $informefinal) }}" method="POST" >
                            @csrf
                            <div class="form-group col-md-12">
                                {!! Form::label('observacion', 'Observación de la correción:') !!}
                                {!! Form::textarea('observacion', null, ['rows' => 3,'class' => 'form-control' . ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'Observación del rechazo....']) !!}
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">No aprobar los formatos</font>
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
