@extends('layouts.app')

{{-- Customize layout sections --}}
@section('content_header')
<x-adminlte-small-box title="Consultorio Médico" text="Información del consultorio." icon="fas fa-h-square"/>
@stop

@section('content_header')

@stop

@section('content_body')
{{-- On the blade file... --}}
{{-- Minimal without header / body only --}}


    @csrf
    <x-adminlte-card theme="lime" theme-mode="outline">
        
            {{-- With prepend slot --}}
        <x-adminlte-input name="nombre" label="Nombre consultorio médico" placeholder="Nombre del consultorio" label-class="text-lightblue" value="{{ $consultorio->nombre }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-hospital-alt text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="especialidad" label="Especialidad" placeholder="Especialidad" label-class="text-lightblue" value="{{ $consultorio->especialidad }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-stethoscope text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="estado" label="estado" placeholder="Operativo" label-class="text-lightblue" value="{{ $consultorio->estado }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-radiation text-danger"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="telefono" label="Número telefónico" placeholder="Número de teléfono" label-class="text-lightblue" value="{{ $consultorio->telefono }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-phone-square text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="capacidad" label="Capacidad" placeholder="Capacidad de pacientes" label-class="text-lightblue" type="email" value="{{ $consultorio->capacidad }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-hand-holding-medical text-info"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        
        
        
        
         
        {{-- Button with types --}}
        <!--/*return url*/-->
        <div class="form group"> 
            <a class="btn btn-flat btn-primary" href="{{url('consultorios/') }}"> Regresar </a>
            
            
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