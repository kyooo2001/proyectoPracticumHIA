@extends('layouts.app')

@section('content_header')
<x-adminlte-small-box title="Asignar Permisos al Rol" text="Selecciona los permisos para el rol" icon="fas fa-user-shield"/>
@stop

@section('content_body')

<form action="{{ route('roles.update', $role) }}" method="post">
    @csrf
    @method("PUT")

    <div class="card">
        <div class="card-header">
            <p>{{ $role->name }}</p>
        </div>
        <div class="card-body">
            {{-- Select2 para asignar permisos --}}
            @php
                $config = [
                    "placeholder" => "Seleccione los permisos...",
                    "allowClear" => true,
                    "closeOnSelect" => false, // Permite seleccionar múltiples opciones sin cerrar
                ];
            @endphp

            <x-adminlte-select2 name="permisos[]" id="permisos" label="Permisos"
                label-class="text-primary" :config="$config" multiple>
                @foreach ($permisos as $permiso)
                    <option value="{{ $permiso->id }}" 
                        {{ $role->hasPermissionTo($permiso->id) ? 'selected' : '' }}>
                        {{ $permiso->name }}
                    </option>
                @endforeach
            </x-adminlte-select2>

            {{-- Botón para enviar el formulario --}}
            <x-adminlte-button type="submit" label="Asignar Permisos" theme="primary" class="mt-3"/>
        </div>
    </div>
</form>


@stop

@push('css')
    {{-- Agregar estilos adicionales --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css">
@endpush

@push('js')
    {{-- Agregar scripts adicionales --}}
    <script>
        $(document).ready(function() {
            $('#permisos').select2({
                placeholder: "Seleccione los permisos...",
                allowClear: true
            });
        });
    </script>
        {{-- Add alert --}}
        @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}',
            });
        </script>
        @endif


@endpush
