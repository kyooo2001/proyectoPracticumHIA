@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
<x-adminlte-small-box title="Usuarios" text="Listado de usuarios del sistema." icon="fas fa-h-square"/>
@stop

@section('content')
{{-- On the blade file message if session is '$message'... --}}
@if ($message = Session::get('mensaje'))
<script> alert('{{$message}}');</script>
  
@endif

{{-- Setup data for datatables --}}
@can('Edit')
<div class="card">
  <div class="card-body">
    <div class="text-right">
      <a href="{{url('user/create')}}" class="btn btn-primary btn-lg active" data-mdb-ripple-init role="button" aria-pressed="true">
        Crear un nuevo usuario
      </a>
    </div>
    <br>
  @endcan
   @php
    $heads = [
        'ID',
        'Name',
        ['label' => 'email', 'width' => 40],
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
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{$contador++}}</td>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->email}}</td>
                {{--BUTTON EDIT DETAILS USER AND RETURN EDIT VIEW--}}
                <td><a href= "{{route('user.edit',$usuario)}}" class= "btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                  <i class="fa fa-lg fa-fw fa-pen"></i>
                </a>
                {{-- BUTTON DESTROY data  --}}
                    @hasanyrole('administrator')
                    <form style="display: inline" action="{{route('user.destroy',$usuario)}}" method="POST" class="formEliminar">
                      @csrf
                      @method('delete')
                      {!!$btnDelete!!}
                    </form>
                    @endhasanyrole
                    {{--BUTTON VIEW DETAILS USER AND RETURN SHOW VIEW--}}
                    <a href= "{{route('user.show',$usuario)}}"  class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
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
        $('.formEliminar').submit(function(e){
          e.preventDefault();
          Swal.fire({
            title: "Esta seguro?",
            text: "No podrá revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, borrarlo!"
            }).then((result) => {
              if (result.isConfirmed) {
                this.submit();
                
              }
            })
        })
      })
    </script>

    
@stop
