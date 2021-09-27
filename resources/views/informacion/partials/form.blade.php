<div class="row">

    <div class="form-group col-md-6">
        <label for="select" class=" form-control-label">Dia:</label>
            <select name="dia" id="dia" class="custom-select">
                @if (isset($information))
                <option value="LUNES" @if( $information->dia == 'LUNES') selected='selected' @endif>LUNES</option>
                <option value="MARTES" @if( $information->dia == 'PRIVADA') selected='selected' @endif>PRIVADA</option>
                <option value="MIERCOLES" @if( $information->dia == 'MIERCOLES') selected='selected' @endif>MIERCOLES</option>
                <option value="JUEVES" @if( $information->dia == 'JUEVES') selected='selected' @endif>JUEVES</option>
                <option value="VIERNES" @if( $information->dia == 'VIERNES') selected='selected' @endif>VIERNES</option>
                <option value="SABADO" @if( $information->dia == 'SABADO') selected='selected' @endif>SABADO</option>
                @else
                <option value="LUNES">LUNES</option>
                <option value="MARTES">MARTES</option>
                <option value="MIERCOLES">MIERCOLES</option>
                <option value="JUEVES">JUEVES</option>
                <option value="VIERNES">VIERNES</option>
                <option value="SABADO">SABADO</option>
                @endif
            </select>
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('semana', 'Semana:') !!}
        {!! Form::selectRange('semana', 1, 20, null, ['class' => 'custom-select' . ($errors->has('semana') ? ' is-invalid' : '')]) !!}
        @error('semana')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('fecha', 'Fecha:') !!}
        {!! Form::Date('fecha', null, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : '')]) !!}
        @error('fecha')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('horas_inicio', 'Hora de inicio:') !!}
        {!! Form::time('horas_inicio', null, ['class' => 'form-control' . ($errors->has('horas_inicio') ? ' is-invalid' : '')]) !!}
        @error('horas_inicio')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-3">
        {!! Form::label('horas_fin', 'Hora final:') !!}
        {!! Form::time('horas_fin', null, ['class' => 'form-control' . ($errors->has('horas_fin') ? ' is-invalid' : '')]) !!}
        @error('horas_fin')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-12">
        {!! Form::label('descripcion', 'Descripción:') !!}
        {!! Form::textarea('descripcion', null, ['rows' => 3,'class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción....']) !!}
        @error('descripcion')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>    

</div>