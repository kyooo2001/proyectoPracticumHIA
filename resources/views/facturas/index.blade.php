@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
<x-adminlte-small-box title="Facturas" text="Listado de facturación." icon="fas fa-h-square"/>
@stop

@section('content')
{{-- On the blade file... --}}
@if ($message = Session::get('mensaje'))
<script> alert('{{$message}}');</script>
  
@endif

{{-- Setup data for datatables --}}
@hasanyrole('secretaria')
<div class="card">
  <div class="card-body">
    <div class="text-right">
      <a href="{{url('facturas/create')}}" class="btn btn-primary btn-lg active" data-mdb-ripple-init role="button" aria-pressed="true">
        Crear una factura médica.
      </a>
    </div>
    <br>
@endhasanyrole
   @php
    $heads = [
        'ID',
        'Paciente',
        'Doctor',
        'Fecha de la factura',
        'Valor total',
        'Descripción',
        
      
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
    <x-adminlte-datatable id="table16" :heads="$heads" head-theme="light" :config="$config"
    striped hoverable bordered compressed>
    @php $contador = 1; @endphp
    @if(Auth::check() && Auth::user()->hasRole('secretaria')) {{-- Verifica que el usuario está autenticado y tiene relación con secretaria --}}  
            @foreach($facturas as $factura)
                
                    <tr>
                        <td>{{$contador++}}</td>
                        <td>
                        @if ($factura->paciente)
                            {{$factura->paciente->apellidos . " " . $factura->paciente->nombres}}
                        @else
                            <span class="text-danger">Sin datos del paciente</span>
                        @endif
                        </td>

                        <td>
                            @if ($factura->doctor)
                                {{$factura->doctor->apellidos . " " . $factura->doctor->nombres}}
                            @else
                                <span class="text-danger">Sin datos del doctor</span>
                            @endif
                        </td>

                        <td>{{$factura->fecha_pago}}</td>
                        <td>{{$factura->monto}}</td>

                        <td>{!! $factura->descripcion ? Str::limit($factura->descripcion, 200, '...') : 'N/A' !!}</td>
                        
                        <td><a href= "{{route('facturas.edit',$factura)}}" class= "btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                        <i class="fa fa-lg fa-fw fa-pen"></i>
                        </a>
                        {{-- DESTROY data  --}}
                    
                            <form style="display: inline" action="{{route('facturas.destroy',$factura)}}" method="POST" class="formEliminar">
                            @csrf
                            @method('delete')
                            {!!$btnDelete!!}
                            </form>
                       
                            <a href= "{{route('facturas.show',$factura)}}"  class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                            <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>
                            {{-- Botón de impresión que redirige a print_factura --}}
                            <a href="{{ route('facturas.print_factura', $factura->id) }}" class="btn btn-xs btn-warning text-dark mx-1 shadow" title="Print Report">
                              <i class="fa fa-lg fa-fw fa-print"></i>
                          </a>
                            
                        </td>  
                    </tr>
                
            @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center text-danger">
                    No tienes permisos para acceder a este contenido.
                </td>
            </tr>
    @endif
  </x-adminlte-datatable>
  <hr>
  {{-- Caja para la suma de valores economicos --}}
        <div class="card bg-light shadow">
          <div class="card-body text-center">
              <h5 class="text-primary font-weight-bold">Valor Total de las Facturas</h5>
              <p class="h4 text-success font-weight-bold">
                  ${{ number_format($valor_total, 2) }}
              </p>
          </div>
      </div>

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
