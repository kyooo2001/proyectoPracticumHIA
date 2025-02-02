@extends('layouts.app')

{{-- Customize layout sections --}}
@section('content_header')
<x-adminlte-small-box title="Historial médico" text="Registro de nueva historia médica." icon="fas fa-h-square"/>
@stop

@section('content_header')

@stop

@section('content_body')
{{-- On the blade file... --}}
{{-- Minimal without header / body only --}}

<form action="{{route('historiales.store')}}" method="post">
    @csrf
    <x-adminlte-card theme="navy" theme-mode="outline">
        
        {{-- Traer informacion del paciente --}}
       
       
        <x-adminlte-select name="paciente_id" label="Paciente" placeholder="Datos paciente" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user-injured text-primary"></i>
                </div>
            </x-slot>               
                    <option value="">Seleccione un paciente</option>
                    @foreach ($pacientes as $paciente)
                        <option value="{{ $paciente->id }}">{{$paciente->nombres. " ".$paciente->apellidos}} </option>
                        
                    @endforeach   
        </x-adminlte-select>

        
        <div class="form-group">
            <x-adminlte-input type="date" name="fecha_visita" id="fecha_visita" label="Fecha de diagnóstico" placeholder="Fecha de diagnóstico" label-class="text-lightblue" value="{{ ('fecha_visita') }}">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-calendar-alt text-warning"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>


       

        {{-- Área de texto enriquecido para diagnóstico --}}

        @php
        $config = [
        "height" => "300", // Altura del editor
        "toolbar" => [
            // Definición de grupos y botones del toolbar
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
            ],
        ]
        @endphp

        <x-adminlte-text-editor name="detalle" label="Detalles médicos del paciente." label-class="text-lightblue"
        igroup-size="sm" placeholder="Describa los triajes realizados..." :config="$config"/>
        

         
        {{-- Button with types --}}
        <!--/*return url*/-->
        <div class="form group"> 
            <a class="btn btn-flat btn-primary" href="{{url('historiales') }}"> Regresar </a>
            
            <x-adminlte-button class="btn-flat" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save"/>
        </div>
    </x-adminlte-card>
</form>


@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')



   
@endpush