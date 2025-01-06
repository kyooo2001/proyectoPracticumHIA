@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
<x-adminlte-small-box title="Usuarios" text="Listado de usuarios del sistema." icon="fas fa-h-square"/>
@stop

@section('content')
{{-- On the blade file... --}}
{{-- Setup data for datatables --}}
<div class="card">
  <div class="card-body">
    <div class="text-right">
      <a href="{{url('user/create')}}" class="btn btn-primary btn-lg active" data-mdb-ripple-init role="button" aria-pressed="true">
        Crear un nuevo usuario
      </a>
  </div>
  <br>
    @php
    $heads = [
        'ID',
        'Name',
        ['label' => 'email', 'width' => 40],
        ['label' => 'Actions', 'no-export' => true, 'width' => 15],
    ];

    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>';
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                      <i class="fa fa-lg fa-fw fa-trash"></i>
                  </button>';
    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                      <i class="fa fa-lg fa-fw fa-eye"></i>
                  </button>';

    $config = [
        
    ];
    @endphp

    {{-- Minimal example / fill data using the component slot --}}
    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="light" :config="$config"
    striped hoverable bordered compressed>
    <?php $contador = 1; ?>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{$contador++}}</td>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->email}}</td>
                <td>{!!$btnEdit!!}  {!!$btnDelete!!} {!!$btnDetails!!}</td>  
            </tr>
        @endforeach
        
    </x-adminlte-datatable>
    

  </div>  
</div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
    
@stop
