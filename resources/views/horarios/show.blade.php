@extends('layouts.app')

{{-- Customize layout sections --}}
@section('content_header')
<x-adminlte-small-box title="Horario" text="Información del horario." icon="fas fa-h-square"/>
@stop

@section('content_header')

@stop

@section('content_body')
{{-- On the blade file... --}}
{{-- Minimal without header / body only --}}


    @csrf
    <x-adminlte-card theme="lime" theme-mode="outline">
        
            {{-- With prepend slot --}}
        <x-adminlte-input name="nombres" label="Nombres del Doctor" placeholder="Nombres" label-class="text-lightblue" value="{{ $horarios->doctor->nombres }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                <i class="fas fa-user-md text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        
        <x-adminlte-input name="apellidos" label="Apellidos del Doctor" placeholder="Apellidos" label-class="text-lightblue" value="{{ $horarios->doctor->apellidos }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user-md text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="especialidad" label="Especialidad" placeholder="Especialidad" label-class="text-lightblue" value="{{ $horarios->doctor->especialidad }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-stethoscope text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="consultorio" label="Consultorio" placeholder="Consultorio" label-class="text-lightblue" value="{{ $horarios->consultorio->nombre }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-hospital-alt text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="dia" label="Día" placeholder="Día" label-class="text-lightblue" value="{{ $horarios->dia }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-calendar-alt text-warning"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="hora_inicio" label="Hora de inicio" placeholder="Hora inicio" label-class="text-lightblue" value="{{ $horarios->hora_inicio }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-clock text-warning"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="hora_final" label="Hora Final" placeholder="Hora final" label-class="text-lightblue" value="{{ $horarios->hora_final }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-clock text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>


        

        
        
        
        
         
        {{-- Button with types --}}
        <!--/*return url*/-->
        <div class="form group"> 
            <a class="btn btn-flat btn-primary" href="{{url('horarios/') }}"> Regresar </a>
            
            
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