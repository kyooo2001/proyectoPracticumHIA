@extends('layouts.app')

{{-- Customize layout sections --}}
@section('content_header')
<x-adminlte-small-box title="Secretaria" text="Registro de usuario secretaria." icon="fas fa-h-square"/>
@stop

@section('content_header')

@stop

@section('content_body')
{{-- On the blade file... --}}
{{-- Minimal without header / body only --}}

<form action="{{route('secretarias.store')}}" method="post">
    @csrf
    <x-adminlte-card theme="lime" theme-mode="outline">
        
            {{-- With prepend slot --}}
        <x-adminlte-input name="nombres" label="Nombres" placeholder="Nombres" label-class="text-lightblue" value="{{ old('nombres') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="apellidos" label="Apellidos" placeholder="Apellidos" label-class="text-lightblue" value="{{ old('apellidos') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="ci" label="CI" placeholder="1234567890" label-class="text-lightblue" value="{{ old('ci') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-id-card text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="celular" label="Numero móvil" placeholder="0912345678" label-class="text-lightblue" value="{{ old('celular') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-mobile text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="fecha_nacimiento" label="Fecha de nacimiento" placeholder="Nombre de usuario" label-class="text-lightblue" type="date" value="{{ old('fecha_nacimiento') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-calendar text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="ciudad" label="Ciudad" placeholder="Ciudad donde recide" label-class="text-lightblue" value="{{ old('ciudad') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-city text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="provincia" label="Provincia" placeholder="Provincia" label-class="text-lightblue" value="{{ old('provincia') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-map text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="direccion" label="Dirección" placeholder="Dirección donde recide" label-class="text-lightblue" value="{{ old('direccion') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-route text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>


        <x-adminlte-input name="email" label="Email" placeholder="Correo electrónico" label-class="text-lightblue" type="email" value="{{ old('email') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-envelope text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
              
        <x-adminlte-input name="password" label="Password" placeholder="Contraseña" label-class="text-lightblue" type="password">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-lock text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
              
        <x-adminlte-input name="password_confirmation" id="password_confirmation" label="Password verify" placeholder="Verificar contraseña" label-class="text-lightblue" type="password">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-lock text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
         
        {{-- Button with types --}}
        <!--/*return url*/-->
        <div class="form group"> 
            <a class="btn btn-flat btn-primary" href="{{url('secretarias/') }}"> Regresar </a>
            
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