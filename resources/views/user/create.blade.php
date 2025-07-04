@extends('layouts.app')

{{-- Customize layout sections --}}
@section('content_header')
<x-adminlte-small-box title="Usuarios" text="Crear nuevo usuario del sistema." icon="fas fa-h-square"/>
@stop

@section('content_header')

@stop

@section('content_body')
{{-- On the blade file... --}}
{{-- Minimal without header / body only --}}

<form action="{{route('user.store')}}" method="post">
    {{--token for security by Laravel--}}
    @csrf
    <x-adminlte-card theme="lime" theme-mode="outline">
        
            {{-- With prepend slot --}}
        <x-adminlte-input name="name" label="Nombre" placeholder="Nombre de usuario" label-class="text-lightblue" value="{{ old('name') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
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
        <!--/*Button return url*/-->
        <div class="form group"> 
            <a class="btn btn-flat btn-primary" href="{{url('user/') }}"> Regresar </a>
            {{--Button for save data on function store in the controller--}}
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