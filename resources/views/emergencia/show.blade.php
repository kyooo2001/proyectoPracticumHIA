@extends('layouts.app')

@section('template_title')
    {{ $emergencia->name ?? __('Show') . ' ' . __('Emergencia') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Triaje</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('emergencias.index') }}">
                                {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                        <div class="form-group mb-2 mb20">
                            <strong>Paciente:</strong><br>
                            {{ $emergencia->paciente->nombres }} {{ $emergencia->paciente->apellidos }}<br>
                            <strong>Cédula:</strong> {{ $emergencia->paciente->ci }}<br>
                            <strong>Fecha de Nacimiento:</strong>
                            {{ \Carbon\Carbon::parse($emergencia->paciente->fecha_nacimiento)->format('d/m/Y') }}<br>
                            <strong>Género:</strong> {{ ucfirst($emergencia->paciente->genero) }}
                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Frecuencia Cardiaca Alta:</strong>
                            {{ $emergencia->frecuencia_cardiaca_alta }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Frecuencia Cardiaca Baja:</strong>
                            {{ $emergencia->frecuencia_cardiaca_baja }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Frecuencia Respiratoria:</strong>
                            {{ $emergencia->frecuencia_respiratoria }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Presion Arterial:</strong>
                            {{ $emergencia->presion_arterial }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Saturacion Oxigeno:</strong>
                            {{ $emergencia->saturacion_oxigeno }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Nivel Conciencia:</strong>
                            {{ $emergencia->nivel_conciencia }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Categoria:</strong>
                            {{ $emergencia->categoria }}
                        </div>
                        <div class="form-group mb-2 mb20">
                            <strong>Puntaje Total:</strong>
                            {{ $emergencia->puntaje_total }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
