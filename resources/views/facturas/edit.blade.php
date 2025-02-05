@extends('layouts.app')

{{-- Customize layout sections --}}
@section('content_header')
<x-adminlte-small-box title="Factura médica del paciente" text="Actualizar registro de la factura médica del paciente." icon="fas fa-h-square"/>
@stop

@section('content_header')

@stop

@section('content_body')
{{-- On the blade file... --}}
{{-- Minimal without header / body only --}}

<form action="{{route('facturas.update',$factura->id)}}" method="post">
    @csrf
    @method('PUT')
    <x-adminlte-card theme="navy" theme-mode="outline">
        
        {{-- Traer informacion del paciente --}}
       
       
        <x-adminlte-select name="paciente_id" label="Paciente" placeholder="Datos paciente" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user-injured text-primary"></i>
                </div>
            </x-slot>               
                    <option value="">Seleccione un paciente</option>
                    @foreach ($pacientes as $paciente)
                        <option value="{{ $paciente->id }}" {{$paciente->id == $factura->paciente_id ? 'selected':''}}>{{$paciente->nombres. " ".$paciente->apellidos}} </option>
                        
                    @endforeach   
        </x-adminlte-select>

        <x-adminlte-select name="doctor_id" label="Doctor" placeholder="Datos del doctor" label-class="text-lightblue">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user-injured text-primary"></i>
                </div>
            </x-slot>               
                    <option value="">Seleccione un doctor</option>
                    @foreach ($doctores as $doctor)
                        <option value="{{ $doctor->id }}" {{$doctor->id == $factura->doctor_id ? 'selected':''}}>{{$doctor->nombres. " ".$doctor->apellidos}} </option>
                        
                    @endforeach   
        </x-adminlte-select>

        
        <div class="form-group">
            <x-adminlte-input type="date" name="fecha_pago"  label="Fecha de la factura" placeholder="Fecha de la factura" label-class="text-lightblue" value="{{ $factura->fecha_pago }}">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-calendar-alt text-warning"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>

        <div class="form-group">
            <x-adminlte-input type="number" name="monto" label="Valor de la factura" placeholder="Valor de la factura" label-class="text-lightblue" value="{{ $factura->monto }}" step="0.01" min="0" oninput="validity.valid||(value='');">
                <x-slot name="prependSlot">
                    <div class="input-group-text">
                        <i class="fas fa-dollar-sign text-warning"></i>
                    </div>
                </x-slot>
            </x-adminlte-input>
        </div>



       

        {{-- Área de texto enriquecido para diagnóstico --}}

        @php
        $config = [
        "height" => "300", // Altura del editor
        "toolbar" => [
            // Definición de grupos y botones del toolbar
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
            ],
        ]
        @endphp

        <x-adminlte-text-editor name="descripcion" label="Detalles de la factura." label-class="text-lightblue"
        igroup-size="sm" placeholder="Describa los detalles de la factura..." :config="$config" >
            {{ old('descripcion', $factura->descripcion) }}
        </x-adminlte-text-editor>
        

         
        {{-- Button with types --}}
        <!--/*return url*/-->
        <div class="form group"> 
            <a class="btn btn-flat btn-primary" href="{{url('facturas/') }}"> Regresar </a>
            
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

@push('js')
    {{-- Incluir SweetAlert2 --}}
  

    {{-- Mostrar alertas de éxito o error --}}
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: '¡Error!',
                text: '{{ session('error') }}',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif

   
@endpush