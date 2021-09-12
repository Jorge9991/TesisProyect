@extends('layouts.app')
@section('content')
<div class="card">
    @if (session('info'))
    <div class="alert alert-primary" role="alert">
        {{ session('info') }}
    </div>
@endif
    <div class="card-body">
        {!! Form::model($convenio,['route' => ['tutor.convenio.update', $convenio], 'method' =>'put']) !!}

            @include('convenio.partials.form')
            
            {!! Form::submit('Actualizar Convenio', ['class' => 'btn btn-primary mt-2']) !!}

        {!! Form::close() !!}
    </div>
</div>
@endsection