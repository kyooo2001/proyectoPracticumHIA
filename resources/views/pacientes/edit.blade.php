@extends('layouts.app')

{{-- Customize layout sections --}}
@section('content_header')
<x-adminlte-small-box title="Paciente" text="Modificar paciente." icon="fas fa-h-square"/>
@stop

@section('content_header')

@stop

@section('content_body')
{{-- On the blade file... --}}
{{-- Minimal without header / body only --}}

<form action="{{route('pacientes.update',$paciente->id)}}" method="post">
    @csrf
    @method('PUT')
    <x-adminlte-card theme="lime" theme-mode="outline">
        
            {{-- With prepend slot --}}
        <x-adminlte-input name="nombres" label="Nombres" label-class="text-lightblue" value="{{$paciente->nombres }}">{{$paciente->nombres}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="apellidos" label="Apellidos" label-class="text-lightblue" value="{{$paciente->apellidos }}">{{$paciente->apellidos}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="ci" label="CI" label-class="text-lightblue" value="{{$paciente->ci }}">{{$paciente->ci}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-id-card text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="celular" label="Número móvil" label-class="text-lightblue" value="{{$paciente->celular }}">{{$paciente->celular}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-mobile text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="correo" label="Email" label-class="text-lightblue" type="email" value="{{$paciente->correo}}">{{$paciente->correo}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-envelope text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="seguro_medico" label="Seguro Médico" label-class="text-lightblue" value="{{$paciente->seguro_medico}}">{{$paciente->seguro_medico}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-notes-medical text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="fecha_nacimiento" label="Fecha de nacimiento" label-class="text-lightblue" value="{{$paciente->fecha_nacimiento }}">{{$paciente->fecha_nacimiento}}
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

        <x-adminlte-select name="grupo_sanguineo" label="Grupo Sanguíneo" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-tint text-danger"></i> <!-- Ícono  de grupo sanguíneo -->
                </div>
            </x-slot>
            <option value="A+" {{ $paciente->grupo_sanguineo == 'A+' ? 'selected' : '' }}>A+</option>
            <option value="A-" {{ $paciente->grupo_sanguineo == 'A-' ? 'selected' : '' }}>A-</option>
            <option value="B+" {{ $paciente->grupo_sanguineo == 'B+' ? 'selected' : '' }}>B+</option>
            <option value="B-" {{ $paciente->grupo_sanguineo == 'B-' ? 'selected' : '' }}>B-</option>
            <option value="AB+" {{ $paciente->grupo_sanguineo == 'AB+' ? 'selected' : '' }}>AB+</option>
            <option value="AB-" {{ $paciente->grupo_sanguineo == 'AB-' ? 'selected' : '' }}>AB-</option>
            <option value="O+" {{ $paciente->grupo_sanguineo == 'O+' ? 'selected' : '' }}>O+</option>
            <option value="O-" {{ $paciente->grupo_sanguineo == 'O-' ? 'selected' : '' }}>O-</option>
        </x-adminlte-select>
        

        <x-adminlte-input name="alergias" label="Alergias" label-class="text-lightblue" value="{{$paciente->alerguias}}">{{$paciente->alerguias}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-notes-medical text-danger"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        
        <x-adminlte-input name="ciudad" label="Ciudad" label-class="text-lightblue" value="{{$paciente->ciudad }}">{{$paciente->ciudad}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-city text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="provincia" label="Provincia" label-class="text-lightblue" value="{{$paciente->provincia }}">{{$paciente->provincia}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-map text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="direccion" label="Direccion" label-class="text-lightblue" value="{{$paciente->direccion }}">{{$paciente->direccion}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-route text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="contacto_emergencia" label="Contacto Emergencia" label-class="text-lightblue" value="{{$paciente->contacto_emergencia}}">{{$paciente->contacto_emergencia}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-envelope text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        
        <x-adminlte-input name="observaciones" label="Observaciones" label-class="text-lightblue" value="{{$paciente->observaciones}}">{{$paciente->observaciones}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-sticky-note text-warning"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        
       
         
        {{-- Button with types --}}
        <!--/*return url*/-->
        <div class="form group d-flex justify-content-between"> 
            <a class="btn btn-flat btn-primary" href="{{url('pacientes/') }}"> Regresar </a>
            
            <x-adminlte-button class="btn-flat" type="submit" label="Actualizar" theme="success" icon="fas fa-lg fa-save"/>
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
  
    @if(@session("message"))
    <script>
        $(document).ready(function(){
            let mensaje= "{{session ('message')}}";
            Swal.fire({
                'title': 'Resultado',
                'text': mensaje,
                'icon': 'success'
            });
        });

    </script>
    @endif


   
@endpush