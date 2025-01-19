@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
<x-adminlte-small-box title="Horarios" text="Listado de horarios." icon="fas fa-h-square"/>
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
      <a href="{{url('horarios/create')}}" class="btn btn-primary btn-lg active" data-mdb-ripple-init role="button" aria-pressed="true">
        Crear nuevo horario.
      </a>
    </div>
    <br>
   
   @php
    $heads = [
        'ID',
        'Nombres',
        'Apellidos',
        'Especialidad',
        'Día de Consultas',
        'Hora Inicio',
        'Hora Fin',
        'Consultorio',
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
        @foreach($horarios as $horario)
            <tr>
                <td>{{$contador++}}</td>
                <td>{{$horario->doctor->nombres}}</td>
                <td>{{$horario->doctor->apellidos}}</td>
                <td>{{$horario->doctor->especialidad}}</td>
                <td>{{$horario->dia}}</td>
                <td>{{$horario->hora_inicio }}</td>
                <td>{{$horario->hora_final }}</td>
                <td>{{$horario->consultorio->nombre}}</td>
                 {{-- Botón Editar --}}
                <td><a href= "{{route('horarios.edit',$horario->id)}}" class= "btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                  <i class="fa fa-lg fa-fw fa-pen"></i>
                </a>
                {{-- DESTROY data  --}}
              
                    <form style="display: inline" action="{{route('horarios.destroy',$horario->id)}}" method="POST" class="formEliminar">
                      @csrf
                      @method('DELETE')
                      {!!$btnDelete!!}
                    </form>
                   {{-- Botón Detalles --}}
                    <a href= "{{route('horarios.show',$horario->id)}}"  class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                      <i class="fa fa-lg fa-fw fa-eye"></i>
                    </a>
                </td>  
            </tr>
        @endforeach
        
    </x-adminlte-datatable>

  </div>  
</div>

{{-- Setup data for datatables to horarios --}}
<div class="card">
  <div class="card-body">
    <div class="text-right">
      <a href="{{url('#')}}" class="btn btn-primary btn-lg active" data-mdb-ripple-init role="button" aria-pressed="true">
        Calendario de doctores.
      </a>
    </div>
    <br>

    
<div class="card">
  <div class="card-body">
    
    <br>
  
   @php
    $heads = [
        'Hora',
        'Lunes',
        'Martes',
        'Miércoles',
        'Jueves',
        'Viernes',
        'Sábado',
        'Domingo',     
        
    ];

   
    $btnEdit = '';
    $btnDelete = '';
    
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
    <x-adminlte-datatable id="table2" :heads="$heads" head-theme="light" :config="$config"
    striped hoverable bordered compressed>
    {{-- recorrido de horarios--}}
   
    @php 
    $horas = ['08:00 - 09:00', '10:00 - 11:00', '12:00 - 13:00', '14:00 - 15:00','16:00 - 17:00'];
    $semana = ['Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo'];
    @endphp

    @foreach ($horas as $hora)
    @php 
        list($hora_inicio,$hora_final)= explode(' - ',$hora);
    @endphp
    <tr> 
      <td>{{$hora}}</td> 
      @foreach ($semana as $dia)
        @php 
        $nombre_doctor = ''; 
        foreach ($horarios as $horario) {
          $hora_inicio_obj = new \DateTime($hora_inicio);
          $hora_final_obj = new \DateTime($hora_final);
          $hora_inicio_horario = new \DateTime($horario->hora_inicio);
          $hora_final_horario = new \DateTime($horario->hora_final);

              if (strtoupper($horario->dia) === strtoupper($dia) &&
                  $hora_inicio_obj >= $hora_inicio_horario &&
                  $hora_final_obj <= $hora_final_horario) {
                  $nombre_doctor = $horario->doctor->nombres;
                  // Concatenar nombre y apellido
                  $nombre_doctor = $horario->doctor->nombres . ' ' . $horario->doctor->apellidos;
                  break;
              }

        }
         
        @endphp
        <td> {{$nombre_doctor}}</td>
      @endforeach 
      

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