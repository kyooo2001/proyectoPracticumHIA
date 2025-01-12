@extends('layouts.app')

{{-- Customize layout sections --}}
@section('content_header')
<x-adminlte-small-box title="Pacientes" text="Registro de pacientes." icon="fas fa-h-square"/>
@stop

@section('content_header')

@stop

@section('content_body')
{{-- On the blade file... --}}
{{-- Minimal without header / body only --}}

<form action="{{route('pacientes.store')}}" method="post">
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

        <x-adminlte-input name="correo" label="Email" placeholder="Correo electrónico" label-class="text-lightblue" type="email" value="{{ old('correo') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-envelope text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="seguro_medico" label="Seguro Médico" placeholder="Nombre Seguro Medico" label-class="text-lightblue" value="{{ old('seguro_medico') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-notes-medical text-lightblue"></i>
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

        <x-adminlte-select name="genero" label="Género" placeholder="Hombre / Mujer" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-venus-mars text-lightblue"></i>
                </div>
            </x-slot>
            <option value="">Seleccione un género</option>
                <option value="Masculino" {{ old('genero') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="Femenino" {{ old('genero') == 'Femenino' ? 'selected' : '' }}>Femenino</option>
        </x-adminlte-select>

        <x-adminlte-select name="grupo_sanguineo" label="Grupo Sanguíneo" placeholder="A+, etc" label-class="text-lightblue" value="{{ old('grupo_sanguineo') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-tint text-danger"></i>
                </div>
            </x-slot>
            <option value="">Seleccione un grupo</option>
                <option value="A+" {{ old('grupo_sanguineo') == 'A+' ? 'selected' : '' }}>A+</option>
                <option value="A-" {{ old('grupo_sanguineo') == 'A-' ? 'selected' : '' }}>A-</option>
                <option value="B+" {{ old('grupo_sanguineo') == 'B+' ? 'selected' : '' }}>B+</option>
                <option value="B-" {{ old('grupo_sanguineo') == 'B-' ? 'selected' : '' }}>B-</option>
                <option value="AB+" {{ old('grupo_sanguineo') == 'AB+' ? 'selected' : '' }}>AB+</option>
                <option value="AB-" {{ old('grupo_sanguineo') == 'AB-' ? 'selected' : '' }}>AB-</option>
                <option value="O+" {{ old('grupo_sanguineo') == 'O+' ? 'selected' : '' }}>O+</option>
                <option value="O-" {{ old('grupo_sanguineo') == 'O-' ? 'selected' : '' }}>O-</option>
        </x-adminlte-select>

        <x-adminlte-input name="alergias" label="Alergias" placeholder="Describa las alergias" label-class="text-lightblue" value="{{ old('alergias') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-notes-medical text-danger"></i>
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


        <x-adminlte-input name="contacto_emergencia" label="Contacto de emergencia" placeholder="Nombre y numero celular del contacto de emergencia" label-class="text-lightblue" value="{{ old('contacto_emergencia') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-envelope text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="observaciones" label="Observaciones" placeholder="Tiene observaciones?" label-class="text-lightblue" type="text" value="{{ old('observaciones') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-sticky-note text-warning"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
              
        
         
        {{-- Button with types --}}
        <!--/*return url*/-->
        <div class="form group"> 
            <a class="btn btn-flat btn-primary" href="{{url('pacientes/') }}"> Regresar </a>
            
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