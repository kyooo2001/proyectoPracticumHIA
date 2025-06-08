@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
<x-adminlte-small-box title="Permisos" text="Permisos del sistema." icon="fas fa-h-square"/>
@stop

@section('content')
{{-- On the blade file... --}}
@if ($message = Session::get('mensaje'))
<script> alert('{{$message}}');</script>
  
@endif

{{-- Setup data for datatables --}}
<div class="card">
    <div class="card-header">
      <x-adminlte-button  class="float-right" label="Nuevo permiso" theme="primary" icon="fas fa-key" data-toggle="modal" data-target="#modalPurple"/>
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
      <x-adminlte-datatable id="table4" :heads="$heads" head-theme="light" :config="$config"
      striped hoverable bordered compressed>
      @php $contador = 1; @endphp
          @foreach($permisos as $permiso)
              <tr>
                  <td>{{$contador++}}</td>
                  <td>{{$permiso->name}}</td>
                  
                  
                  <td>
                   {{-- <a href= "{{route('permisos.edit',$permiso)}}" class= "btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                  </a>--}}
                  {{-- DESTROY data  --}}
                
                      <form style="display: inline" action="{{route('permisos.destroy',$permiso)}}" method="POST" class="formEliminar">
                        @csrf
                        @method('delete')
                        {!!$btnDelete!!}
                      </form>
                    
                   {{--   <a href= "{{route('permisos.show',$permiso)}}"  class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                        <i class="fa fa-lg fa-fw fa-eye"></i>
                      </a> --}}
                  </td>  
              </tr>
          @endforeach
          
      </x-adminlte-datatable>
      

    </div>  
</div>
{{-- Boton modal para roles --}}
<x-adminlte-modal id="modalPurple" title="Nuevo Permiso" theme="purple"
    icon="fas fa-key" size='lg' enable-animations>
    Crear un permiso.
    {{-- Form to create permission With label, invalid feedback disabled, and form group class --}}
    <form action="{{route('permisos.store')}}" method="POST">
      @csrf
      {{-- role With label, invalid feedback disabled, and form group class --}}
      <div class="row">
        <x-adminlte-input name="nombre" label="Permiso" placeholder="Tipo de permiso"
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
