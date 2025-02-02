@extends('layouts.app')

{{-- Customize layout sections --}}
@section('content_header')
<x-adminlte-small-box title="Reporte Historial Médico" text="Reporte del historial médico de los pacientes." icon="fas fa-h-square"/>
@stop

@section('content_header')

@stop

@section('content_body')
{{-- On the blade file... --}}
{{-- Minimal without header / body only --}}

<form action="{{route ('reportes.buscar_paciente')}}" method="get">
    
        <x-adminlte-card theme="info" theme-mode="outline">
            
            {{-- Traer informacion del paciente --}}
                
            <div class="form-group">
                <x-adminlte-input name="ci" label="Número de cédula" placeholder="Número de cédula" label-class="text-lightblue" value="{{ old('ci') }}">
                    <x-slot name="prependSlot">
                        <div class="input-group-text">
                            <i class="fas fa-calendar-alt text-warning"></i>
                        </div>
                    </x-slot>
                </x-adminlte-input>
            </div>
            
            {{-- Button with types --}}
            <!--/*return url*/-->
            <div class="form-group"> 
                <x-adminlte-button class="btn-flat" type="submit" label="Buscar" theme="info" icon="fas fa-lg fa-save"/>
            </div>
        </x-adminlte-card>
</form>
<hr>
    <div class="card">
        <h5 class="card-header text-lightblue"> Información del paciente</h5>
    <div class="card-body">
{{-- Setup data for datatables --}}
    <div class="card">
        <div class="card-body">
                @php
                $heads = [
                    'ID',
                    'Paciente',
                    'Número de cédula',
                    'Fecha de nacimiento',
                    
                    
                    ['label' => 'Actions', 'no-export' => true, 'width' => 15],
                ];
            
                
                $btnEdit = '';
                $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                    <i class="fa fa-lg fa-fw fa-trash"></i>
                                </button>';
                
                $btnDetails = '';
                $btnPrint = '';
                                
                
                            
            
                // Configuración para habilitar los botones de exportación
                
                $config = [
                    
                    'dom' => 'Blfrtip',  // Mover los botones de exportación a la parte superior
                    'buttons' => [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    'responsive' => true,
                
                ];
                
                @endphp
            {{-- Tabla traer historial --}}
                <x-adminlte-datatable id="table15" :heads="$heads" head-theme="light" :config="$config"
                striped hoverable bordered compressed>
                    @php $contador = 1; @endphp
                        @if(Auth::check() && Auth::user()->doctor) {{-- Verifica que el usuario está autenticado y tiene relación con doctor --}}
                                <tr>
                                    <td>{{ $contador++ }}</td>
                                    <td>
                                        @if ($paciente)
                                            {{ $paciente->apellidos . ' ' . $paciente->nombres }}
                                        </td>
                                        <td>{{ $paciente->ci }}</td>
                                        <td>{{ $paciente->fecha_nacimiento }}</td>
                                        {{-- Botón de impresión que redirige a print_paciente --}}
                                        <td>
                                            <a href="{{ route('reportes.print_historial', $paciente->id) }}" class="btn btn-xs btn-warning text-dark mx-1 shadow" title="Print Report">
                                                <i class="fa fa-lg fa-fw fa-print"></i>
                                            </a>
                                        </td>
                                        @else
                                            <span class="text-danger">Sin datos del paciente</span>
                                        @endif
                                    </td>
                                </tr>
                        @else
                            <tr>
                                <td colspan="5" class="text-center text-danger">
                                    No tienes permisos para acceder a este contenido.
                                </td>
                            </tr>
                        @endif 
                                
                    </x-adminlte-datatable>
            </div>
    </div>
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')



   
@endpush