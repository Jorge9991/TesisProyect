@extends('layouts.app')
@section('content')
<div class="card">
    @if (session('info'))
    <div class="alert alert-primary" role="alert">
        {{ session('info') }}
    </div>
@endif
    <div class="card-body">
        {!! Form::model($oferta_cupo,['route' => ['tutor.oferta_cupo.update', $oferta_cupo], 'method' =>'put']) !!}

            @include('oferta.partials.form')
            
            {!! Form::submit('Actualizar Oferta', ['class' => 'btn btn-primary mt-2']) !!}

        {!! Form::close() !!}
    </div>
</div>
@endsection