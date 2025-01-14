@extends('layouts.app')

{{-- Customize layout sections --}}
@section('content_header')
<x-adminlte-small-box title="Doctor" text="Modificar información del doctor." icon="fas fa-h-square"/>
@stop

@section('content_header')

@stop

@section('content_body')
{{-- On the blade file... --}}
{{-- Minimal without header / body only --}}

<form action="{{route('doctores.update',$doctor->id)}}" method="post">
    @csrf
    @method('PUT')
    <x-adminlte-card theme="lime" theme-mode="outline">
        
            {{-- With prepend slot --}}
        <x-adminlte-input name="nombres" label="Nombres" label-class="text-lightblue" value="{{$doctor->nombres }}">{{$doctor->nombres}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user-md text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="apellidos" label="Apellidos" label-class="text-lightblue" value="{{$doctor->apellidos }}">{{$doctor->apellidos}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user-md text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="celular" label="Número celular" label-class="text-lightblue" value="{{$doctor->celular }}">{{$doctor->celular}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-mobile-alt text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="licencia_medica" label="Licencia médica" label-class="text-lightblue" value="{{$doctor->licencia_medica }}">{{$doctor->licencia_medica}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-address-card text-danger"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="especialidad" label="Especialidad" label-class="text-lightblue" value="{{$doctor->especialidad}}">{{$doctor->especialidad}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-stethoscope text-info"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="email" label="Email" label-class="text-lightblue" type="email" value="{{$doctor->user->email}}">{{$doctor->user->email}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-envelope text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        
        <x-adminlte-input name="password" label="Password" placeholder="Contraseña solo llenar si desea actualizarla" label-class="text-lightblue" type="password">
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
        <div class="form group d-flex justify-content-between"> 
            <a class="btn btn-flat btn-primary" href="{{url('doctores/') }}"> Regresar </a>
            
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