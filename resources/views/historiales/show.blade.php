@extends('layouts.app')

{{-- Customize layout sections --}}
@section('content_header')
<x-adminlte-small-box title="Diagnóstico médico" text="Diagnóstico médico del paciente." icon="fas fa-h-square"/>
@stop



@section('content_body')
{{-- On the blade file... --}}
{{-- Minimal without header / body only --}}


    
    <x-adminlte-card theme="info" theme-mode="outline">
        
            {{-- Traer informacion del historial --}}
            <x-adminlte-input name="paciente" label="Paciente" placeholder="Paciente" label-class="text-lightblue" value="{{  $historial->paciente->apellidos . " "  . $historial->paciente->nombres  }}"  readonly>
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                    <i class="fas fa-user-injured text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        
        <x-adminlte-input name="fecha_visita" label="Fecha del diagnóstico médico" placeholder="Fecha del diagnóstico" label-class="text-lightblue" value="{{ $historial->fecha_visita }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-diagnoses text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-text-editor 
            name="detalle" 
            label="Detalles del diagnóstico médico" 
            placeholder="Detalles del diagnóstico médico" 
            label-class="text-lightblue" 
            igroup-size="sm"
            :disabled="true">
            {{ strip_tags($historial->detalle) }}
        </x-adminlte-text-editor>
         
        {{-- Button with types --}}
        <!--/*return url*/-->
        <div class="form-group"> 
            <a class="btn btn-flat btn-primary" href="{{url('historiales') }}"> Regresar </a>
        </div>
    

    

@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
  
    


   
@endpush