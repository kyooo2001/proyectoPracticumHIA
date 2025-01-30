@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
<x-adminlte-small-box title="Historial médico" text="Listado de historial médico." icon="fas fa-h-square"/>
@stop

@section('content')
{{-- On the blade file... --}}
@if ($message = Session::get('mensaje'))
<script> alert('{{$message}}');</script>
  
@endif

{{-- Setup data for datatables --}}
<div class="card">
  <div class="card-body">
    <div class="text-right">
      <a href="{{url('historiales/create')}}" class="btn btn-primary btn-lg active" data-mdb-ripple-init role="button" aria-pressed="true">
        Crear una historia médica.
      </a>
    </div>
    <br>
  
   @php
    $heads = [
        'ID',
        'Paciente',
        'Fecha de diagnóstico',
        'Detalles del diagnóstico',
        
      
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
 {{-- Div para los botones de exportación --}}
    {{-- Minimal example / fill data using the component slot --}}
    <x-adminlte-datatable id="table14" :heads="$heads" head-theme="light" :config="$config"
    striped hoverable bordered compressed>
    @php $contador = 1; @endphp
    @if(Auth::check() && Auth::user()->doctor) {{-- Verifica que el usuario está autenticado y tiene relación con doctor --}}  
            @foreach($historiales as $historials)
                @if($historials->doctor_id == Auth::user()->doctor->id) {{-- Valida el historial con id del doctor --}}
                    <tr>
                        <td>{{$contador++}}</td>
                        <td>
                        @if ($historials->paciente)
                            {{$historials->paciente->apellidos . " " . $historials->paciente->nombres}}
                        @else
                            <span class="text-danger">Sin datos del paciente</span>
                        @endif
                        </td>
                        <td>{{$historials->fecha_visita}}</td>
                        <td>{!! $historials->detalle ? Str::limit($historials->detalle, 200, '...') : 'N/A' !!}</td>
                        
                        <td><a href= "{{route('historiales.edit',$historials)}}" class= "btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                        {{-- DESTROY data  --}}
                    
                            <form style="display: inline" action="{{route('historiales.destroy',$historials)}}" method="POST" class="formEliminar">
                            @csrf
                            @method('delete')
                            {!!$btnDelete!!}
                            </form>
                       
                            <a href= "{{route('historiales.show',$historials)}}"  class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>
                            {{-- Botón de impresión que redirige a reporteh --}}
                            <a href="{{ route('historiales.reporteh', $historials->id) }}" class="btn btn-xs btn-warning text-dark mx-1 shadow" title="Print Report">
                              <i class="fa fa-lg fa-fw fa-print"></i>
                          </a>
                            
                        </td>  
                    </tr>
                @endif
            @endforeach
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

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">


@stop

@section('js')
    
    
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    
    {{-- Add sweetalert2 --}}
    <script>
      $(document).ready(function(){
        $('.formEliminar').submit(function(e){
          e.preventDefault();
          Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
              if (result.isConfirmed) {
                this.submit();
                
              }
            })
        })
      })
    </script>

    
@stop
