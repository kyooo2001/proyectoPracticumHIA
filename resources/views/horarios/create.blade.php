@extends('layouts.app')

{{-- Customize layout sections --}}
@section('content_header')
<x-adminlte-small-box title="Horarios" text="Registro de nuevo horario." icon="fas fa-h-square"/>
@stop

@section('content_header')

@stop

@section('content_body')
{{-- On the blade file... --}}
{{-- Minimal without header / body only --}}

<form action="{{route('horarios.store')}}" method="post">
    @csrf
    <x-adminlte-card theme="lime" theme-mode="outline">
        
            {{-- With prepend slot --}}
        <x-adminlte-select name="dia" label="Día" placeholder="Lunes, etc" label-class="text-lightblue" value="{{ old('dia') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-calendar-alt text-warning"></i>
                </div>
            </x-slot>
                <option value="">Seleccione un día</option>
                    <option value="Lunes" {{ old('dia') == 'Lunes' ? 'selected' : '' }}>Lunes</option>
                    <option value="Martes" {{ old('dia') == 'Martes' ? 'selected' : '' }}>Martes</option>
                    <option value="Miércoles" {{ old('dia') == 'Miércoles' ? 'selected' : '' }}>Miércoles</option>
                    <option value="Jueves" {{ old('dia') == 'Jueves' ? 'selected' : '' }}>Jueves</option>
                    <option value="Viernes" {{ old('dia') == 'Viernes' ? 'selected' : '' }}>Viernes</option>
                    <option value="Sábado" {{ old('dia') == 'Sábado' ? 'selected' : '' }}>Sábado</option>
                    <option value="Domingo" {{ old('dia') == 'Domingo' ? 'selected' : '' }}>Domingo</option>
                    
        </x-adminlte-select>    

        <x-adminlte-input name="hora_inicio" label="Hora de Inicio" placeholder="Horario" label-class="text-lightblue" type="time" value="{{ old('hora_inicio') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-clock text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>


        <x-adminlte-input name="hora_final" label="Hora Final" placeholder="Horario final" label-class="text-lightblue" type="time" value="{{ old('hora_final') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-clock text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        <x-adminlte-select name="doctor_id" label="Doctores" placeholder="Doctor" label-class="text-lightblue" value="{{ old('doctor_id') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user-md text-danger"></i>
                </div>
            </x-slot>
                <option value="">Seleccione un doctor</option>
                    @foreach($doctores as $doctor)
                        <option value="{{$doctor->id}}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>{{$doctor->nombres}} {{ $doctor->apellidos }}</option>
                    @endforeach
        </x-adminlte-select>

        <x-adminlte-select name="consultorio_id" label="Consultorio" placeholder="Consultorio" label-class="text-lightblue" value="{{ old('consultorio_id') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-hospital-alt text-primary"></i>
                </div>
            </x-slot>
                 <option value="">Seleccione un consultorio</option>
                     @foreach($consultorios as $consultorio)
                        <option value="{{$consultorio->id}}" {{ old('consultorio_id') == $consultorio->id ? 'selected' : '' }}>{{$consultorio->nombre}} - {{ $consultorio->especialidad }}</option>
                     @endforeach
                    
        </x-adminlte-select>    


              
        
         
        {{-- Button with types --}}
        <!--/*return url*/-->
        <div class="form group"> 
            <a class="btn btn-flat btn-primary" href="{{url('horarios/') }}"> Regresar </a>
            
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