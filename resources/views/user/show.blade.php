@extends('layouts.app')

{{-- Customize layout sections --}}
@section('content_header')
<x-adminlte-small-box title="Usuarios" text="Información del usuario del sistema." icon="fas fa-h-square"/>
@stop

@section('content_header')

@stop

@section('content_body')
{{-- On the blade file... --}}
{{-- Minimal without header / body only --}}
{{--token for security by Laravel--}}

    @csrf
    <x-adminlte-card theme="lime" theme-mode="outline">
        
            {{-- With prepend slot BRINGS the data from user controller with the function show --}}
        <x-adminlte-input name="name" label="Nombre" placeholder="Nombre de usuario" label-class="text-lightblue" value="{{ $usuario->name }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="email" label="Email" placeholder="Correo electrónico" label-class="text-lightblue" type="email" value="{{ $usuario->email }}" readonly>
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-envelope text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        
        
         
        {{-- Button with types --}}
        <!--/*BUTTON TO return url INDEX View*/-->
        <div class="form group"> 
            <a class="btn btn-flat btn-primary" href="{{url('user/') }}"> Regresar </a>
            
            
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