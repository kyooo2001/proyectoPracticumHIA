@extends('layouts.app')

{{-- Customize layout sections --}}
@section('content_header')
<x-adminlte-small-box title="Paciente" text="Información del paciente." icon="fas fa-h-square"/>
@stop

@section('content_header')

@stop

@section('content_body')
{{-- On the blade file... --}}
{{-- Minimal without header / body only --}}


    @csrf
    <x-adminlte-card theme="lime" theme-mode="outline">
        
            {{-- With prepend slot --}}
        <x-adminlte-input name="nombres" label="Nombres" placeholder="Nombres del usuario" label-class="text-lightblue" value="{{ $paciente->nombres }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="apellidos" label="Apellidos" placeholder="Apellidos del usuario" label-class="text-lightblue" value="{{ $paciente->apellidos }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="ci" label="CI" placeholder="Número de cédula" label-class="text-lightblue" value="{{ $paciente->ci }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-id-card text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="celular" label="Número móvil" placeholder="Número de celular" label-class="text-lightblue" value="{{ $paciente->celular }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-mobile text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="correo" label="Email" placeholder="Correo electrónico" label-class="text-lightblue" type="email" value="{{ $paciente->correo }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-envelope text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="seguro_medico" label="Seguro médico" placeholder="Seguro médico" label-class="text-lightblue" value="{{ $paciente->seguro_medico }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-notes-medical text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="fecha_nacimiento" label="Fecha de nacimiento" placeholder="Fecha de nacimiento" label-class="text-lightblue" value="{{ $paciente->fecha_nacimiento }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-calendar text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="genero" label="Género" placeholder="Género" label-class="text-lightblue" value="{{ $paciente->genero }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-venus-mars text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="grupo_sanguineo" label="Grupo Sanguíneo" placeholder="Grupo Sanguíneo" label-class="text-lightblue" value="{{ $paciente->grupo_sanguineo }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-tint text-danger text-danger"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="alergias" label="Alergias" placeholder="Alergias" label-class="text-lightblue" value="{{ $paciente->alergias }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-notes-medical text-danger"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="ciudad" label="Ciudad" placeholder="Ciudad" label-class="text-lightblue" value="{{ $paciente->ciudad }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-city text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="provincia" label="Provincia" placeholder="Provincia" label-class="text-lightblue" value="{{ $paciente->provincia }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-map text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="direccion" label="Dirección" placeholder="Dirección de domicilio" label-class="text-lightblue" value="{{ $paciente->direccion }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-route text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="contacto_emergencia" label="Contacto emergencia" placeholder="Contacto emergencia" label-class="text-lightblue" value="{{ $paciente->contacto_emergencia }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-envelope  text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="observaciones" label="Observaciones" placeholder="Observaciones" label-class="text-lightblue" value="{{ $paciente->observaciones }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-sticky-note text-warning"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        
        
        
         
        {{-- Button with types --}}
        <!--/*return url*/-->
        <div class="form group"> 
            <a class="btn btn-flat btn-primary" href="{{url('pacientes/') }}"> Regresar </a>
            
            
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