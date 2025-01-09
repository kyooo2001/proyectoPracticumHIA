@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Hospital Isidro Ayora')
@section('content_header_subtitle', 'Bienvenido a los servicios del Hospital Isidro Ayora.')

{{-- Content body: main page content --}}


@section('content_body')
{{-- On the blade file... --}}
<x-adminlte-small-box title="Panel Principal" text="Cuerpo de mensaje" icon="fas fa-h-square"/>

{{-- Widget... --}}
<x-adminlte-info-box title="{{$total_usuarios}}" text="Usuarios registrados" icon="fas fa-lg fa-user-plus text-primary"
    theme="gradient-primary" icon-theme="white"/>


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