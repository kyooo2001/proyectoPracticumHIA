@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Especialidades Médicas</h1>
    
@stop

@section('content')
    <p>Bienvenido a los servicios del Hospital Isidro Ayora.</p>
    <table class="table">
        <thead>
          <tr>
            
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Dermatología</th>
            <td>Ciencia de la piel</td>
            <td>
                <a href="" class="btn btn-sm btn-primary">Editar</a>
                <a href="" class="btn btn-sm btn-danger">Eliminar</a>
            </td>
          
        </tbody>
      </table>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
