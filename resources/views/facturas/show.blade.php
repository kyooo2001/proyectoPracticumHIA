@extends('layouts.app')

{{-- Customize layout sections --}}
@section('content_header')
<x-adminlte-small-box title="Factura Médica" text="Factura médica del paciente." icon="fas fa-h-square"/>
@stop

@section('content_body')
{{-- On the blade file... --}}
{{-- Minimal without header / body only --}}

<x-adminlte-card theme="info" theme-mode="outline">
    {{-- Traer informacion de la factura --}}
    <x-adminlte-input name="paciente" label="Paciente" placeholder="Paciente" label-class="text-lightblue" value="{{ $factura->paciente->apellidos . ' ' . $factura->paciente->nombres }}" readonly>
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user-injured text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-adminlte-input name="doctor" label="Doctor" placeholder="Doctor" label-class="text-lightblue" value="{{ $factura->doctor->apellidos . ' ' . $factura->doctor->nombres }}" readonly>
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user-injured text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-adminlte-input name="fecha_pago" label="Fecha de la factura médica" placeholder="Factura médica" label-class="text-lightblue" value="{{ $factura->fecha_pago }}" readonly>
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-diagnoses text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-adminlte-input name="monto" label="Valor total" placeholder="Valor total" label-class="text-lightblue" value="{{ $factura->monto }}" readonly>
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-dollar-sign text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-adminlte-text-editor 
        name="descripcion" 
        label="Detalles de la factura médica" 
        placeholder="Detalles de la factura médica" 
        label-class="text-lightblue" 
        igroup-size="sm"
        :disabled="true">
        {{ strip_tags($factura->descripcion) }}
    </x-adminlte-text-editor>
     
    {{-- Button with types --}}
    <div class="form-group"> 
        <a class="btn btn-flat btn-primary" href="{{ url('facturas') }}"> Regresar </a>
    </div>
</x-adminlte-card>

@stop

{{-- Push extra CSS --}}
@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}
@push('js')
@endpush