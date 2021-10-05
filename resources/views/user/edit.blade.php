@extends('layouts.app')
@section('content')
<div class="card">
    @if (session('info'))
    <div class="alert alert-primary" role="alert">
        {{ session('info') }}
    </div>
@endif
    <div class="card-body">
        {!! Form::model($user,['route' => ['user.update', $user], 'method' =>'put']) !!}

            @include('user.partials.form')
            
            {!! Form::submit('Actualizar Usuario', ['class' => 'btn btn-primary mt-2']) !!}

        {!! Form::close() !!}
    </div>
</div>
@endsection