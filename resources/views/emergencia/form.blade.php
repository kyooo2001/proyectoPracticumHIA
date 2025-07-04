<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="paciente_id" class="form-label">{{ __('Paciente') }}</label>
            <select name="paciente_id" id="paciente_id" class="form-control @error('paciente_id') is-invalid @enderror">
                <option value="">Seleccione un paciente</option>
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}"
                        {{ old('paciente_id', $emergencia?->paciente_id) == $paciente->id ? 'selected' : '' }}>
                        {{ $paciente->nombres }} {{ $paciente->apellidos }} - CI: {{ $paciente->ci }} - Fecha
                        Nacimiento.:
                        {{ \Carbon\Carbon::parse($paciente->fecha_nacimiento)->format('d/m/Y') }} - Género
                        {{ $paciente->genero }}

                    </option>
                @endforeach
            </select>
            {!! $errors->first('paciente_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="frecuencia_cardiaca_alta" class="form-label">{{ __('Frecuencia Cardiaca Alta') }}</label>
            <input type="text" name="frecuencia_cardiaca_alta"
                class="form-control @error('frecuencia_cardiaca_alta') is-invalid @enderror"
                value="{{ old('frecuencia_cardiaca_alta', $emergencia?->frecuencia_cardiaca_alta) }}"
                id="frecuencia_cardiaca_alta" placeholder="Frecuencia Cardiaca Alta">
            {!! $errors->first(
                'frecuencia_cardiaca_alta',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="frecuencia_cardiaca_baja" class="form-label">{{ __('Frecuencia Cardiaca Baja') }}</label>
            <input type="text" name="frecuencia_cardiaca_baja"
                class="form-control @error('frecuencia_cardiaca_baja') is-invalid @enderror"
                value="{{ old('frecuencia_cardiaca_baja', $emergencia?->frecuencia_cardiaca_baja) }}"
                id="frecuencia_cardiaca_baja" placeholder="Frecuencia Cardiaca Baja">
            {!! $errors->first(
                'frecuencia_cardiaca_baja',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="frecuencia_respiratoria" class="form-label">{{ __('Frecuencia Respiratoria') }}</label>
            <input type="text" name="frecuencia_respiratoria"
                class="form-control @error('frecuencia_respiratoria') is-invalid @enderror"
                value="{{ old('frecuencia_respiratoria', $emergencia?->frecuencia_respiratoria) }}"
                id="frecuencia_respiratoria" placeholder="Frecuencia Respiratoria">
            {!! $errors->first(
                'frecuencia_respiratoria',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="presion_arterial" class="form-label">{{ __('Presion Arterial') }}</label>
            <input type="text" name="presion_arterial"
                class="form-control @error('presion_arterial') is-invalid @enderror"
                value="{{ old('presion_arterial', $emergencia?->presion_arterial) }}" id="presion_arterial"
                placeholder="Presion Arterial">
            {!! $errors->first(
                'presion_arterial',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="saturacion_oxigeno" class="form-label">{{ __('Saturacion Oxigeno') }}</label>
            <input type="text" name="saturacion_oxigeno"
                class="form-control @error('saturacion_oxigeno') is-invalid @enderror"
                value="{{ old('saturacion_oxigeno', $emergencia?->saturacion_oxigeno) }}" id="saturacion_oxigeno"
                placeholder="Saturacion Oxigeno">
            {!! $errors->first(
                'saturacion_oxigeno',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="nivel_conciencia" class="form-label">{{ __('Nivel de Conciencia (AVPU)') }}</label>
            <select name="nivel_conciencia" id="nivel_conciencia"
                class="form-control @error('nivel_conciencia') is-invalid @enderror" required>
                <option value="">Seleccione un nivel</option>
                <option value="Alerta"
                    {{ old('nivel_conciencia', $emergencia?->nivel_conciencia) == 'Alerta' ? 'selected' : '' }}>Alerta
                </option>
                <option value="Responde a voz"
                    {{ old('nivel_conciencia', $emergencia?->nivel_conciencia) == 'Responde a voz' ? 'selected' : '' }}>
                    Responde a voz</option>
                <option value="Responde al dolor"
                    {{ old('nivel_conciencia', $emergencia?->nivel_conciencia) == 'Responde al dolor' ? 'selected' : '' }}>
                    Responde al dolor</option>
                <option value="No responde"
                    {{ old('nivel_conciencia', $emergencia?->nivel_conciencia) == 'No responde' ? 'selected' : '' }}>No
                    responde</option>
            </select>
            {!! $errors->first(
                'nivel_conciencia',
                '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
            ) !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="categoria" class="form-label">{{ __('Categoría de Triaje') }}</label>
            <input type="text" name="categoria" id="categoria"
                class="form-control @error('categoria') is-invalid @enderror"
                value="{{ old('categoria', $emergencia?->categoria) }}" placeholder="Se calculará automáticamente"
                readonly>
            {!! $errors->first('categoria', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="puntaje_total" class="form-label">{{ __('Puntaje Total') }}</label>
            <input type="text" id="puntaje_total" class="form-control" value="Se calculará automáticamente" readonly>
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
