@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
<x-adminlte-small-box title="Roles" text="Roles del sistema." icon="fas fa-h-square"/>
@stop

@section('content')
{{-- On the blade file... --}}
@if ($message = Session::get('mensaje'))
<script> alert('{{$message}}');</script>
  
@endif

{{-- Setup data for datatables --}}
<div class="card">
    <div class="card-header">
      <x-adminlte-button  class="float-right" label="Nuevo Rol" theme="primary" icon="fas fa-key" data-toggle="modal" data-target="#modalPurple"/>
    </div>
   
  <div class="card-body">
    @php
      $heads = [
          'ID',
          'Nombre',
        
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
      <x-adminlte-datatable id="table3" :heads="$heads" head-theme="light" :config="$config"
      striped hoverable bordered compressed>
      @php $contador = 1; @endphp
          @foreach($roles as $role)
              <tr>
                  <td>{{$contador++}}</td>
                  <td>{{$role->name}}</td>
                  
                  
                  <td><a href= "{{route('roles.edit',$role)}}" class= "btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                  </a>
                  {{-- DESTROY data  --}}
                
                      <form style="display: inline" action="{{route('roles.destroy',$role)}}" method="POST" class="formEliminar">
                        @csrf
                        @method('delete')
                        {!!$btnDelete!!}
                      </form>
                    
                  {{--    <a href= "{{route('roles.show',$role)}}"  class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                      </a>--}}
                  </td>  
              </tr>
          @endforeach
          
      </x-adminlte-datatable>
      

    </div>  
</div>
{{-- Boton modal para add roles --}}
<x-adminlte-modal id="modalPurple" title="Nuevo Rol" theme="purple"
    icon="fas fa-key" size='lg' enable-animations>
    Crear un rol.
    {{-- Form to create role With label, invalid feedback disabled, and form group class --}}
    <form action="{{route('roles.store')}}" method="POST">
      @csrf
      {{-- role With label, invalid feedback disabled, and form group class --}}
      <div class="row">
        <x-adminlte-input name="nombre" label="Rol" placeholder="Nombre de rol"
            fgroup-class="col-md-6" disable-feedback/>
      </div>
        {{-- Button with themes and icons --}}
        <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-key"/>

    </form>
    
</x-adminlte-modal>

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

    {{-- Add alert --}}
    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('success') }}',
        });
    </script>
    @endif
    
@stop
