@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Especialidades Médicas</h1>
    
@stop

@section('content')
    <p>Bienvenido a los servicios del Hospital Isidro Ayora.</p>
<div class="col text-right">
    <a href="{{ url('/Especialidades')}}" class="btn btn-sm btn-success"> Regresar
        <i class="fas fa-angle-left"></i>
    </a>

      <form action="">
        <div class="form-group">
          <label for="name">Nombre de la especilidad</label>
          <input type="text" name= "name" class="form-control">
        </div>
        <div class="form-group">
          <label for="description">Descripción</label>
          <input type="text" name= "description" class="form-control">
        </div>
        <button type="submit" class="btn btn-sm btn-primary">Crear especilaidad</button>
      </form>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
