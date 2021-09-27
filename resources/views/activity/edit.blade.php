@extends('layouts.app')
@section('content')
<div class="card">
    @if (session('info'))
    <div class="alert alert-primary" role="alert">
        {{ session('info') }}
    </div>
@endif
    <div class="card-body">
        {!! Form::model($activity,['route' => ['activity.update', $activity], 'method' =>'put']) !!}

            @include('activity.partials.form')
            
            {!! Form::submit('Actualizar Actividad', ['class' => 'btn btn-primary mt-2']) !!}

        {!! Form::close() !!}
    </div>
</div>
@endsection