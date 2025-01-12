@extends('layouts.app')

{{-- Customize layout sections --}}
@section('content_header')
<x-adminlte-small-box title="Consultorio" text="Modificar información del consultorio." icon="fas fa-h-square"/>
@stop

@section('content_header')

@stop

@section('content_body')
{{-- On the blade file... --}}
{{-- Minimal without header / body only --}}

<form action="{{route('consultorios.update',$consultorio->id)}}" method="post">
    @csrf
    @method('PUT')
    <x-adminlte-card theme="lime" theme-mode="outline">
        
            {{-- With prepend slot --}}
        <x-adminlte-input name="nombre" label="Nombres" label-class="text-lightblue" value="{{$consultorio->nombre }}">{{$consultorio->nombre}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-hospital-alt text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>
        <x-adminlte-input name="especialidad" label="Especialidad" label-class="text-lightblue" value="{{$consultorio->especialidad }}">{{$consultorio->especialidad}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-stethoscope text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-select name="estado" label="Estado" placeholder="Operativo / Mantenimiento" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-radiation text-danger"></i>
                </div>
            </x-slot>
            <option value="">Seleccione un estado</option>
                <option value="Operativo" {{ old('estado') == 'Operativo' ? 'selected' : '' }}>Operativo</option>
                <option value="Mantenimiento" {{ old('estado') == 'Mantenimiento' ? 'selected' : '' }}>Mantenimiento</option>
        </x-adminlte-select>

        <x-adminlte-input name="telefono" label="Número telefónico" label-class="text-lightblue" value="{{$consultorio->telefono }}">{{$consultorio->telefono}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-phone-square text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="capacidad" label="Email" label-class="text-lightblue" value="{{$consultorio->capacidad}}">{{$consultorio->capacidad}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-hand-holding-medical text-info"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        
       
         
        {{-- Button with types --}}
        <!--/*return url*/-->
        <div class="form group d-flex justify-content-between"> 
            <a class="btn btn-flat btn-primary" href="{{url('consultorios/') }}"> Regresar </a>
            
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