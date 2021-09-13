<div class="row">
    <div class="form-group col-md-6">
        <label for="select" class=" form-control-label">Convenio:</label>
        <select name="id_convenio" id="id_convenio" class="custom-select">
            @if (isset($oferta_cupo))
                @foreach ($convenios as $convenio)
                <option value="{{ $convenio->id}}"  @if ($convenio->id == $oferta_cupo->id_convenio) selected='selected' @endif>{{ $convenio->entidad_receptora}}</option>
                @endforeach
            @else
                @foreach ($convenios as $convenio)
                    <option value="{{ $convenio->id}}">{{ $convenio->entidad_receptora}}</option>
                @endforeach
            @endif
        </select>
    </div>


    <div class="form-group col-md-6">
        {!! Form::label('horas_diarias', 'Horas diarias:') !!}
        {!! Form::selectRange('horas_diarias', 1, 12, null, ['class' => 'custom-select' . ($errors->has('horas_diarias') ? ' is-invalid' : '')]) !!}
        @error('horas_diarias')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('horas_inicio', 'Hora de inicio:') !!}
        {!! Form::Time('horas_inicio', null, ['class' => 'form-control' . ($errors->has('horas_inicio') ? ' is-invalid' : '')]) !!}
        @error('horas_inicio')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('horas_fin', 'Hora final:') !!}
        {!! Form::Time('horas_fin', null, ['class' => 'form-control' . ($errors->has('horas_fin') ? ' is-invalid' : '')]) !!}
        @error('horas_fin')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('fecha_inicio', 'Fecha de Inicio:') !!}
        {!! Form::Date('fecha_inicio', null, ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : '')]) !!}
        @error('fecha_inicio')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <div class="form-group col-md-6">
        {!! Form::label('cupos', 'Cupos:') !!}
        {!! Form::selectRange('cupos', 1, 20, null, ['class' => 'custom-select' . ($errors->has('cupos') ? ' is-invalid' : '')]) !!}
        @error('cupos')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


</div>
