@extends('layouts.app')
@section('content')
<div class="card">
    @if (session('info'))
    <div class="alert alert-primary" role="alert">
        {{ session('info') }}
    </div>
@endif
    <div class="card-body">
        {!! Form::model($information,['route' => ['information.update', $information], 'method' =>'put']) !!}

            @include('informacion.partials.form')
            
            {!! Form::submit('Actualizar Información', ['class' => 'btn btn-primary mt-2']) !!}

        {!! Form::close() !!}
    </div>
</div>
@endsection