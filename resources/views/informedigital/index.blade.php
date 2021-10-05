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
                Informe Digital
            </h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">

            <form action="{{ route('informedigital.create') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        {!! Form::label('link', 'Link de la carpeta:') !!}

                        <input class="form-control" placeholder="Link del drive con los documentos..." name="link"
                            type="text" id="link" @if ($informe) value="{{ $informe->link }}"  @endif>
                        @error('link')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

               @if ($informe)
               <input name="opcion" id="opcion" value="actualizar" type="hidden" />
               <input class="btn btn-success" type="submit" value="Actualizar"> 
               @else
               <input name="opcion" id="opcion" value="crear" type="hidden" />
               <input class="btn btn-success" type="submit" value="Registrar">
               @endif
                   


            </form>
        </div>
        </div>
    </div>
@endsection
