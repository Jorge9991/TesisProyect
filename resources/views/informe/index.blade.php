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
                Informe Final
            </h3>
        </div>

        @if ($informefinal)
            @if ($informefinal->estado == 1)
                <div class="alert alert-warning" role="alert">
                    Estado en Revisión
                </div>
            @endif
            @if ($informefinal->estado == 2)
                <div class="alert alert-success" role="alert">
                    Estado Aprobado
                </div>
            @endif
            @if ($informefinal->estado == 3)
                <div class="alert alert-danger" role="alert">
                    Por favor corregir las observaciones
                </div>
            @endif
        @endif
        <!-- /.card-header -->
        <div class="card-body">

            <form action="{{ route('informe.create') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        {!! Form::label('link', 'Link de la carpeta:') !!}

                        <input class="form-control" placeholder="Link del drive con los documentos..." name="link"
                            type="text" id="link" @if ($informefinal) value="{{ $informefinal->link }}"  @endif>
                        @error('link')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @if ($informefinal)
                    @if ($informefinal->estado == 2)
                    <div class="form-group col-md-6">
                        {!! Form::label('fecha', 'Fecha de firma por parte del tutor:') !!}
                        <input disabled class="form-control" name="fecha" type="date" id="fecha" value="{{$informefinal->fecha}}"></div>
                    <div class="form-group col-md-6">
                        {!! Form::label('observacion', 'Observación:') !!}
                        <textarea disabled rows="3" class="form-control" placeholder="Observación...." name="observacion" cols="50" id="observacion"> {{$informefinal->observaciones}}</textarea> </div>  
                
                    @endif
                    @if ($informefinal->estado == 3)
                    <div class="form-group col-md-12">
                        {!! Form::label('observacion', 'Observación del rechazo:') !!}
                        <textarea disabled rows="3" class="form-control" placeholder="Observación...." name="observacion" cols="50" id="observacion"> {{$informefinal->observaciones}}</textarea> </div>  
                    </div> 
                    @endif
                     
                    @endif
               
                @if ($informefinal)
                    @if ($informefinal->estado == 1)
                        <input name="opcion" id="opcion" value="editar" type="hidden" />
                        <input class="btn btn-success" type="submit" value="Actualizar">
                    @endif
                    @if ($informefinal->estado == 2)
                        <input class="btn btn-success" value="Actualizar" disabled>
                    @endif
                    @if ($informefinal->estado == 3)
                    <input name="opcion" id="opcion" value="correcion" type="hidden" />
                    <input class="btn btn-success" type="submit" value="Correción Realizada">
                    @endif

                @else
                    <input name="opcion" id="opcion" value="crear" type="hidden" />
                    <input class="btn btn-success" type="submit" value="Registrar">
                @endif

            </form>
        </div>
        </div>
    </div>
@endsection
