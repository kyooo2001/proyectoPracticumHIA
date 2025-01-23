@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Hospital Isidro Ayora')
@section('content_header_subtitle', 'Bienvenido a los servicios del Hospital Isidro Ayora.')

{{-- Content body: main page content --}}


@section('content_body')
{{-- On the blade file... --}}



<x-adminlte-small-box title="Panel Principal " text="Bienvenido {{Auth::user()->email}}. Con rol {{Auth::user()->roles->pluck('name')->first()}}." icon="fas fa-h-square"/>



{{-- Un role requiere vistas--}}
@role('administrator')
<x-adminlte-info-box title="{{$total_usuarios}}" text="Usuarios registrados" icon="fas fa-lg fa-user-plus text-primary"
    theme="gradient-info" icon-theme="white"/>
@endrole

@role('administrator')    
<x-adminlte-info-box title="{{$total_secretarias}}" text="Usuarios secretaria registrados" icon="fas fa-lg fa-user-plus text-primary"
    theme="gradient-primary" icon-theme="white"/>   
@endrole

@role('administrator') 
<x-adminlte-info-box title="{{$total_pacientes}}" text="Pacientes registrados" icon="fas fa-lg fa-user-plus text-primary"
    theme="gradient-teal" icon-theme="white"/> 
@endrole  

@role('administrator') 
<x-adminlte-info-box title="{{$total_consultorios}}" text="Consultorios" icon="fas fa-lg fa-hospital-alt text-primary"
    theme="gradient-secondary" icon-theme="white"/>  
@endrole 
{{-- Varios roles requieren vistas--}}
@hasanyrole('administrator|doctor')
<x-adminlte-info-box title="{{$total_doctores}}" text="Doctores" icon="fas fa-lg fa-user-md text-primary"
    theme="gradient-success" icon-theme="white"/>  
@endhasanyrole 

@role('administrator')
<x-adminlte-info-box title="{{$total_horarios}}" text="Horarios" icon="fas fa-lg fa-calendar-alt text-purple"
    theme="gradient-purple" icon-theme="white"/>  
@endrole 
    
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