@extends('layouts.app')

{{-- Customize layout sections --}}
@section('content_header')
<x-adminlte-small-box title="Usuarios" text="Modificar usuarios del sistema." icon="fas fa-h-square"/>
@stop

@section('content_header')

@stop

@section('content_body')
{{-- On the blade file... --}}
{{-- Minimal without header / body only --}}
{{-- CONCATENATE THE VARIABLE $usuario WITH THE -> ID OF THE USER TABLE --}}
<form action="{{route('user.update',$usuario->id)}}" method="post">
    {{--token for security by Laravel--}}
    @csrf
    {{--SEND THE DATA METHOD PUT--}}
    @method('PUT')
    <x-adminlte-card theme="lime" theme-mode="outline">
        
            {{-- With prepend slot BRINGS the data from user controller with the function EDIT--}}
        <x-adminlte-input name="name" label="Nombre" label-class="text-lightblue" value="{{$usuario->name }}">{{$usuario->name}}
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-input name="email" label="Email" label-class="text-lightblue" type="email" value="{{$usuario->email}}">{{$usuario->email}}
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
        <div class="form group"> 
            <a class="btn btn-flat btn-primary" href="{{url('user/') }}"> Regresar </a>
            {{--Button for save data on function UPDATE in the controller--}}
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
        $(document).ready(funtion(){
            let mensaje= "{{session ('message')}}";
            Swal.fire({
                'title': 'Resultado',
                'text': mensaje,
                'icon': 'success'
            })
        })

    </script>
    @endif


   
@endpush