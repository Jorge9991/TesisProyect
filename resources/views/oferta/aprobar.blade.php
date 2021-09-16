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
                    <font style="vertical-align: inherit;">Aprobar Postulación {{$postulation->estudiantes->name}}</font>
                </font>
            </h3>
        </div>
        @if ($postulation->estado == 2)
        <div class="card-header">
            <h3 class="card-title">
                <a href="{{ route('egresado.postulation.cancelar_postulacion', $postulation) }}" class="btn btn-danger float-right" onclick="
                return confirm('Al cancelar el estado pasará a: Por Aprobar')"><i
                        class="fa fa-exclamation-triangle"></i>&nbsp;Cancelar Postulación</a>
            </h3>
        </div> 
        @endif
        
        <div class="card-body">

            {!! Form::model($postulation,['route' => ['egresado.postulation.aprobado', $postulation], 'method' =>'put']) !!}

            <div class="row">
                <div class="form-group col-md-6">
                    {!! Form::label('Convenio', 'Convenio:') !!}
                    <input class="form-control" value="{{$postulation->ofertas->convenios->entidad_receptora}}"  type="text" disabled>
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('Estudiante', 'Estudiante:') !!}
                    <input class="form-control" value="{{$postulation->estudiantes->name}}"  type="text" disabled>
                </div>

                <div class="form-group col-md-6">
                    {!! Form::label('codigo', 'Codigo:') !!}
                    {!! Form::text('codigo', null, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Codigo']) !!}
                    @error('codigo')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('link', 'Link:') !!}
                    {!! Form::text('link', null, ['class' => 'form-control' . ($errors->has('link') ? ' is-invalid' : ''), 'placeholder' => 'Link']) !!}
                    @error('link')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            </div>

            {!! Form::submit('Aprobar', ['class' => 'btn btn-primary mt-2']) !!}

            {!! Form::close() !!}


        </div>
    </div>
@endsection