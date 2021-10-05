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
                    <font style="vertical-align: inherit;">Registro de Usuarios</font>
                </font>
            </h3>
        </div>
        <div class="card-body">

            {!! Form::open(['route' => 'user.store']) !!}

            @include('user.partials.form')

            {!! Form::submit('Registrar Usuario', ['class' => 'btn btn-primary mt-2']) !!}

            {!! Form::close() !!}


        </div>
    </div>
@endsection
