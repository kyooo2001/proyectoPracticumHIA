@extends('layouts.app')

{{-- Customize layout sections --}}
@section('content_header')
<x-adminlte-small-box title="Doctor" text="Información del doctor." icon="fas fa-h-square"/>
@stop

@section('content_header')

@stop

@section('content_body')
{{-- On the blade file... --}}
{{-- Minimal without header / body only --}}


    @csrf
    <x-adminlte-card theme="lime" theme-mode="outline">
        
            {{-- With prepend slot --}}
        <x-adminlte-input name="nombres" label="Nombres" placeholder="Nombres del docotor" label-class="text-lightblue" value="{{ $doctor->nombres }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user-md text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="apellidos" label="Apellidos" placeholder="Apellidos" label-class="text-lightblue" value="{{ $doctor->apellidos }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user-md text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="celular" label="Número célular" placeholder="Célular" label-class="text-lightblue" value="{{ $doctor->celular }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-mobile-alt text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="licencia_medica" label="Licencia Médica" placeholder="Número de licencia médica" label-class="text-lightblue" value="{{ $doctor->licencia_medica }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-address-card text-danger"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="especialidad" label="Especialidad" placeholder="Especialidad médica" label-class="text-lightblue" value="{{ $doctor->especialidad }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-stethoscope text-info"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="email" label="Email" placeholder="Correo eléctronico" label-class="text-lightblue" type="email" value="{{ $doctor->user->email}}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-envelope text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        
        
        
         
        {{-- Button with types --}}
        <!--/*return url*/-->
        <div class="form group"> 
            <a class="btn btn-flat btn-primary" href="{{url('doctores/') }}"> Regresar </a>
            
            
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