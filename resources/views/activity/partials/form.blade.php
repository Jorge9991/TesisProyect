<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('id_asignacion', 'Nombre del Convenio:') !!}
        <select name="id_asignacion" id="id_asignacion" class="custom-select" @if (!empty($activity)) disabled @endif>
            @if (!empty($activity))
                @foreach ($asignaciones as $asignacion)
                    <option value="{{ $asignacion->id_convenio }}" @if ($asignacion->id_convenio == $activity->id_asignacion) selected='selected' @endif>{{ $asignacion->convenios->entidad_receptora }}
                    </option>
                @endforeach
            @else
                @foreach ($asignaciones as $asignacion)
                    <option value="{{ $asignacion->id_convenio }}">{{ $asignacion->convenios->entidad_receptora }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('descripcion', 'Nombre Actividad:') !!}
        {!! Form::text('descripcion', null, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Actividad']) !!}
        @error('descripcion')
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
    @if (!empty($activity))
    <div class="form-group col-md-6">
        {!! Form::label('recurso', 'Recurso:') !!}
        {!! Form::text('recurso', null, ['class' => 'form-control' . ($errors->has('recurso') ? ' is-invalid' : ''), 'placeholder' => 'Link del recurso']) !!}
        @error('recurso')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    @endif
    <div class="form-group col-md-6">
        {!! Form::label('descripcion_visita', 'Descripción:') !!}
        {!! Form::textarea('descripcion_visita', null, ['rows' => 5,'class' => 'form-control' . ($errors->has('descripcion_visita') ? ' is-invalid' : ''), 'placeholder' => 'Descripción']) !!}
        @error('descripcion_visita')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>