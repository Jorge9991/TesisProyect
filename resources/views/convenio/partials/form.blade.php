<div class="row">
    <div class="form-group col-md-6">
        {!! Form::label('entidad_receptora', 'Entidad receptora:') !!}
        {!! Form::text('entidad_receptora', null, ['class' => 'form-control' . ($errors->has('entidad_receptora') ? ' is-invalid' : ''), 'placeholder' => 'Entidad receptora']) !!}
        @error('entidad_receptora')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label for="select" class=" form-control-label">Tipología de la empresa:</label>
            <select name="tipologia_empresa" id="tipologia_empresa" class="form-control">
                @if (isset($convenio))
                <option value="PÚBLICA" @if( $convenio->tipologia_empresa == 'PÚBLICA') selected='selected' @endif>PÚBLICA</option>
                <option value="PRIVADA" @if( $convenio->tipologia_empresa == 'PRIVADA') selected='selected' @endif>PRIVADA</option>
                <option value="MIXTA" @if( $convenio->tipologia_empresa == 'MIXTA') selected='selected' @endif>MIXTA</option>
           
                @else
                <option value="PÚBLICA">PÚBLICA</option>
                <option value="PRIVADA">PRIVADA</option>
                <option value="MIXTA">MIXTA</option>
                @endif
            </select>
    </div>
    <div class="form-group col-md-6">
        <label for="select" class=" form-control-label">Avance:</label>
            <select name="avance" id="avance" class="form-control">
                @if (isset($convenio))
                <option value="FIRMADO" @if( $convenio->avance == 'FIRMADO') selected='selected' @endif>FIRMADO</option>
                <option value="NO FIRMADO" @if( $convenio->avance == 'NO FIRMADO') selected='selected' @endif>NO FIRMADO</option>
              
                @else
                <option value="FIRMADO">FIRMADO</option>
                <option value="NO FIRMADO">NO FIRMADO</option>
               
                @endif
            </select>
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('fecha_firma', 'Fecha de firma:') !!}
        {!! Form::Date('fecha_firma', null, ['class' => 'form-control' . ($errors->has('fecha_firma') ? ' is-invalid' : '')]) !!}
        @error('fecha_firma')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('fecha_finalizacion', 'Fecha de finalización:') !!}
        {!! Form::Date('fecha_finalizacion', null, ['class' => 'form-control' . ($errors->has('fecha_finalizacion') ? ' is-invalid' : '')]) !!}
        @error('fecha_finalizacion')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <div class="form-group col-md-6">
        {!! Form::label('numero_convenio', 'N° de convenio:') !!}
        {!! Form::text('numero_convenio', null, ['class' => 'form-control' . ($errors->has('numero_convenio') ? ' is-invalid' : ''), 'placeholder' => 'N° de convenio']) !!}
        @error('numero_convenio')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('aprobacion_zonal', 'Aprobación zonal:') !!}
        {!! Form::text('aprobacion_zonal', null, ['class' => 'form-control' . ($errors->has('aprobacion_zonal') ? ' is-invalid' : ''), 'placeholder' => 'Aprobación zonal']) !!}
        @error('aprobacion_zonal')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group col-md-6">
        {!! Form::label('email', 'Correo:') !!}
        {!! Form::email('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Correo Electrónico']) !!}
        @error('email')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    

</div>