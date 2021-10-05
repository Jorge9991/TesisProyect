<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('name', 'Nombre completo:') !!}
        {!! Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'GUERRERO ALEJANDRO JORGE LUIS']) !!}
        @error('name')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('cedula', 'Cedula:') !!}
        {!! Form::text('cedula', null, ['class' => 'form-control' . ($errors->has('cedula') ? ' is-invalid' : ''), 'placeholder' => 'ingrese cedula de identidad']) !!}
        @error('cedula')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('email', 'Correo:') !!}
        {!! Form::email('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'example@gmail.com']) !!}
        @error('email')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    @if (!isset($user))
    <div class="form-group col-md-6">
        {!! Form::label('password', 'Contraseña:') !!}
        {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '')]) !!}
        @error('password')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    @endif
    <div class="form-group col-md-6">
        <label for="select" class=" form-control-label">Tipología de la empresa:</label>
            <select name="tipo_usuario" id="tipo_usuario" class="custom-select">
                @if (isset($user))
                <option value="0" @if( $user->tipo_usuario == '0') selected='selected' @endif>Egresado</option>
                <option value="1" @if( $user->tipo_usuario == '1') selected='selected' @endif>Gestor</option>
                <option value="2" @if( $user->tipo_usuario == '2') selected='selected' @endif>Entidad Receptora</option>
                <option value="3" @if( $user->tipo_usuario == '3') selected='selected' @endif>Tutor</option>
                <option value="4" @if( $user->tipo_usuario == '4') selected='selected' @endif>Vicerrectorado</option>
                <option value="5" @if( $user->tipo_usuario == '5') selected='selected' @endif>Titulación</option>
                @else
                <option value="0">Egresado</option>
                <option value="1">Gestor</option>
                <option value="2">Entidad Receptora</option>
                <option value="3">Tutor</option>
                <option value="4">Vicerrectorado</option>
                <option value="5">Titulación</option>
                @endif
            </select>
    </div>

</div>