@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
<x-adminlte-small-box title="Pacientes" text="Listado de pacientes." icon="fas fa-h-square"/>
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
      <a href="{{url('pacientes/create')}}" class="btn btn-primary btn-lg active" data-mdb-ripple-init role="button" aria-pressed="true">
        Crear nuevo paciente.
      </a>
    </div>
    <br>
  
   @php
    $heads = [
        'ID',
        'Nombres',
        'Apellidos',
        'CI',
        'Celular',
        ['label' => 'Correo', 'width' => 40],
        'Seguro medico',
        'Fecha de Nacimiento',
        'genero',
        'grupo_sanguineo',
        'alergias',
        'Ciudad',
        'Provincia',
        'Dirección',
        'contacto_emergencia',
        'observaciones',
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
    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="light" :config="$config"
    striped hoverable bordered compressed>
    @php $contador = 1; @endphp
        @foreach($pacientes as $paciente)
            <tr>
                <td>{{$contador++}}</td>
                <td>{{$paciente->nombres}}</td>
                <td>{{$paciente->apellidos}}</td>
                <td>{{$paciente->ci }}</td>
                <td>{{$paciente->celular }}</td>
                <td>{{$paciente->correo }}</td>
                <td>{{$paciente->seguro_medico }}</td>
                <td>{{$paciente->fecha_nacimiento }}</td>
                <td>{{$paciente->genero }}</td>
                <td>{{$paciente->grupo_sanguineo }}</td>
                <td>{{$paciente->alergias }}</td>
                <td>{{$paciente->ciudad }}</td>
                <td>{{$paciente->provincia }}</td>
                <td>{{$paciente->direccion }}</td>
                <td>{{$paciente->contacto_emergencia }}</td>
                <td>{{$paciente->observaciones }}</td>
                
                
                <td><a href= "{{route('pacientes.edit',$paciente)}}" class= "btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                  <i class="fa fa-lg fa-fw fa-pen"></i>
                </a>
                {{-- DESTROY data  --}}
              
                    <form style="display: inline" action="{{route('pacientes.destroy',$paciente)}}" method="POST" class="formEliminar">
                      @csrf
                      @method('DELETE')
                      {!!$btnDelete!!}
                    </form>
                  
                    <a href= "{{route('pacientes.show',$paciente)}}"  class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                      <i class="fa fa-lg fa-fw fa-eye"></i>
                    </a>
                </td>  
            </tr>
        @endforeach
        
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

