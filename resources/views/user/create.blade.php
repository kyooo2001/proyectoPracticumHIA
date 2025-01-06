@extends('layouts.app')

{{-- Customize layout sections --}}


@section('content_header')
{{-- Content body: main page content --}}
<x-adminlte-small-box title="Crear usuario" text="Registro de un nuevo usuario" icon="fas fa-h-square"/>
@stop

@section('content_body')
{{-- On the blade file... --}}
{{-- Minimal without header / body only --}}
    <x-adminlte-card theme="lime" theme-mode="outline">
        Lllene los datos
    </x-adminlte-card>
        

    

@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
   
@endpush