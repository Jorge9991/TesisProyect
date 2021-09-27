<div class="row">

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