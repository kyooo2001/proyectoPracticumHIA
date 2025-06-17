@extends('layouts.app')

{{-- Customize layout sections --}}
@section('content_header')
    <x-adminlte-small-box title="Secretaria" text="Modificar usuarios secretaria." icon="fas fa-h-square" />
@stop

@section('content_header')

@stop

@section('content_body')
    {{-- On the blade file... --}}
    {{-- Minimal without header / body only --}}

    <form action="{{ route('secretarias.update', $secretaria->id) }}" method="post">
        @csrf
        @method('PUT')
        <x-adminlte-card theme="lime" theme-mode="outline">

            {{-- With prepend slot --}}
            <x-adminlte-input name="nombres" label="Nombres" label-class="text-lightblue"
                value="{{ $secretaria->nombres }}">{{ $secretaria->nombres }}
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-user text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
            <x-adminlte-input name="apellidos" label="Apellidos" label-class="text-lightblue"
                value="{{ $secretaria->apellidos }}">{{ $secretaria->apellidos }}
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-user text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            <x-adminlte-input name="ci" label="CI" label-class="text-lightblue"
                value="{{ $secretaria->ci }}">{{ $secretaria->ci }}
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-id-card text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            <x-adminlte-input name="celular" label="Número móvil" label-class="text-lightblue"
                value="{{ $secretaria->celular }}">{{ $secretaria->celular }}
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-mobile text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            <x-adminlte-input name="fecha_nacimiento" label="Fecha de nacimiento" label-class="text-lightblue"
                value="{{ $secretaria->fecha_nacimiento }}">{{ $secretaria->fecha_nacimiento }}
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-calendar text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            <x-adminlte-input name="ciudad" label="Ciudad" label-class="text-lightblue"
                value="{{ $secretaria->ciudad }}">{{ $secretaria->ciudad }}
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-city text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            <x-adminlte-input name="provincia" label="Provincia" label-class="text-lightblue"
                value="{{ $secretaria->provincia }}">{{ $secretaria->provincia }}
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-map text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            <x-adminlte-input name="direccion" label="Direccion" label-class="text-lightblue"
                value="{{ $secretaria->direccion }}">{{ $secretaria->direccion }}
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-route text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            <x-adminlte-input name="email" label="Email" label-class="text-lightblue" type="email"
                value="{{ $secretaria->user->email }}">{{ $secretaria->user->email }}
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-envelope text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            <x-adminlte-input name="password" label="Password" placeholder="Contraseña solo llenar si desea actualizarla"
                label-class="text-lightblue" type="password">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-lock text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            <x-adminlte-input name="password_confirmation" id="password_confirmation" label="Password verify"
                placeholder="Verificar contraseña" label-class="text-lightblue" type="password">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-lock text-lightblue"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>

            {{-- Button with types --}}
            <!--/*return url*/-->
            <div class="form group">
                <a class="btn btn-flat btn-primary" href="{{ url('secretarias/') }}"> Regresar </a>
                {{-- Button send data update --}}
                <x-adminlte-button class="btn-flat" type="submit" label="Actualizar" theme="success"
                    icon="fas fa-lg fa-save" />
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

    @if (@session('message'))
        <script>
            $(document).ready(funtion() {
                let mensaje = "{{ session('message') }}";
                Swal.fire({
                    'title': 'Resultado',
                    'text': mensaje,
                    'icon': 'success'
                })
            })
        </script>
    @endif



@endpush
