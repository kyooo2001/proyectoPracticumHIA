@extends('layouts.app')

@section('content_header')
    <x-adminlte-small-box title="Asignar Rol al usuario" text="Selecciona un rol para el usuario" icon="fas fa-user-shield" />
@stop

@section('content_body')

    {{-- Mostrar alerta si hay un mensaje en la sesión --}}


    <form action="{{ route('asignar.update', $user) }}" method="post">
        @csrf
        @method('PUT')
        {{-- Bring the user to asign rol --}}
        <div class="card card-info">
            <div class="card-header">
                {{-- <p>{{ $user->name }}</p> --}}
                <h2 class="card-title">Usuario {{ $user->name }}</h2>
            </div>
            <div class="card-body">
                {{-- Select2 para asignar roles --}}
                @php
                    $config = [
                        'placeholder' => 'Seleccione los roles...',
                        'allowClear' => true,
                        'closeOnSelect' => false, // Permite seleccionar múltiples opciones sin cerrar
                    ];
                @endphp

                <x-adminlte-select2 name="roles[]" id="roles" label="Roles" label-class="text-primary" :config="$config"
                    multiple>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->hasAnyRole($role->id) ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </x-adminlte-select2>

                {{-- Botón para enviar el formulario --}}
                <x-adminlte-button type="submit" label="Asignar Roles" theme="primary" class="mt-3" />
                {{-- Botón para regresar 
                <a href="{{ route('asignar.index') }}" class="btn btn-secondary mt-3 ml-2">
                    <i class="fas fa-arrow-left"></i> Regresar
                </a> --}}

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
            $('#roles').select2({
                placeholder: "Seleccione los roles...",
                allowClear: true,
                closeOnSelect: false // Mantener abierto el dropdown al seleccionar
            });
        });
    </script>
@endpush
