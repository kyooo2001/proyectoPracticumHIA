@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
<x-adminlte-small-box title="Listado de reservas" text="Listado de reservas médicas." icon="fas fa-h-square"/>
@stop

@section('content')
{{-- On the blade file... --}}
@if ($message = Session::get('mensaje'))
<script> alert('{{$message}}');</script>
  
@endif

{{-- Setup data for datatables --}}

  
   @php
    $heads = [
        'ID',
        'Doctor',
        'Especialidad',
        'Fecha reservada',
        'Hora reservada',
        'Fecha y hora de registro',
        ['label' => 'Actions', 'no-export' => true, 'width' => 15],
        
        
    ];

   
    $btnEdit = '';
    $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                      <i class="fa fa-lg fa-fw fa-trash"></i>
                  </button>';
    
    $btnDetails = '';
                  
   
              

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
    <x-adminlte-datatable id="table11" :heads="$heads" head-theme="light" :config="$config"
    striped hoverable bordered compressed>
    @php $contador = 1; @endphp
        @foreach($eventos as $evento)
            <tr>
                <td>{{$contador++}}</td>
                <td>{{$evento->doctor->nombres." ".$evento->doctor->apellidos}}</td> {{--Concatena dos filas --}}
                <td>{{$evento->doctor->especialidad}}</td>
                <td>{{\Carbon\Carbon::parse($evento->start)->format('Y-m-d') }}</td>
                <td>{{\Carbon\Carbon::parse($evento->start)->format('H-i') }}</td>
                <td>{{($evento->created_at)}}</td>
               
                
                
                
                
                {{-- DESTROY data  --}}
                <td>
                    <form style="display: inline" action="{{route('home.destroy',$evento->id)}}" method="POST" class="formEliminar">
                      @csrf
                      @method('DELETE')
                      {!!$btnDelete!!}
                    </form>
                </td> 
                    
            </tr>
        @endforeach
        
    </x-adminlte-datatable>
    
  
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
        $('.formEliminar').submit(function(e) {
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
            });
        });
      });
    </script>

    
@stop