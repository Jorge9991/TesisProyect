@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (Auth::user()->tipo_usuario == 0)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Pantalla principal') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('Has logeado como Egresado') }}
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->tipo_usuario == 1)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Pantalla principal') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('Has logeado como Gestor') }}
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->tipo_usuario == 2)
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Pantalla principal') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('Has logeado como Convenio') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
